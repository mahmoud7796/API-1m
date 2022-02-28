<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\VerifyEmailJob;
use App\Models\User;
use App\Models\UserVerifyEmail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Auth;

class VerifyEmailController extends Controller
{
    public function index(){
        return view('site.auth.verification');
    }

    public function verifyEmail($token)
    {
         $verifyUser = UserVerifyEmail::whereToken($token)->first();
        if($verifyUser){
               $userEmailVerify = $verifyUser->users->first();
            if($userEmailVerify) {
                $verifyUser->users->email_verified_at = now();
                 $verifyUser->users->save();
                 return 'Home';
                return redirect()->route('site.login')->with('success', 'You are email verified successfully you can login now!');
            } else {
                return redirect()->route('site.login')->with('success', 'You are already email verified your email');
            }
        }
        return redirect()->route('site.login')->with('error', 'Invalid URL');
    }
    public function resend($email){
        $user = User::whereEmail($email)->first();
        if(!$user)
            return response()->json([
                'status' => false,
                'msg' => 'invalid email',
            ]);
        $token = $user->token()->first();
        if($token){
            $token->delete();
        }
        $verifyEmailToken = UserVerifyEmail::create([
            'user_id' =>$user->id,
            'token' => Str::random(64),
        ]);
        $on = Carbon::now()->addSeconds(2.5);
        dispatch(new VerifyEmailJob($user,$verifyEmailToken))->delay($on);
        return response()->json([
            'status' => true,
            'msg' => 'Verification mail sent successfully',
        ]);
    }

    function getMax()
    {
        $arr = [5,2,1,3,8];

        //If array is empty then return
        if(empty($arr)) {
            return;
        }

        /*
         * Initialize max and second max with negative value
         */
        $max = 8;
        $secondMax = 5;

        //Traverse an array
        foreach($arr as $number) {

            //If it's greater than the value of max
            if($number > $max) {  //8 > 5
                $secondMax = $max;  //sec = 5
                $max = $number; //max = 8
            }

            //If array number is greater than secondMax and less than max
            if($number > $secondMax && $number < $max) {  //8>5 && 8<8
                $secondMax = $number; //$secondMax =3
            }
        }
        return $secondMax;

    }

}



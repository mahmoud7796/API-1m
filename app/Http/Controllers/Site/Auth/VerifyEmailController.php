<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\VerifyEmailJob;
use App\Models\User;
use App\Models\UserVerifyEmail;
use Carbon\Carbon;
use Illuminate\Support\Str;

class VerifyEmailController extends Controller
{
    public function index(){
        return view('site.auth.verification');
    }

    public function verifyEmail($token)
    {
         $verifyUser = UserVerifyEmail::whereToken($token)->first();
        if($verifyUser){
              $user = $verifyUser->users;
            if(!$user->email_verified_at) {
                $verifyUser->users->email_verified_at = now();
                 $verifyUser->users->save();
                return redirect()->route('site.login')->with('success', 'Your email verified successfully you can login now!');
            } else {
                return redirect()->route('site.login')->with('success', 'Your already email verified your email');
            }
        }
        return redirect()->route('landingPage')->with('error', 'Invalid URL');
    }
    public function resend($email){
        $user = User::whereEmail($email)->first();
        if(!$user)
            return response()->json([
                'status' => false,
                'msg' => 'invalid email',
            ]);
        $token = $user->token()->first();
        $token->delete();
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
}



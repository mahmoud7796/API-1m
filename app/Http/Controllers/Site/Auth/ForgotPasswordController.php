<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPassRequest;
use App\Http\Requests\Auth\ResetPassRequest;
use App\Jobs\ResetPassJob;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Auth;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    public function forgetPass(){
        return view('site.auth.sendResetPassEmail');
    }

    public function postForgotPass(ForgotPassRequest $request){
        try {
             $user = User::whereEmail($request->email)->first();
            if(!$user){
                return redirect()->back()->with(['error'=>'This email does not in our record']);
            }
            $resetPassToken = PasswordReset::whereEmail($request->email)->first();
            if($resetPassToken){
                $resetPassToken->delete();
            }
            $resetPassToken = PasswordReset::create([
                'email' => $request->email,
                'token' => Str::random(60),
            ]);
            $on = Carbon::now()->addSeconds(2.5);
            dispatch(new ResetPassJob($user,$resetPassToken))->delay($on);
            Session::put('userEmail', $resetPassToken->email);
            return redirect()->route('site.resetPassNotify');
        }catch (\Exception $ex){
            return $ex;

        }
    }

    public function resetPassword($token){
        $token = PasswordReset::whereToken($token)->first();
        if($token){
            return redirect()->route('site.resetPass',$token->token);
        }
        return redirect()->route('site.forgetPass')->with('error', 'Invalid URL');
    }

    public function notifyResetPass(){
        return view('site.auth.resetPassNotify');
    }

    public function resetPass($token){
        return view('site.auth.resetPassword',compact('token'));
    }
    public function changePass(ResetPassRequest $request){
        $token = PasswordReset::whereToken($request->token)->first();
        if(!$token){
            return redirect()->back()->with(['error'=>'Invalid Token']);
        }
        $email = $token->email;
        $user = User::whereEmail($email)->first();
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        $token->delete();
        $userAuth= Auth::login($user);
        return redirect()->route('home');
    }

}

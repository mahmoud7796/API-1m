<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;

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

}

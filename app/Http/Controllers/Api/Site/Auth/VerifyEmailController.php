<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserVerifyEmail;
use App\Traits\ResponseJson;
use Carbon\Carbon;
class VerifyEmailController extends Controller
{
    use ResponseJson;

    public function verifyEmail($token)
    {
         $verifyUser = UserVerifyEmail::whereToken($token)->first();
        if($verifyUser){
              $user = $verifyUser->users;
            if(!$user->email_verified_at) {
                $verifyUser->users->email_verified_at = now();
                 $verifyUser->users->save();
                return $this->jsonResponse('', false, 'Your email verified successfully you can login now!.', 200);
            } else {
                return $this->jsonResponse('', true, 'Your already email verified your email.', 402);
            }
        }
        return $this->jsonResponse('', true, 'Invalid URL.', 404);
    }
}



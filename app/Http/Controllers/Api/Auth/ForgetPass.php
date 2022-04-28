<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\ResetPassJob;
use App\Models\PasswordReset;
use App\Models\User;
use App\Traits\ResponseJson;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ForgetPass extends Controller
{
    use ResponseJson;

    public function postForgotPass(Request $request){
        try {
            $validator = Validator::make($request->all(),[
                'email' => 'required|email',
            ]);
            if ($validator->fails()){
                return $this->returnError('E001',$validator->messages());
            }
            $user = User::whereEmail($request->email)->first();
            if(!$user){
                return $this->jsonResponseError(true,'This email does not in our record',200);
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
            return $this->jsonResponse('',false,'reset password link sent successfully',200);
        }catch (\Exception $ex){
            return $ex;
        }
    }

}

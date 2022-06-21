<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\VerifyEmailJob;
use App\Models\User;
use App\Models\UserVerifyEmail;
use App\Traits\RegesterationCases;
use App\Traits\ResponseJson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use ResponseJson;
    use RegesterationCases;

    public function login(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->jsonResponseError(true, $validator->errors(), 400);
            }

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $authUser = Auth::user();
                $verifiyMail = $authUser->email_verified_at;
                if($verifiyMail=== null)
                {
                    return $this->jsonResponseError( true, 'Please verify your E-mail', 401);
                }
                $success['token'] = $authUser->createToken('sanctumAuth')->plainTextToken;
                $success['user'] = $authUser;
                return $this->jsonResponse($success, false, '', 200);
            } else {

                return $this->jsonResponseError(true,'Email or Password is wrong',  200);
            }

        }catch (\Exception $ex){
            return $ex;
        }

    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            ]);
            if ($validator->fails()) {
                return $this->jsonResponseError(true, $validator->errors(), 400);
            }
            DB::beginTransaction();
            $user =  User::create([
                'fullName' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $verifyEmailToken = UserVerifyEmail::create([
                'user_id' =>$user->id,
                'token' => Str::random(64),
            ]);
            $on = Carbon::now()->addSeconds(2.5);
            dispatch(new VerifyEmailJob($user,$verifyEmailToken))->delay($on);
            DB::commit();
            return $this->jsonResponse('', false, 'You have registered successfully, Please verify your email.', 200);
        } catch (\Exception $ex) {
            DB::rollback();
          //  return $ex;
            return $this->jsonResponseError(true, 'Something went wrong', 400);
        }
    }


    public function registerWithSocial(Request $request)
    {
        try {
            switch ($request->type) {
                case 'Google':
                    return $this->IfGoogleRegistration($request);
                case 'Facebook':
                    return $this->IfFacebookRegistration($request);
                default:
                    return $this->jsonResponseError(true, 'Type not valid', 400);
            }

        } catch (\Exception $ex) {
            //return $ex;
            return $this->jsonResponseError(true, 'Type not valid', 400);
        }

    }

    public function logout()
    {
        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return $this->jsonResponse('', false, 'You loged out successfully.', 200);
    }
}

<?php

namespace App\Traits;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

trait RegesterationCases
{
    function IfFacebookRegistration($request)
    {
        $finduser = User::whereLoginCriteria('facebook')->whereLoginId('login_id',  $request->facebookId)->first();

        if ($finduser) {
            //  $authUser = Auth::user();
            $success['token'] = $finduser->createToken('sanctumAuth')->plainTextToken;
            $success['user'] = new UserResource($finduser);
            return $this->jsonResponse($success, false, 'You loged In successfully', 200);
        } else {
            $validator = Validator::make($request->all(), $this->getValidationRulesBasedOnType($request->type));
            if ($validator->fails()) {
                return $this->jsonResponseError(true, $validator->errors(), 400);
            }
            if ($request->email === null)
                $request->email = $request->facebookId;
            $userEmail = User::whereEmail($request->email)->first();
            if ($userEmail)
                return $this->jsonResponseError(true, 'This email already exists', 400);

            $request->email = $request->facebookId;
            $finduser = User::create([
                'fullName' => $request->name,
                'email' => $request->email,
                'login_id' => $request->facebookId,
                'login_criteria' => 'facebook',
                'profile_img' => $request->facebookImg,
                'password' => Hash::make('708090000')
            ]);
            $success['token'] = $finduser->createToken('sanctumAuth')->plainTextToken;
            $success['user'] = new UserResource($finduser);
            return $this->jsonResponse($success, false, 'You registered successfully', 200);
        }
    }

    function IfGoogleRegistration($request)
    {
        $finduser = User::whereLoginCriteria('google')->whereLoginId($request->googleId)->first();
        if ($finduser) {
            //  $authUser = Auth::user();
            $success['token'] = $finduser->createToken('sanctumAuth')->plainTextToken;
            $success['user'] = new UserResource($finduser);
            return $this->jsonResponse($success, false, 'You logged in successfully', 200);
        } else {
            $validator = Validator::make($request->all(), $this->getValidationRulesBasedOnType($request->type));
            if ($validator->fails()) {
                return $this->jsonResponseError(true, $validator->errors(), 400);
            }
            if ($request->email === null)
                $request->email = $request->googleId;
            $userEmail = User::whereEmail($request->email)->first();
            if ($userEmail)
                return $this->jsonResponseError(true, 'This email already exists', 400);

            $finduser = User::create([
                'fullName' => $request->name,
                'email' => $request->email,
                'login_id' => $request->googleId,
                'login_criteria' => 'google',
                'profile_img' => $request->googleImg,
                'password' => Hash::make('708090000')
            ]);
            $success['token'] = $finduser->createToken('sanctumAuth')->plainTextToken;
            $success['user'] = new UserResource($finduser);
            return $this->jsonResponse($success, false, 'You registered successfully', 200);
        }
    }

    function getValidationRulesBasedOnType($type)
    {
        switch ($type) {
            case 'Google':
                return [
                    'name' => 'required',
                    'type' => 'required',
                    'googleId' => 'required',
                    'email' => 'nullable|email|unique:users,email',
                    'googleImage' => 'required'
                ];
            case 'Facebook':
                return [
                    'name' => 'required',
                    'email' => 'nullable|email|unique:users,email',
                    'type' => 'required',
                    'facebookId' => 'required|',
                    'googleImage' => 'required'
                ];
            default:
                throw new RegistrationTypeNotValid();
        }

    }


}

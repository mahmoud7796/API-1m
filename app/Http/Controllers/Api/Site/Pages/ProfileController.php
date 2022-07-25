<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Helper\General;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ResponseJson;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    use ResponseJson;

    public function changePassword(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'oldPassword' => 'required',
                'password' => ['required', 'string', 'min:8', 'confirmed','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            ]);

            if ($validator->fails()) {
                return $this->jsonResponseError(true, $validator->errors(), 400);
            }
            $currentPass = Auth::user()->password;
            if (Hash::check($request->oldPassword, $currentPass)) {
                $user = User::find(Auth::id());
                $user -> password = Hash::make($request->password);
                $user -> save();
                return $this->jsonResponse("Password Changed Successfully", false, '', 200);
            }else{
                return $this->jsonResponseError(true,'Old Password is not correct',400);
            }

        }catch (\Exception $ex){
            //return $ex;
            return $this->jsonResponseError(true,'Something wrong please try again later',200);
        }
    }

    public function updatePhoto(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'profileImg' => 'required|string',
            ]);

            if ($validator->fails()) {
                return $this->jsonResponseError(true, $validator->errors(), 400);
            }
            $authUser = Auth::id();
            $user = User::find($authUser);
            $photo = $request->profileImg;
            $imgPath = General::base64_to_jpeg($photo);
            if($imgPath=='notValid'){
                return $this->jsonResponseError(true,'Not valid base64',200);
            }
            if($user->profile_img){
                $path= public_path().$user->profile_img;
                unlink($path);
            }
            $user->update([
                'profile_img' =>$imgPath,
            ]);
            return $this->jsonResponse('', false, 'photo updated successfully', 200);
        }catch (\Exception $ex){
            return $this->jsonResponseError(true,'Something wrong please try again later',200);
        }
    }


    public function deleteAccount()
    {
        try{
            Auth::user()->delete();
            Auth::logout();
            return $this->jsonResponse('', false, 'Account Deleted successfully', 200);
        }catch (\Exception $ex){
            return $this->jsonResponseError( true, 'Something went wrong', 400);
            return $ex;
        }
    }
}

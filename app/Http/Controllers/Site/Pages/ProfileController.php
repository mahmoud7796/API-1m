<?php

namespace App\Http\Controllers\Site\Pages;

use App\Helper\General;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileImgRequest;
use App\Http\Requests\ProfilePasswordRequest;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function changePassword(ProfilePasswordRequest $request)
    {
        try{
            $currentPass = Auth::user()->password;
            if (Hash::check($request->oldPassword, $currentPass)) {
                $user = User::find(Auth::id());
                $user -> password = Hash::make($request->password);
                $user -> save();

                return response()->json([
                    'status' => true,
                    'msg' => 'Your password changed successfully',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'msg' => 'Old password is wrong',
                ]);
            }

        }catch (\Exception $ex){
            return $ex;
            return redirect()->back()->with(['error' => 'Something error please try again later']);
        }
    }

    public function updatePhoto(ProfileImgRequest $request)
    {
        try{
                $authUser = Auth::id();
                 $user = User::find($authUser);
                $photo = $request->file('profileImg');
                $img = General::saveImage($photo,'profileImgs');
              if($user->profile_img){
                   $path= public_path().$user->profile_img;
                   unlink($path);
                }
                $user->update([
                    'profile_img' =>$img,
                ]);
            return response()->json([
                'status' => true,
                'msg' => 'Your photo changed successfully',
            ]);
        }catch (\Exception $ex){
            return $ex;
            return redirect()->back()->with(['error' => 'Something error please try again later']);
        }
    }


    public function deleteAccount()
    {
        try{
            Auth::user()->delete();
            Auth::logout();
            return response()->json([
                'status' => true,
                'msg' => 'Account Deleted',
            ]);
        }catch (\Exception $ex){
            return $ex;
        }
    }

}

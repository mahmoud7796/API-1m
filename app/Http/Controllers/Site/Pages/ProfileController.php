<?php

namespace App\Http\Controllers\Site\Pages;

use App\Helper\General;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileImgRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function changePassword(ProfileImgRequest $request)
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
                $user = User::find(Auth::id());
                $photo = $request->file('profileImg');
                $img = General::saveImage($photo,'profileImgs');
/*           return  $user->profile_img;
/*                if(){
                    return $user->profile_img;
                }*/
                $user->update([
                    'profile_img' => "maddddd"
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

}

<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;


class GoogleLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function redirect($service){
        return Socialite::driver($service)->redirect();
    }


    public function callback($service){
        try {
            $user = Socialite::with($service)->user();
          //  return $user_data = response()->json($user);
            $fullName= $user->getName();
            $google_id = $user->getId();
            $finduser = User::whereLoginCriteria('google')->whereLoginId($google_id)->first();

          if($finduser){
                Auth::login($finduser);
                return redirect()->route('home');

            }else{
                $newUser = User::create([
                    'fullName' => $fullName,
                    'email' =>  $user->getEmail(),
                    'login_id' => $google_id,
                    'login_criteria' => 'google',
                    'password' =>  Hash::make('708090000')
                ]);

                Auth::login($newUser);
                return redirect()->route('home');
            }


        }catch (\Exception $ex){
            return $ex;
            return redirect()->route('site.login')->with(['error' => 'Something error please try again later']);

        }

    }

}

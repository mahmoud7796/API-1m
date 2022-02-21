<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
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

    public function login(){
        return view('site.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        try{
            $userEmail= User::whereEmail($request->email)->first();
            if($userEmail===null)
            {
                return redirect()->back()->with(['error' => 'This email doesn\'t match our record']);
            }

            if (auth()->guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
                return redirect()->route('home');
            }else
                return redirect()->back()-> with(['error' =>'Your Password is wrong']);
        }catch (\Exception $ex){
            return redirect()->back()->with(['error' => 'Something error please try again later']);

        }
    }

    public function redirect($service){
        return Socialite::driver($service)->redirect();
    }

    public function callback($service){
        try {
            $user = Socialite::with($service)->user();
          //  return $user_data = response()->json($user);
            $fullName= $user->getName();
            $facebookId = $user->getId();
            $finduser = User::whereLoginCriteria('facebook')->whereLoginId($facebookId)->first();

          if($finduser){
                Auth::login($finduser);
                return redirect()->route('home');

            }else{
                $newUser = User::create([
                    'fullName' => $fullName,
                    'email' =>  $user->getEmail(),
                    'login_id' => $facebookId,
                    'login_criteria' => 'facebook',
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

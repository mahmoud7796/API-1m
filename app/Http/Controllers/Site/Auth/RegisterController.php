<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Jobs\VerifyEmailJob;
use App\Models\User;
use App\Models\UserVerifyEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register()
    {
        return view('site.auth.register');
    }

    protected function create(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'fullName' => $request->fullName,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $verifyEmailToken = UserVerifyEmail::create([
                'user_id' =>$user->id,
                'token' => Str::random(64),
            ]);
            DB::commit();
            $on = Carbon::now()->addSeconds(2.5);
            dispatch(new VerifyEmailJob($user,$verifyEmailToken))->delay($on);
            Session::put('userEmail', $user->email);
            return redirect()->route('site.verification');
        }catch (\Exception $ex){
            DB::rollback();
            return $ex;
            return redirect()->route('landingPage')->with(['error'=>'Oops something error please try again']);
        }


    }
}

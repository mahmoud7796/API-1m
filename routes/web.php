<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Site\Auth\ForgotPasswordController;
use App\Http\Controllers\Site\Auth\GoogleLoginController;
use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\LogoutController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\Site\Auth\VerifyEmailController;
use App\Http\Controllers\Site\Pages\ContactController;
use App\Http\Controllers\Site\Pages\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


 ############### Register ####################
 Route::group(['middleware'=>'guest:web'], function(){
     Route::get('/register', [RegisterController::class,'register'])->name('site.register');
     Route::match(['get','post'],'/register-create', [RegisterController::class,'create'])->name('site.register.create');
 });
 ############### End Register ##################

 ############### Verify Email ####################
 Route::get('/verify-email/{token}',[VerifyEmailController::class,'verifyEmail'])->name('site.verifyEmail');
 Route::get('/verification/',[VerifyEmailController::class,'index'])->name('site.verification');
 Route::get('/resend-verify/{email}',[VerifyEmailController::class,'resend'])->name('site.resendEmail');


 ############### End Verify Email ###############

############### Login ####################
 Route::group(['middleware'=>'guest:web'], function(){
    Route::get('/login', [LoginController::class,'login'])->name('site.login');
     Route::match(['get', 'post'], '/post-login', [LoginController::class,'postLogin'])->name('site.postLogin');
    Route::get('/forget-password', [registerController::class,'forgetPassword'])->name('site.forgetPassword');
 });
 ############### End Login ####################


 ############### Reset Password ####################
 Route::group(['middleware'=>'guest:web'], function(){
     Route::get('/forget-pass', [ForgotPasswordController::class,'forgetPass'])->name('site.forgetPass');
     Route::match(['get', 'post'], '/post-login', [LoginController::class,'postLogin'])->name('site.postLogin');
     Route::get('/forget-password', [registerController::class,'forgetPassword'])->name('site.forgetPassword');
 });
 ############### End Reset Password ####################


 ############### Login With Facebook ####################
 Route::get('/redirect/{service}', [LoginController::class,'redirect'])->name('facebook.redirect');
 Route::get('/callback/{service}', [LoginController::class,'callback'])->name('facebook.callback');
 ############### End Login With Facebook #################

 ############### Login With Google ####################

 Route::get('redirect-google/{service}', [GoogleLoginController::class,'redirect'])->name('google.redirect');
 Route::get('callback-google/{service}', [GoogleLoginController::class,'callback'])->name('google.callback');

 ############### End Login With Google #################

 ############### Logout ####################
 Route::group(['middleware'=>'auth:web'], function(){
     Route::get('/logout', [LogoutController::class,'logout'])->name('site.logout');

 });
 ############### End Logout ####################



 ############### Pages ####################

 Route::group(['middleware'=>'guest:web'], function(){
     Route::get('/homeTest', function(){
         return view('homeTest');
     });

 Route::get('/', [HomeController::class,'landingPage'])->name('landingPage');
 });

 Route::group(['middleware'=>'auth:web'], function(){
     Route::get('/home', [HomeController::class,'home'])->name('home');
     Route::get('/contact', [ContactController::class,'getUserContact'])->name('site.contact.getUserContact');

 });

 ############### Contacts ####################

 Route::group(['middleware'=>'auth:web','prefix'=>'contact'], function(){
     Route::get('/index', [ContactController::class,'index'])->name('site.contacts.index');
     Route::post('/create', [ContactController::class,'create'])->name('site.contacts.create');
     Route::get('/show/{id}', [ContactController::class,'show'])->name('site.contacts.getContact');
     Route::post('/update/{id}', [ContactController::class,'update'])->name('site.contacts.update');
     Route::get('/delete/{id}', [ContactController::class,'delete'])->name('site.contacts.delete');
 });

 ############### End Contacts ####################

 ############### Contacts ####################

 Route::group(['middleware'=>'auth:web','prefix'=>'card'], function(){
     Route::post('/index', [ContactController::class,'index'])->name('site.contacts.index');
     Route::post('/create', [ContactController::class,'create'])->name('site.contacts.create');
     Route::get('/show/{id}', [ContactController::class,'show'])->name('site.contacts.getContact');
     Route::post('/update/{id}', [ContactController::class,'update'])->name('site.contacts.update');
     Route::get('/delete/{id}', [ContactController::class,'delete'])->name('site.contacts.delete');
 });

 ############### End Contacts ####################
 Route::get('/max',[VerifyEmailController::class,'getMax'])->name('site.verifyEmail');
Route::get('/home-test',function(){
    return view('site.noActiveCards View');
    return view('site.homeNormalView');
});

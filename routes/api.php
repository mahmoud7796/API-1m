<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Site\Pages\ContactController;
use App\Http\Controllers\Site\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
####### Login && Register ########
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/social-login',[AuthController::class,'registerWithSocial']);
####### End Login && Register ########


############### Verify Email ####################
Route::get('/verify-email/{token}',[VerifyEmailController::class,'verifyEmail'])->name('site.verifyEmail');
############### End Verify Email ##################

Route::middleware('auth:sanctum')->group( function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});



############### Contacts ####################

Route::group(['middleware'=>'auth:sanctum','prefix'=>'contact'], function(){
    Route::get('/index',[ContactController::class,'index']);
    Route::post('/store', [ContactController::class,'sotreInSession'])->name('site.contacts.sotreInSession');
    Route::get('/remove', [ContactController::class,'removeFromSession'])->name('site.contacts.removeFromSession');
    Route::post('/create', [ContactController::class,'create'])->name('site.contacts.create');
    Route::get('/show/{id}', [ContactController::class,'show'])->name('site.contacts.getContact');
    Route::post('/update/{id}', [ContactController::class,'update'])->name('site.contacts.update');
    Route::get('/delete/{id}', [ContactController::class,'delete'])->name('site.contacts.delete');
});

############### End Contacts ####################

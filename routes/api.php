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

Route::group(['middleware'=>'auth:sanctum'], function(){
    Route::apiResource('contacts',ContactController::class);
});

//EndPoint Card
//index    ->   GET Request /cards
//show     ->   GET Request /cards/{id}
//create   ->   POST Request /cards
//update   ->   PUT Request /cards/{id}
//delete   ->   DELETE Request /cards/{id}
############### End Contacts ####################

<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Site\Pages\CardController;
use App\Http\Controllers\Api\Site\Pages\ConnectionController;
use App\Http\Controllers\Api\Site\Pages\ContactController;
use App\Http\Controllers\Api\Site\Pages\ProvidersController;
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


############### Contact Information ####################
Route::group(['middleware'=>'auth:sanctum'], function(){
    Route::get('/mada', function(){
        return "auth middlware";
    });

    ######## Connections ################
    Route::get('/added/index', [ConnectionController::class, 'addedUsers']);
    Route::get('/added/connection', [ConnectionController::class, 'addedCount']);
    ######## End Connections ################

    ######## contactinfo ################
    Route::apiResource('contactinfo',ContactController::class);
    ######## End contactinfo ################

    ######## Cards ################
    Route::apiResource('cards',CardController::class);
    ######## End Cards ################

    ######## Providers ################
    Route::apiResource('providers',ProvidersController::class);
    ######## End Providers ################
});

//EndPoint Card

//index    ->   GET Request /cards
//show     ->   GET Request /cards/{id}
//create   ->   POST Request /cards
//update   ->   PUT Request /cards/{id}
//delete   ->   DELETE Request /cards/{id}
############### End Contacts ####################
/*Route::get('/userContact', function(){
    return   $contact = Contact::with(['provider'=>function($q){
      return $q->select('id','name','imgURL');
  }])->whereUserId(105)->get();
     $contactProvider = $contact->provider;
    $data['contact'] = $contact->provider;
    return $contact;

});*/

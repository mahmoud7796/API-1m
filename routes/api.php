<?php

use App\Helper\General;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgetPass;
use App\Http\Controllers\Api\Site\Pages\CardController;
use App\Http\Controllers\Api\Site\Pages\ConnectionController;
use App\Http\Controllers\Api\Site\Pages\ContactController;
use App\Http\Controllers\Api\Site\Pages\HomeController;
use App\Http\Controllers\Api\Site\Pages\ProfileController;
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
Route::get('/verify-email/{token}',[VerifyEmailController::class,'verifyEmail']);
############### End Verify Email ##################

############### forget password ####################
Route::post('/forget-pass/',[ForgetPass::class,'postForgotPass']);
############### End forget password ##################

Route::middleware('auth:sanctum')->group( function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

############### Contact Information ####################
Route::group(['middleware'=>'auth:sanctum'], function(){

    ######## Connections ################
    Route::group(['prefix'=>'connection','middleware'=>'auth:sanctum'], function(){
    //Route::get('/added/index', [ConnectionController::class, 'addedUsers']);
   // Route::get('/added/connection', [ConnectionController::class, 'addedCount']);
    Route::post('scan-card', [ConnectionController::class, 'scanCard']);
    Route::post('add-connection', [ConnectionController::class,'addConnection'])->name('site.connection.addConnection');
    Route::post('get-connection', [ConnectionController::class,'getConnection'])->name('site.connection.getConnection');
    Route::post('get-connection-cards', [ConnectionController::class,'getConnectionScanedCards'])->name('site.connection.getConnectionScanedCards');

    });
    ######## End Connections ################

    ######## contactinfo ################
    Route::apiResource('contactinfo',ContactController::class);
    Route::post('/contactinfo/index', [ContactController::class, 'index']);
    Route::delete('/contactinfo/delete', [ContactController::class, 'delete']);
    Route::post('/contactinfo/create', [ContactController::class, 'store']);

    ######## End contactinfo ################

    ######## Cards ################
    Route::apiResource('cards',CardController::class);
    Route::group(['prefix'=>'cards'], function(){
    Route::post('/create', [CardController::class, 'store']);
    Route::get('/index', [CardController::class, 'index']);
    Route::get('/share/{cardId}', [CardController::class, 'share']);
    Route::post('/featured-card', [CardController::class, 'featuredCard']);
    Route::post('/change-featured', [CardController::class, 'changeFeatured']);
    });
    ######## End Cards ################

    ######## Profile ################
    Route::group(['prefix'=>'profile'], function(){
        Route::put('/change-pass', [ProfileController::class, 'changePassword']);
        Route::put('/change-photo', [ProfileController::class, 'updatePhoto']);
    });
    ######## End Profile ################

    ######## Features ################
        Route::post('/card-search', [HomeController::class, 'cardSearch']);
        Route::post('/contact-search', [HomeController::class, 'contactSearch']);
    ######## End Features ################

    ######## Providers ################
    Route::apiResource('providers',ProvidersController::class);
    ######## End Providers ################
});


Route::post('/testbase', function (){
    $imagedata1 = \App\Helper\General::base64();
    $imagedata = \App\Helper\General::base64_to_jpeg($imagedata1);
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

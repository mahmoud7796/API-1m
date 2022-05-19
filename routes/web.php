<?php

use App\Helper\General;
use App\Http\Controllers\Site\Auth\ForgotPasswordController;
use App\Http\Controllers\Site\Auth\GoogleLoginController;
use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\LogoutController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\Site\Auth\VerifyEmailController;
use App\Http\Controllers\Site\Pages\CardController;
use App\Http\Controllers\Site\Pages\ConnectionController;
use App\Http\Controllers\Site\Pages\ContactController;
use App\Http\Controllers\Site\Pages\HomeController;
use App\Http\Controllers\Site\Pages\ProfileController;
use App\Http\Controllers\Site\Pages\QrController;
use App\Models\Card;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
 Route::post('/send-verification',[VerifyEmailController::class,'customVerifyEmail'])->name('site.customVerifyEmail');
 Route::get('/send-verification-mail',[VerifyEmailController::class,'verifyEmailPage'])->name('site.verifyEmailPage');


############### End Verify Email ###############

############### Login ####################
 Route::group(['middleware'=>'guest:web'], function(){
    Route::get('/login', [LoginController::class,'login'])->name('site.login');
     Route::match(['get', 'post'], '/post-login', [LoginController::class,'postLogin'])->name('site.postLogin');
 });
 ############### End Login ####################


 ############### Reset Password ####################
     Route::get('/forgot-pass', [ForgotPasswordController::class,'forgetPass'])->name('site.forgetPass');
     Route::match(['get', 'post'], '/post-forgot', [ForgotPasswordController::class,'postForgotPass'])->name('site.postForgotPass');
     Route::get('/forget-password', [ForgotPasswordController::class,'notifyResetPass'])->name('site.resetPassNotify');
     Route::get('/resetPass/{token}', [ForgotPasswordController::class,'resetPass'])->name('site.resetPass');
     Route::get('/reset-password/{token}',[ForgotPasswordController::class,'resetPassword'])->name('site.resetPassword');
     Route::post('/change-pass/',[ForgotPasswordController::class,'changePass'])->name('site.changePass');
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


 Route::group(['middleware'=>'guest:web'], function(){
     Route::get('/homeTest', function(){
         return view('homeTest');
     });

 //Route::get('/', [HomeController::class,'landingPage'])->name('landingPage');
 });

 Route::group(['middleware'=>'auth:web'], function(){
     Route::get('/home', [HomeController::class,'home'])->name('home');
     Route::get('/contact', [ContactController::class,'getUserContact'])->name('site.contact.getUserContact');

 });

############### Contacts ####################
Route::group(['middleware'=>'auth:web','prefix'=>'contact'], function(){
    Route::get('/', [ContactController::class,'index'])->name('site.contacts.index');
    Route::post('/create', [ContactController::class,'store'])->name('site.contacts.create');
    Route::get('/show/{id}', [ContactController::class,'show'])->name('site.contacts.getContact');
    Route::post('/update/{id}', [ContactController::class,'update'])->name('site.contacts.update');
    Route::get('/delete/{id}', [ContactController::class,'delete'])->name('site.contacts.delete');
});
############### End Contacts ####################

############### profile ####################
Route::group(['middleware'=>'auth:web','prefix'=>'profile'], function(){
    Route::post('/change-pass', [ProfileController::class,'changePassword'])->name('site.profile.changePass');
    Route::post('/update-photo', [ProfileController::class,'updatePhoto'])->name('site.profile.updatePhoto');
});
############### End profile ####################

############### Cards ####################

Route::group(['middleware'=>'auth:web','prefix'=>'card'], function(){
    Route::get('/index', [CardController::class,'index'])->name('site.card.index');
    Route::post('/store', [CardController::class,'create'])->name('site.card.create');
    Route::get('/show/{id}', [CardController::class,'edit'])->name('site.card.getContact');
    Route::get('/show-card/{id}', [CardController::class,'show'])->name('site.card.show');
    Route::post('/update/{id}', [CardController::class,'update'])->name('site.card.update');
    Route::get('/delete/{id}', [CardController::class,'delete'])->name('site.card.delete');
});

############### End cards ####################

############### Connection ####################

Route::group(['middleware'=>'auth:web','prefix'=>'connection'], function(){
    Route::get('/', [ConnectionController::class,'addedContact'])->name('site.contacts.addedContact');
    Route::get('connection/count-scan', [ConnectionController::class,'countOfScan'])->name('site.connection.countOfScan');
    Route::get('connection/add-connection', [ConnectionController::class,'addConnection'])->name('site.connection.addConnection');
});

############### End Connection ####################

Route::get('/card-show/{shortLink}', [QrController::class,'show'])->name('site.card.qrShow');

############### shareQR ####################
Route::group(['middleware'=>'auth:web','prefix'=>'card'], function(){
    Route::get('/{id}', [CardController::class,'index'])->name('site.qr.show');
/*
    Route::get('/show/{id}', [CardController::class,'show'])->name('site.contacts.getContact');
    Route::post('/update/{id}', [CardController::class,'update'])->name('site.contacts.update');
    Route::get('/delete/{id}', [CardController::class,'delete'])->name('site.contacts.delete');
*/
});
############### End shareQR ####################
 Route::get('/max',[VerifyEmailController::class,'getMax'])->name('site.verifyEmail');
Route::get('/home-test',function(){
    return view('site.noActiveCards View');
   // return view('site.homeNormalView');
});

//Route::get('/card/{id}', [CardController::class,'signature'])->name('signature');
Route::get('/decrypt',function(){
//    return $madda = Crypt::decrypt($strink);

});

Route::get('/card-create',function() {
    //color(13,103,203)
    $url = 'https://1me.live/public/card-show/eyJpdiI6ImRpSXAyMG54K0J3aWJNQWplWGt2cXc9PSIsInZhbHVlIjoicU5XTkxsTXlmOGRqejVZNGVpdGtWdz09IiwibWFjIjoiODFkMmQzMWQ1YjQ3N2Y4NjUzOTg5OWM5MDliOTg0ZDk2YzNkYmNhZDc1OGE1ZDFiY2JkNWZkNGI0NDMzY2NjYSIsInRhZyI6IiJ9/eyJpdiI6InFkeXQ0eVZHQlVmS0gzWC9wN3dtSlE9PSIsInZhbHVlIjoiMlV5Q1BTMTUzSW9zWU5tdTZrK3NtZz09IiwibWFjIjoiYWEzOGI4NDNjMTM1N2YyMDUyNjNlYjI4NTBlOGUxOWFlMzgxZDczY2FkMWM2YTMxMzQ0MzhjZjY0YzRiYjMwZSIsInRhZyI6IiJ9';
            $userId = Auth::id();
            $card = Card::create([
                'name' => "test",
                'user_id' =>  63,
                'description' =>"description"
            ]);
            $image = QrCode::format('png')
                ->merge('img/OneMeLogo.png', 0.4, true)
                ->size(300)->errorCorrection('H')
                ->style('dot')
                ->eye('square')
                ->color(0,0,0)
              //  ->color(13,103,203)
                ->eyeColor(0, 13,103,203, 13,103,203)
                ->eyeColor(1, 13,103,203, 13,103,203)
                ->eyeColor(2, 13,103,203, 13,103,203)
                ->generate($url);
            $cardQrPath =  General::saveQr($image,'img/cardQr/');
            $card->update([
                'qr_url'=>$cardQrPath
            ]);
                return response()->json([
                    'status' => true,
                    'msg' => 'card added successfully',
                    ]);

});
Route::get('/test',function(){
    $card = Card::create([
        'name' => 'dsssss',
        'user_id' =>  65,
        'description' =>'sadsad',
        'short_link' => Str::random(5)
    ]);
    return 'suceess';
});

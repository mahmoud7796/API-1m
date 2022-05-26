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
use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use JeroenDesloovere\VCard\VCard;
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
     Route::get('/', [HomeController::class,'home'])->name('home');
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
    Route::get('/count-scan', [ConnectionController::class,'countOfScan'])->name('site.connection.countOfScan');
    Route::get('/add-connection', [ConnectionController::class,'addConnection'])->name('site.connection.addConnection');
    Route::get('/scaned-card/{id}', [ConnectionController::class,'scanCard'])->name('site.contacts.scanCard');
    Route::get('/connection-card-contact/{id}', [ConnectionController::class,'getConnectionCardContact'])->name('site.contacts.getConnectionCardContact');
    Route::get('/download-vcf/{card}', [QrController::class,'downloadVcf'])->name('site.contacts.downloadVcf');
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

            $image = QrCode::format('png')
                ->merge('img/16533960976dddddd62-modified.png', 0.4, true)
                ->size(500)->errorCorrection('H')
                ->style('dot')
                ->eye('square')
                ->color(0,0,0)
               // ->color(13,103,203)
                ->eyeColor(0, 157,32,100, 157,32,100)
                ->eyeColor(1, 157,32,100, 157,32,100)
                ->eyeColor(2, 157,32,100, 157,32,100)
                ->generate('https://almthaqalkhliji.business.site/');
            $cardQrPath =  General::saveQr($image,'img/cardQr/');

                return response()->json([
                    'status' => true,
                    'msg' => 'card added successfully',
                    ]);

});
Route::get('/test',function(){
    $arr = ['instagram-big.svg','phone-big.svg','Pinterest-big-big.svg','Twitter-big.svg','linkedin-big.svg','fb-big.svg','Gmail-big.svg','github-big.svg','WhatsApp-big.svg'];

    foreach ($arr as $_arr ){
        echo $name= 'https://1me.live/public/public/images/providers/'.$_arr."<br>";
    }

/*    $card = Card::create([
        'name' => 'dsssss',
        'user_id' =>  65,
        'description' =>'sadsad',
        'short_link' => Str::random(5)
    ]);*/
    return 'suceess';
});

Route::get('/vTest',function(){
    $card = Card::whereId(142)->first();
    return \App\Helper\ContactVcf::typeOfContact($card);
    $vcard = new VCard();
$arr = ['info@jeroendesloovere.be','info2@jeroendesloovere.be','info3@jeroendesloovere.be'];
// define variables
    $lastname = '';
    $firstname = 'mada diab';
    $additional = '';
    $prefix = '';
    $suffix = '';
// add personal data
    $vcard->addName($firstname, $lastname, $additional, $prefix, $suffix);
// add work data
        $vcard->addCompany("my company");
        $vcard->addJobtitle('Web Developer');
        $vcard->addRole('Data Protection Officer');

        //array (emails)
    foreach ($arr as $_arr){
        $vcard->addEmail($_arr);
    }

    //arr
        $vcard->addPhoneNumber(1099912408, 'HOME');


    return $vcard->download();

});

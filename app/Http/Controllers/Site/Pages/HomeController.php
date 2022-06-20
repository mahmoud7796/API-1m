<?php

namespace App\Http\Controllers\Site\Pages;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Contact;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landingPage()
    {
      //  return 'sds';
        return view('site.pages.landingPage');
    }

    public function home()
    {
        //$countScans = Card::select('id')->withCount('view')->get()->toArray();
        $userId = Auth::id();
            return      $cards= Card::whereUserId($userId)->with('contact.provider')->withCount('view')->paginate(3);
      // return $cards[0]['contact'][0]['provider'];
       foreach ($cards as $index => $val){
           echo $val->contact[0]['provider']['name'];
        }
/*        $contacts = Contact::with('provider')->whereUserId($userId)->get();
       $users = User::whereId($userId)->first();
        return view('site.pages.home',compact('cards','userId','contacts','users'));*/
    }

    public function getCard()
    {
        $card = Card::get();
        $card->contact();
        return 'ds';
    }
}

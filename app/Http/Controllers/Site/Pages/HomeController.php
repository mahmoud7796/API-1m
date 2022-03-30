<?php

namespace App\Http\Controllers\Site\Pages;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Contact;
use App\Models\Provider;
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
        $userId = Auth::id();
        $cards= Card::whereUserId($userId)->paginate(3);
        $contacts = Contact::with('provider')->whereUserId($userId)->get();
        return view('site.pages.home',compact('cards','userId','contacts'));
    }

    public function getCard()
    {
        $card = Card::get();
        $card->contact();
        return 'ds';
    }
}

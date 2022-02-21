<?php

namespace App\Http\Controllers\Site\Pages;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Contact;
use Auth;
class ProfileController extends Controller
{
    public function profile(){
        $user = Auth::user();
        $cards = Card::whereUserId($user->id)->count();
        $contacts = Contact::whereUserId($user->id)->count();
        return view('site.pages.profile',compact('user','cards','contacts'));
    }
}

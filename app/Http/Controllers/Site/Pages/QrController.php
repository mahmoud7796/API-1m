<?php

namespace App\Http\Controllers\Site\Pages;


use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\User;
use Auth;
use DB;


class QrController extends Controller
{
    public function show($shortLink)
    {
        try {
             $cards = Card::whereShortLink($shortLink)->with('contact')->first();
             if(!$cards){
                 return back();
             }
              $contacts= $cards->contact;
             $users = User::whereId($cards->user_id)->first();
            return view('qrGenerate',compact('cards','contacts','users'));
        } catch (\Exception $e ) {
            return "invalid URL";
        }
    }

}

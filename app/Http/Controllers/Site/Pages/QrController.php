<?php

namespace App\Http\Controllers\Site\Pages;


use App\Helper\ContactVcf;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Contact;
use App\Models\User;
use Auth;
use DB;
use JeroenDesloovere\VCard\VCard;


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

    public function downloadVcf(Card $card)
    {
        try {
            if(!$card){
                return redirect()->back();
            }
            $contactVcf = new ContactVcf();
            $contactVcf->typeOfContact($card);
            $vPhoneCard = $contactVcf->getPhone();
            $vEmailsCard = $contactVcf->getEmail();
            $vcard = new VCard();
            $user = User::whereId($card->user_id)->first();
            $firstname =$user->fullName;
            $vcard->addName($firstname);
                $vcard->addEmail('@1','Email');
            $vcard->addEmail('@2','Email');
            $vcard->addEmail('@3','Email');
            $vcard->addEmail('@4','Email');
            $vcard->addEmail('@5','Email');
            $vcard->addEmail('@6','Email');


            foreach ($vPhoneCard as $_vPhoneCard){
                $vcard->addPhoneNumber($_vPhoneCard, 'WORK');
            }
            return $vcard->download();
        } catch (\Exception $e ) {
           // return $e;
            return "invalid URL";
        }
    }

}

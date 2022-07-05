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
            $cards = Card::whereShortLink($shortLink)->first();
            if(!$cards){
                return back();
            }
             $mails = Card::whereShortLink($shortLink)->with(['contact'=>function($q){
                 $q->where('provider_id',6)->get();
             }])->first();

            //mobile
            $mobile = Card::whereShortLink($shortLink)->with(['contact'=>function($q){
                $q->where('provider_id',4)->get();
            }])->first();

            //office
            $officeNum = Card::whereShortLink($shortLink)->with(['contact'=>function($q){
                $q->where('provider_id',7)->get();
            }])->first();

            //other
            $other = Card::whereShortLink($shortLink)->with(['contact'=>function($q){
                $q->whereNotIn('provider_id',[6,4,7])->get();
            }])->first();
             $mailContacts= $mails->contact;
             $mobileContacts= $mobile->contact;
             $officeContacts= $officeNum->contact;
             $otherContacts= $other->contact;
            $users = User::whereId($cards->user_id)->first();
            return view('qrGenerate',compact('cards','mailContacts','mobileContacts','officeContacts','otherContacts','users'));
        } catch (\Exception $e ) {
            return $e;
            return "invalid URL";
        }
    }

    public function downloadVcf(Card $card)
    {
        try {
            if (!$card) {
                return redirect()->back();
            }
            $contactVcf = new ContactVcf();
            $contactVcf->typeOfContact($card);
            $vPhoneCard = $contactVcf->getPhone();
            $vEmailsCard = $contactVcf->getEmail();
            $vcard = new VCard();
            $user = User::whereId($card->user_id)->first();
            $firstname = $user->fullName;
            $vcard->addName($firstname);
            if (isset($vPhoneCard) && count($vPhoneCard) > 0)
            {
                foreach ($vPhoneCard as $_vPhoneCard) {
                    $contact = Contact::where('contact_string',$_vPhoneCard)->first();
                    $contact->provider_id==7?
                    $vcard->addPhoneNumber($_vPhoneCard, 'WORK'):$vcard->addPhoneNumber($_vPhoneCard, 'Mobile');
                }
            }
            if (isset($vEmailsCard) && count($vEmailsCard) > 0)
            {
                foreach ($vEmailsCard as $_vEmailsCard){
                    $vcard->addEmail($_vEmailsCard,'Email');
                }
            }
            return $vcard->download();
        } catch (\Exception $e ) {
            // return $e;
            return "invalid URL";
        }
    }

}

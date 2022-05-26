<?php

namespace App\Helper;


class ContactVcf {
    public $phone = [];
    public $email = [];


    public function typeOfContact(object $card){
        $card->load('contact');
        foreach ($card->contact as $contact){
            $contact->provider->name=="Phone Number" ? $this->phone=$contact->contact_string : $this->email=$contact->contact_string;
        }
        return $this ->email;
        return $this ->phone;
    }



}




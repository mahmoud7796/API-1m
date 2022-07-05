<?php

namespace App\Helper;


use App\Models\Provider;

class ContactVcf {
    public $phone= [];
    public $email= [];

    public function typeOfContact(object $card){
        $phone= [];
        $email= [];
        $providerPhoneIds = Provider::whereIn('name',['Mobile Number','Office Number'])->pluck('id')->toArray();
        $contact = $card->load('contact')->contact->toArray();
        for ($i=0;$i<count($contact);$i++){
            in_array($contact[$i]['provider_id'],$providerPhoneIds) ?
                array_push($phone,$contact[$i]['contact_string']) :
                array_push($email,$contact[$i]['contact_string']);
        }
        $this->setEmail($email);
        $this->setPhone($phone);
    }

    public function setPhone(array $phone): array
    {
        return $this->phone=$phone;
    }

    public function setEmail(array $email): array
    {
        return $this->email=$email;
    }


    public function getPhone(): array
    {
        return $this->phone;
    }

    public function getEmail(): array
    {
        return $this->email;
    }


}




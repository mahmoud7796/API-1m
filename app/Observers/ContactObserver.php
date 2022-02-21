<?php

namespace App\Observers;

use App\Models\Contact;

class ContactObserver
{
    public function deleted(Contact $contact)
    {
        $contact -> card()->detach();
    }


}

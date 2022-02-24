<?php

namespace App\Traits;


use App\Exceptions\NotAuthrizedException;
use App\Exceptions\NotFoundException;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Gate;
use Auth;

trait ContactControllerTrait
{
    /**
     * @throws NotFoundException
     * @throws NotAuthrizedException
     */

    function indexContact()
    {
        $contact = Contact::get();
        if (!$contact) {
            throw new NotFoundException();
        }
        return $contact;
    }

    function showContact($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            throw new NotFoundException();
        }
        if (!Gate::allows('view', $contact)) {
            throw new NotAuthrizedException();
        }
        return $contact;
    }

    function createContact(ContactRequest $request)
    {
        $userId = Auth::id();
        Contact::create([
            'contact_string' => $request->contact,
            'provider_id' => $request->provider_id,
            'user_id' => $userId,
        ]);
    }

    function updateContact(ContactRequest $request, $id)
    {
        $userId = Auth::id();
        $contact = Contact::find($id);
        if (!$contact) {
            throw new NotFoundException();
        }
        if (!Gate::allows('view', $contact)) {
            throw new NotAuthrizedException();
        }
        $contact->update([
            'contact_string' => $request->contact,
            'provider_id' => $request->provider_id,
            'user_id' => $userId,
        ]);
    }

    function deleteContact($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            throw new NotFoundException();
        }
        if (!Gate::allows('view', $contact)) {
            throw new NotAuthrizedException();
        }
        return $contact;
    }
}

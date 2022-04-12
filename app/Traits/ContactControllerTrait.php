<?php

namespace App\Traits;


use App\Exceptions\NotAuthrizedException;
use App\Exceptions\NotFoundException;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Auth;

trait ContactControllerTrait
{
    /**
     * @throws NotFoundException
     * @throws NotAuthrizedException
     */

    function indexContact($userId)
    {
        $contact = Contact::with('provider')->whereUserId($userId)->get();
        return $contact;
    }

    function showContact($contactId, $userId)
    {
        $contact = Contact::find($contactId);

        if (!$contact) {
            throw new NotFoundException();
        }
        $authUserId = $contact->user_id;
        if ($userId != $authUserId) {
            throw new NotAuthrizedException;
        }

        return $contact;
    }

    function createContact($request, $userId)
    {
        Contact::create([
            'contact_string' => $request->contact,
            'provider_id' => $request->providerId,
            'user_id' => $userId,
        ]);
    }

    function updateContact(ContactRequest $request, $userId, $contactId)
    {
        $contact = Contact::find($contactId);

        if (!$contact) {
            throw new NotFoundException();
        }
        $authUserId = $contact->user_id;
        if ($userId != $authUserId) {
            throw new NotAuthrizedException;
        }
        $contact->update([
            'contact_string' => $request->contact,
            'provider_id' => $request->provider_id,
            'user_id' => $userId,
        ]);
        return $contact;
    }

    function deleteContact($contactId, $userId)
    {
        $contact = Contact::find($contactId);

        if (!$contact) {
            throw new NotFoundException();
        }
        $authUserId = $contact->user_id;
        if ($userId != $authUserId) {
            throw new NotAuthrizedException;
        }
        return $contact;
    }
}

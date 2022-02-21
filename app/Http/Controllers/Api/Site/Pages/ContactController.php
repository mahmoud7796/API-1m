<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Traits\ResponseJson;
use Auth;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    use ResponseJson;

    public function index($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            throw new NotFoundException;
        }
        if (!Gate::allows('view', $contact)) {
            return $this->jsonResponseError(true, 'Not authorized', 401);
        }
        return $this->jsonResponse(new ContactResource($contact), false, '', 200);
    }

    public function create(ContactRequest $request)
    {
        $userId = Auth::id();
        Contact::create([
            'contact_string' => $request->contact,
            'provider_id' => $request->provider_id,
            'user_id' => $userId,
        ]);
        return $this->jsonResponse('', false, 'Your contact created successfully', 200);
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            throw new NotFoundException;
        }
        if (!Gate::allows('edit', $contact)) {
            return $this->jsonResponseError(true, 'Not authorized', 401);
        }
        return response()->json($contact);
    }


    public function update(ContactRequest $request, $id)
    {
        $userId = Auth::id();
        $contact = Contact::find($id);

        if (!$contact) {
            throw new NotFoundException;
        }
        if (!Gate::allows('edit', $contact)) {
            return $this->jsonResponseError(true, 'Not authorized', 401);
        }

        $contact->update([
            'contact_string' => $request->contact,
            'provider_id' => $request->provider_id,
            'user_id' => $userId,
        ]);

        return $this->jsonResponse('', false, 'Your contact updated successfully', 200);

    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            throw new NotFoundException;
        }
        if (!Gate::allows('delete', $contact)) {
            return $this->jsonResponseError(true, 'Not authorized', 401);
        }
        $contact->delete();
        return $this->jsonResponse('', false, 'Your contact deleted successfully', 200);

    }

}

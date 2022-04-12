<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Exceptions\NotAuthrizedException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Traits\ContactControllerTrait;
use App\Traits\ResponseJson;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    use ResponseJson, ContactControllerTrait;

    public function index()
    {
        try {
            $authId = auth('sanctum')->Id();
            $contact = Contact::with('provider')->whereUserId($authId)->get();
            return $this->jsonResponse(ContactResource::collection($contact), false, '', 200);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'contact' => ['required', 'string', 'max:255'],
                'providerId' => ['required', 'integer'],
            ]);

            if ($validator->fails()) {
                return $this->jsonResponseError(true, $validator->errors(), 400);
            }
            $userId = Auth::id();
            Contact::create([
                'contact_string' => $request->contact_string,
                'provider_id' => $request->provider_id,
                'user_id' => $userId,
            ]);
            return $this->jsonResponse('', false, 'Your contact created successfully', 200);
        } catch (\Exception $e) {
           // return $e;
            return $this->jsonResponse('', true, 'Something went wrong', 501);
        }
    }

    public function show($contactId)
    {
        try {
            $userId = Auth::id();
            $contact = $this->showContact($contactId, $userId);

            return $this->jsonResponse(new ContactResource($contact), false, '', 200);
        } catch (NotFoundException | NotAuthrizedException $e) {
            return $e->render();
        }
    }

    public function update(Request $request, $contactId)
    {
        try {
            $validator = Validator::make($request->all(), [
                'contact' => ['required', 'string', 'max:255'],
                'providerId' => ['required', 'integer'],
            ]);

            if ($validator->fails()) {
                return $this->jsonResponseError(true, $validator->errors(), 400);
            }
            $userId = Auth::id();
            $contact = Contact::whereUserId($userId)->find($contactId);
            if(!$contact){
                return $this->jsonResponse('', true, 'Contact not found', 404);
            }
            if ($userId !== $contact->user_id) {
                return $this->jsonResponse('', true, 'Not authrozied', 301);
            }
            $contact->update([
                'contact' => $request->contact,
                'providerId' => $request->contact,
                'user_id' => $userId,
            ]);
            return $this->jsonResponse('', false, 'Your contact updated successfully', 200);
        } catch (\Exception $e) {
            return $e;
            return $this->jsonResponse('', true, 'Something went wrong', 501);
        }
    }

    public function destroy($contactId)
    {
        $authId = auth('sanctum')->Id();
        $contact = Contact::find($contactId);
        if(!$contact){
            return $this->jsonResponse('', true, 'Not found', 301);
        }
        if ($authId!==$contact->user_id) {
            return $this->jsonResponse('', true, 'Not authorized', 402);
        }
        $contact->delete();
        return $this->jsonResponse('', false, 'Contact deleted successfully', 200);
    }
}

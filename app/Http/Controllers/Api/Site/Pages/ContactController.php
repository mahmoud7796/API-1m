<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Exceptions\NotAuthrizedException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Models\User;
use App\Traits\ContactControllerTrait;
use App\Traits\ResponseJson;
use Auth;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use ResponseJson, ContactControllerTrait;

    public function index(Request $request)
    {
        try {
             $userId = $request->userId;
            if (!$userId){
                throw new NotFoundException;
            }
              $contact = $this->indexContact($userId);
            return $this->jsonResponse(ContactResource::collection($contact), false, '', 200);
        } catch (NotFoundException | NotAuthrizedException $e) {
            return $e->render();
        }
    }

    public function store(ContactRequest $request)
    {
        try {
            if(!$request->userId){
                return $this->jsonResponse('', true, 'user_id required', 402);
            }
            $this->createContact($request,$request->userId);
            return $this->jsonResponse('', false, 'Your contact created successfully', 200);
        } catch (\Exception $e) {
            return $e;
            return $this->jsonResponse('', true, 'Something went wrong', 501);
        }
    }

    public function show(Request $request, $contactId)
    {
        try {
            if(!$request->userId){
                return $this->jsonResponse('', true, 'user_id required', 402);
            }
            $contact = $this->showContact($contactId,$request->userId);

            return $this->jsonResponse(new ContactResource($contact), false, '', 200);
        } catch (NotFoundException | NotAuthrizedException $e) {
            return $e->render();
        }
    }

    public function update(ContactRequest $request, $contactId)
    {
        try {
            $userId = $request->userId;
            if(!$userId){
                return $this->jsonResponse('', true, 'user_id required', 402);
            }
      //    return  $contact = Contact::find($contactId);
            $this->updateContact($request,$request->userId,$contactId);
            return $this->jsonResponse('', false, 'Your contact updated successfully', 200);
        } catch (NotFoundException | NotAuthrizedException $e) {
            return $e->render();
            return $this->jsonResponse('', true, 'Something went wrong', 501);
        }
    }

    public function delete(Request $request, $contactId)
    {
        try {
            if(!$request->userId){
                return $this->jsonResponse('', true, 'user_id required', 402);
            }
            $contact = $this->deleteContact($contactId,$request->userId);
            $contact->delete();
            return $this->jsonResponse('', false, 'Contact deleted successfully', 501);
        } catch (NotFoundException | NotAuthrizedException $e) {
            return $e->render();
        }

    }
}

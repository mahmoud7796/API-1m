<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Exceptions\NotAuthrizedException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Traits\ContactControllerTrait;
use App\Traits\ResponseJson;
use Auth;

class ContactController extends Controller
{
    use ResponseJson, ContactControllerTrait;

    public function index()
    {
        try {
            $contact = $this->indexContact();
            return $this->jsonResponse(ContactResource::collection($contact), false, '', 200);
        } catch (NotFoundException | NotAuthrizedException $e) {
            return $e->render();
        }
    }

    public function create(ContactRequest $request)
    {
        try {
            $this->createContact($request);
            return $this->jsonResponse('', false, 'Your contact created successfully', 200);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function show($id)
    {
        try {
            $contact = $this->showContact($id);
            return response()->json($contact);
        } catch (NotFoundException | NotAuthrizedException $e) {
            return $e->render();
        }
    }

    public function update(ContactRequest $request, $id)
    {
        try {
            $this->updateContact($request, $id);
            return $this->jsonResponse('', false, 'Your contact updated successfully', 200);
        } catch (NotFoundException | NotAuthrizedException $e) {
            return $e->render();
        }
    }

    public function delete($id)
    {
        try {
            $contact = $this->deleteContact($id);
            $contact->delete();
            return $this->jsonResponse('', false, 'Your contact deleted successfully', 200);
        } catch (NotFoundException | NotAuthrizedException $e) {
            return $e->render();
        }

    }
}

<?php

namespace App\Http\Controllers\Site\Pages;

use App\Exceptions\NotAuthrizedException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Traits\ContactControllerTrait;
use Auth;

class ContactController extends Controller
{
    use ContactControllerTrait;

    public function create(ContactRequest $request)
    {
        try{
            $this->createContact($request);
            return response()->json([
                'status' => true,
                'msg' => 'added successfully',
            ]);
        }catch(\Exception $e){
            return  $e;
        }


    }
    public function show($id){
        try{
            $contact = $this->showContact($id);
            return response()->json($contact);
        }catch(NotFoundException $e){
                return response()->json([
                    'status' => false,
                    'msg' => 'Not Found',
                ]);
        }catch (NotAuthrizedException $e){
            return redirect()->back();
        }
    }

    public function update(ContactRequest $request, $id){
        try {
            $this->updateContact($request,$id);
            return response()->json([
                'status' => true,
            ]);
        }catch(NotFoundException $e){
            return response()->json([
                'status' => false,
                'msg' => 'Not Found',
            ]);
        }catch (NotAuthrizedException $e){
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $contact= Contact::find($id);
        $contact->delete();
        return response()->json([
            'status' => true,
        ]);
    }

}

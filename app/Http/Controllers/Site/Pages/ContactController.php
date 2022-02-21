<?php

namespace App\Http\Controllers\Site\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Auth;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sotreInSession(Request $request)
    {
        session()->push('card.contactId',$request->contactId);
        return response()->json([
            'status' => true,
            'msg' => 'Contact added successfully',
        ]);
    }

    public function create(ContactRequest $request)
    {
        $userId= Auth::id();
        Contact::create([
            'contact_string' => $request->contact,
            'provider_id' => $request->provider_id,
            'user_id' => $userId,
        ]);

        return response()->json([
            'status' => true,
            'msg' => 'added successfully',
        ]);
    }

    public function edit($id)
    {
        $userId= Auth::id();
        $contact= Contact::find($id);
        if($userId!==$contact->user_id) {
            return redirect()->back();
        }
            return response()->json($contact);
    }


    public function update(ContactRequest $request, $id){
        $userId= Auth::id();
        $contact = Contact::find($id);
        if($userId!==$contact->user_id) {
            return redirect()->back();
        }
        if (!$contact)
            return response()->json([
                'status' => false,
                'msg' => 'SomeThing Error Try Again',
            ]);
        else
            $contact->update([
                'contact_string' => $request->contact,
                'provider_id' => $request->provider_id,
                'user_id' => $userId,
            ]);

        return response()->json([
            'status' => true,
        ]);
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

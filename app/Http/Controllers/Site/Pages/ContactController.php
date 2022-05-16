<?php

namespace App\Http\Controllers\Site\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Provider;
use Auth;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    public function index()
    {
        try {
            $userId = Auth::id();
            $verifiedContacts = Contact::whereUserId($userId)->whereIsVerified(1)->paginate(3, ['*'], 'verified');
            $unVerifiedContacts = Contact::whereUserId($userId)->whereIsVerified(0)->paginate(3, ['*'], 'unverified');
            $providers = Provider::get();
            return view('site.pages.contactInfo', compact('providers', 'unVerifiedContacts', 'verifiedContacts'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function store(ContactRequest $request)
    {
        try {
            $saveContact = Contact::create([
                'contact_string' => $request->contact,
                'provider_id' => $request->providerId,
                'user_id' => Auth::id()
            ]);
            if ($saveContact) {
                return response()->json([
                    'status' => true,
                    'msg' => 'added successfully',
                ]);
            }

        } catch (\Exception $e) {
            return $e;
        }
    }


    public function show($id)
    {
        try {
            $userId = Auth::id();
            $contact = Contact::whereUserId($userId)->whereId($id)->first();
            if(!$contact){
                return response()->json([
                        'status' => false,
                        'msg' => 'notFond'
                    ]
                );
            }
            if (!Gate::allows('view', $contact)) {
                return redirect()->back();
            }
            return response()->json([
                'status' => false,
                'contact' => $contact
            ]);
        } catch (\Exception $e) {
            return $e;
            return response()->json([
                'status' => false,
                'msg' => 'Not Found',
            ]);
        }
    }

    public function update(ContactRequest $request, $id)
    {
        try {
            $userId = Auth::id();
            $contact = Contact::whereUserId($userId)->whereId($id)->first();
            if(!$contact){
                return response()->json([
                        'status' => false,
                        'msg' => 'notFond'
                    ]
                );
            }
            if (!Gate::allows('view', $contact)) {
                return redirect()->back();
            }

            $contact->update([
                'contact_string' => $request->contact,
                'provider_id' => $request->providerId,
                'user_id' => $userId
            ]);
            if ($contact) {
                return response()->json([
                    'status' => true,
                    'msg' => 'added successfully',
                ]);
            }

        } catch (\Exception $e) {
            return $e;
        }
    }

    public function delete(Contact $contact)
    {
        if(!$contact){
            return response()->json([
                    'status' => false,
                    'msg' => 'notFond'
                ]
            );
        }
        if (!Gate::allows('view', $contact)) {
            return redirect()->back();
        }
        $contact->delete();
        return response()->json([
            'status' => true,
        ]);
    }

}

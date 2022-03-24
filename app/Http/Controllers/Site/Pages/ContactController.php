<?php

namespace App\Http\Controllers\Site\Pages;

use App\Exceptions\NotAuthrizedException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Provider;
use Auth;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        try {
            $userId= Auth::id();
            $verifiedContacts = Contact::whereUserId($userId)->whereIsVerified(1)->paginate(3, ['*'], 'verified');
            $unVerifiedContacts = Contact::whereUserId($userId)->whereIsVerified(0)->paginate(3, ['*'], 'unverified');
            $providers = Provider::get();
            return view('site.pages.contactInfo',compact('providers','unVerifiedContacts','verifiedContacts'));
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
            if($saveContact){
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
            $contact = $this->showContact($id);
            return response()->json($contact);
        } catch (NotFoundException $e) {
            return response()->json([
                'status' => false,
                'msg' => 'Not Found',
            ]);
        } catch (NotAuthrizedException $e) {
            return redirect()->back();
        }
    }

    public function update(ContactRequest $request, $id)
    {
        try {
            $this->updateContact($request, $id);
            return response()->json([
                'status' => true,
            ]);
        } catch (NotFoundException $e) {
            return response()->json([
                'status' => false,
                'msg' => 'Not Found',
            ]);
        } catch (NotAuthrizedException $e) {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return response()->json([
            'status' => true,
        ]);
    }

}

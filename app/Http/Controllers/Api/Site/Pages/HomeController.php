<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Http\Resources\ContactResource;
use App\Models\Card;
use App\Models\Contact;
use App\Models\Provider;
use App\Traits\ResponseJson;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    use ResponseJson;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landingPage()
    {
        return view('site.pages.landingPage');
    }

    public function home()
    {
        $userId = Auth::id();
        $contacts = Contact::whereUserId($userId)->get();
        $providers = Provider::get();
        $cards= Card::whereUserId($userId)->withCount(['contact'])->get();
        return view('site.pages.home',compact('contacts','providers','cards'));
    }

    public function contactSearch(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'keyword'=>'required|string',
            ]);
            if ($validator->fails()){
                return $this->jsonResponseError(true,$validator->messages(),  200);
            }
            $authUser = Auth::id();
            $contact = ContactResource::collection(Contact::whereUserId($authUser)->where('contact_string','like', '%'.$request->keyword.'%')->get());
            return $this->jsonResponse($contact, false, '', 200);

        } catch (\Exception $ex) {
            // return $ex;
            return $this->jsonResponseError(true,'something went wrong',200);
        }
    }

    public function cardSearch(Request $request)
    {
        try {
            $validator = $this->validate($request, [
                'keyword'=>['required|string'],
            ]);
            if(!$validator) {
                return $validator;
            }

/*            $validator = Validator::make($request->all(),[
                'keyword'=>'required|string',
            ]);
            if ($validator->fails()){
                return $this->jsonResponseError(true,$validator->messages(),  200);
            }*/
            $authUser = Auth::id();
                       $card = CardResource::collection(
                            Card::with('contact.provider')
                            ->whereUserId($authUser)->where('name','like', '%'.$request->keyword.'%')->get()
                        );
            return $this->jsonResponse($card, false, '', 200);

        } catch (\Exception $ex) {
            // return $ex;
            return $this->jsonResponseError(true,'something went wrong',200);
        }
    }
}

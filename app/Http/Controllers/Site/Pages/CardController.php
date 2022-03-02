<?php

namespace App\Http\Controllers\Site\Pages;

use App\Exceptions\NotAuthrizedException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Http\Resources\CardResource;
use App\Models\Card;
use App\Models\CardContact;
use App\Models\Contact;
use Auth;
use DB;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(Request $request)
    {
        try {
            $userId = $request->userId;
            $authId = auth('sanctum')->Id();
            if (!$userId) {
                throw new NotFoundException;
            }
            if ($userId!=$authId) {
                throw new NotAuthrizedException;
            }
          return   $cards = Card::with('contact')->whereUserId($userId)->get();
           // return $this->jsonResponse(CardResource::collection($cards), false, '', 200);
        } catch (NotFoundException | NotAuthrizedException $e) {
            return $e->render();
        }
    }


    public function store(CardRequest $request)
    {
        $authId = auth('sanctum')->Id();
        $card = Card::create([
            'name' => $request->card,
            'user_id' => $authId,
        ]);

     $contacts = $request->contactsIds;
        if($contacts){
            for ($i=0;$i<count($contacts);$i++){
                CardContact::create([
                    'contact_id' => $contacts[$i],
                    'card_id' => $card->id
                ]);
            }
        }
        return response()->json([
            'status' => true,
            'msg' => 'Card added successfully',
        ]);
    }


    public function edit($id)
    {
        $userId= Auth::id();
        $card= Card::find($id);
        $contactsThatInCard= Card::whereUserId($userId)->whereId($id)->with('contact:id')->first();
        $contactsId =  $contactsThatInCard->contact;
        $contactids = array();
          foreach($contactsId as $contactId) {
              $contactids[]=$contactId->id;
        }

       return response()->json([
            'card' => $card,
            'contactsThatInCard' => $contactids,
               'status' => true
            ]
        );
    }


    public function update(CardRequest $request)
    {
        try {
            $userId= Auth::id();
            $card = Card::whereUserId($userId)->find($request->card_id);
            if($userId!==$card->user_id) {
                return redirect()->back();
            }
            $card->contact()->detach();
            DB::beginTransaction();
            $card->update([
                'name' => $request->card,
                'user_id' => $userId,
            ]);

            $contacts = $request->contactsIds;
            if($contacts){
                for ($i=0;$i<count($contacts);$i++){
                    CardContact::create([
                        'contact_id' => $contacts[$i],
                        'card_id' => $card->id
                    ]);
                }
            }else{
                return response()->json([
                    'status' => true,
                    'msg' => 'Card added successfully',
                ]);
            }
            DB::commit();
            return response()->json([
                'status' => true,
                'msg' => 'Card added successfully',
            ]);

        }catch (Exception $ex){
            DB::rollback();
            return $ex;
        }
    }


    public function delete($id)
    {
        $card= Card::find($id);
        $card->delete();
        return response()->json([
            'status' => true,
        ]);
    }

}

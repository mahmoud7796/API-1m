<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\CardContact;
use App\Traits\ResponseJson;
use Auth;
use DB;

class CardController extends Controller
{
    use ResponseJson;

    public function store(CardRequest $request)
    {
       $userId= Auth::id();
        $card = Card::create([
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
        }
        return $this->jsonResponse('',false,'Card added successfully',200);
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

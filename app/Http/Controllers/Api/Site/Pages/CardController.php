<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Http\Resources\CardResource;
use App\Models\Card;
use App\Models\CardContact;
use App\Traits\ResponseJson;
use Auth;
use DB;

class CardController extends Controller
{
    use ResponseJson;

    public function index()
    {
        try {
            $card = Card::get();
            if (!$card) {
                return $this->jsonResponse('', true, 'There is no card', 404);
            }
            return $this->jsonResponse(CardResource::collection($card), false, '', 200);
        } catch (\Exception $ex) {
            return $ex;
            return $this->jsonResponse('', true, 'Something went wrong', 301);
        }
    }

    public function create(CardRequest $request)
    {
        try {
            DB::beginTransaction();
            $card = Card::create([
                'name' => $request->cardName,
                'user_id' => $request->userId,
            ]);

            $contacts = $request->contactIds;
            if ($contacts) {
                $contactCount = count($contacts);
                for ($i = 0; $i <$contactCount; $i++) {
                    CardContact::create([
                        'contact_id' => $contacts[$i],
                        'card_id' => $request->cardId
                    ]);
                }
            }
            DB::commit();
            return $this->jsonResponse('', false, 'Card created successfully', 200);
        } catch (\Exception $ex) {
            DB::rollback();
            return $ex;
            return $this->jsonResponse('', true, 'Something went wrong', 301);
        }
    }


        public function show($id)
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
            $userId = Auth::id();
            $card = Card::whereUserId($userId)->find($request->card_id);
            if ($userId !== $card->user_id) {
                return redirect()->back();
            }
            $card->contact()->detach();
            DB::beginTransaction();
            $card->update([
                'name' => $request->card,
                'user_id' => $userId,
            ]);

            $contacts = $request->contactsIds;
            if ($contacts) {
                for ($i = 0; $i < count($contacts); $i++) {
                    CardContact::create([
                        'contact_id' => $contacts[$i],
                        'card_id' => $card->id
                    ]);
                }
            } else {
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

        } catch (Exception $ex) {
            DB::rollback();
            return $ex;
        }
    }


    public function delete($id)
    {
        $card = Card::find($id);
        $card->delete();
        return response()->json([
            'status' => true,
        ]);
    }

}

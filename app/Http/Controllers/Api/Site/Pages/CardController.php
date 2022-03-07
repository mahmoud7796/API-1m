<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Http\Resources\CardResource;
use App\Http\Resources\UserResource;
use App\Models\Card;
use App\Models\CardContact;
use App\Traits\ResponseJson;
use Auth;
use DB;
use Illuminate\Http\Request;

class CardController extends Controller
{
    use ResponseJson;

    public function index(Request $request)
    {
        try {
            $userId = $request->userId;
            $authId = auth('sanctum')->Id();
            if (!$userId) {
                throw new NotFoundException;
            }
            if ($userId!=$authId) {
                return $this->jsonResponse('', true, 'Not authrized', 402);
            }
            $cards = Card::with('contact.provider')->whereUserId($userId)->get();
            return $this->jsonResponse(CardResource::collection($cards), false, '', 200);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function store(CardRequest $request)
    {
        try {
            $authId = auth('sanctum')->Id();
            DB::beginTransaction();
            $card = Card::create([
                'name' => $request->name,
                'user_id' => $authId,
            ]);
            $contacts = $request->contactInfoIds;
            if ($contacts) {
                $contactCount = count($contacts);
                for ($i = 0; $i < $contactCount; $i++) {
                    CardContact::create([
                        'contact_id' => $contacts[$i],
                        'card_id' => $card->id
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


    public function show(Request $request)
    {
        try {
            $authId = auth('sanctum')->Id();
            $card = Card::whereId($request->cardId)->whereUserId($authId)->first();
            if(!$card){
                return $this->jsonResponse('', true, 'Card not found', 404);
            }
            $cards = Card::with('contact.provider')->whereId($request->cardId)->whereUserId($authId)->get();
            $cardWithContacts = CardResource::collection($cards);
            $success['CardWithContacts'] = $cardWithContacts;
            $userData = auth('sanctum')->user();
            $user = new UserResource($userData);
            $success['owner'] = $user;
            return $this->jsonResponse($success, false, '', 200);
        } catch (\Exception $e) {
            return $e;
        }
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

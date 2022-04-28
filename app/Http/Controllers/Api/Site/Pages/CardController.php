<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Helper\General;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Http\Resources\UserResource;
use App\Models\Card;
use App\Models\CardContact;
use App\Traits\ResponseJson;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CardController extends Controller
{
    use ResponseJson;

    public function index()
    {
        try {
             $authId = auth('sanctum')->id();
             $cards = Card::with('contact.provider')->whereUserId($authId)->get();
            if(!$cards){
                return $this->jsonResponse('', true, 'There are no cards', 404);
            }
            return $this->jsonResponse(CardResource::collection($cards), false, '', 200);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
            ]);
            if ($validator->fails()) {
                return $this->jsonResponseError(true, $validator->errors(), 400);
            }
            $authId = Auth::id();
            DB::beginTransaction();
            $card = Card::create([
                'name' => $request->name,
                'user_id' => $authId,
            ]);
            $cardId= encrypt(93);
            $userId= encrypt(82);

            $qrUrl= 'https://1me.live/public/card-show/'.$cardId.'/'.$userId;
             $image = QrCode::format('png')
                ->merge('img/OneMeLogo.png', 0.4, true)
                ->size(300)->errorCorrection('H')
                ->style('round')
                ->color(13,103,203)
                ->generate('https://www.1me.live/public/card-show/eyJpdiI6IkpaU0plaWRSUmhMaWZ0UkpMVXp2Qnc9PSIsInZhbHVlIjoiOFArb1hQQUMzV3FuY1oyc1hiTkNFUT09IiwibWFjIjoiODU2NzM3MTcyMTAwMjc3YjgxOGU2MTAxYjZiOGMyYmY3ZTcwNDUzNzE5NDE5NDA1ZTFkMmYzNDU4MGU1NWFlZSIsInRhZyI6IiJ9/eyJpdiI6InM1ODE4NVNPWEJWOGZkMDEyT1c1Rnc9PSIsInZhbHVlIjoiYWtBd25VOG5Ja01sb2FuTEtyUXNrQT09IiwibWFjIjoiNGIyNmRhZTgyNjNiN2M0MTY4YTMwZmQwZTEzNjNiZmY1ZDE3NGNmMWU5MmE2N2ZjZGVmNjYzMzNiMWEzOTQ1ZSIsInRhZyI6IiJ9');
            $img = General::saveQr($image,'cardQr');
            $card->update([
                'qr_url'=>$img
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


    public function show($cardId)
    {
        try {
            $authId = auth('sanctum')->Id();
            $card = Card::whereId($cardId)->whereUserId($authId)->first();
            if(!$card){
                return $this->jsonResponse('', true, 'Not Found', 301);
            }
            $cards = Card::with('contact.provider')->whereId($cardId)->whereUserId($authId)->get();
            $cardWithContacts = CardResource::collection($cards);
            $success['CardWithContacts'] = $cardWithContacts;
            $userData = auth('sanctum')->user();
            $user = new UserResource($userData);
            $success['owner'] = $user;
            return $this->jsonResponse($success, false, '', 200);
        } catch (\Exception $e) {
           // return $e;
            return $this->jsonResponse('', true, 'Something went wrong', 301);
        }
    }


    public function update(Request $request,$card_id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'card' => ['required', 'string', 'max:255'],
            ]);
            if ($validator->fails()) {
                return $this->jsonResponseError(true, $validator->errors(), 400);
            }
            $userId = Auth::id();
            $card = Card::whereUserId($userId)->find($card_id);
            if(!$card){
                return $this->jsonResponse('', true, 'Card not found', 404);
            }
            if ($userId !== $card->user_id) {
                return $this->jsonResponse('', true, 'Not authrozied', 301);
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
            }
            DB::commit();
            return $this->jsonResponse('', false, 'Card updated successfully', 200);
        } catch (\Exception $ex) {
            DB::rollback();
           // return $ex;
            return $this->jsonResponse('', true, 'Something went wrong', 301);
        }
    }


    public function destroy($id)
    {
        $authId = Auth::id();
        $card = Card::find($id);
        if(!$card){
            return $this->jsonResponse('', true, 'Not found', 301);
        }
        if ($authId!==$card->user_id) {
            return $this->jsonResponse('', true, 'Not authrized', 402);
        }
        $card->delete();
        return $this->jsonResponse('', false, 'Card deleted successfully', 200);
    }

    public function share($cardId)
    {
        try {
            $authId = auth('sanctum')->Id();
            $card = Card::whereId($cardId)->whereUserId($authId)->first();
            if(!$card){
                return $this->jsonResponse('', true, 'Not Found', 301);
            }
            $success['card']['qr_url']= $card->qr_url;
            $cardId= encrypt($card->id);
            $success['card']['shareUrl'] = asset('card-show/'.$cardId);
            return $this->jsonResponse($success, false, '', 200);
        } catch (\Exception $e) {
            // return $e;
            return $this->jsonResponse('', true, 'Something went wrong', 301);
        }
    }

    public function featuredCard()
    {
        try {
            $authId = auth('sanctum')->id();
            $cards = Card::with('contact.provider')->whereUserId($authId)->whereIsFeatured(1)->get();
            if(!$cards){
                return $this->jsonResponse('', true, 'There are no featured cards', 404);
            }
            return $this->jsonResponse(CardResource::collection($cards), false, '', 200);
        } catch (\Exception $e) {
            //return $e;
            return $this->jsonResponse('', true, 'Something went wrong', 301);
        }
    }

    public function changeFeatured(Request $request)
    {
        try {
            $authId = auth('sanctum')->id();
            $cardId= $request->cardId;
            if(!$cardId){
                return $this->jsonResponse('', true, 'cardId required', 404);
            }
            $card = Card::whereUserId($authId)->find($cardId);
            if(!$card){
                return $this->jsonResponse('', true, 'Card not found', 404);
            }
             $isFeatured = $card -> is_featured == 1 ? 0:1;
            $card-> update([
                'is_featured'=>$isFeatured
            ]);
            return $this->jsonResponse('',false,'isFeatured changed',200);
        } catch (\Exception $e) {
            //return $e;
            return $this->jsonResponse('', true, 'Something went wrong', 301);
        }
    }

}

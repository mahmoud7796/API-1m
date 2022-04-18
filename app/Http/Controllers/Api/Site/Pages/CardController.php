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
                'card' => $request->name,
                'user_id' => $authId,
            ]);
             $image = QrCode::format('png')
                ->merge('img/OneMeLogo.png', 0.4, true)
                ->size(300)->errorCorrection('H')
                ->style('round')
                ->color(13,103,203)
                ->generate($card->id);
            $cardQrPath= new General();
            $cardQrPath =  $cardQrPath->saveImage($image);
            $card->update([
                'qr_url'=>$cardQrPath
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
         //   return $ex;
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

}

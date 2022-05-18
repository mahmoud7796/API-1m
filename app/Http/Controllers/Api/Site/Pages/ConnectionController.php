<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Http\Resources\UserResource;
use App\Models\Card;
use App\Models\User;
use App\Models\View;
use App\Traits\ContactControllerTrait;
use App\Traits\ResponseJson;
use Auth;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    use ResponseJson, ContactControllerTrait;

    public function addedCount(Request $request)
    {
        try {
             $authId = auth('sanctum')->Id();
            $userId=$request->userId;
            if(!$userId){
                return $this->jsonResponse('', true, 'User_id required', 404);
            }
            if($userId !=$authId){
                return $this->jsonResponse('', true, 'Not authrized', 403);
            }
                $added=User::whereId($userId)->withCount('added')->first()->added_count;
            return $this->jsonResponse($added, false, '', 200);

        } catch ( \Exception $e) {
        }
    }

    public function scanCard(Request $request)
    {
        try{
            $shortLink= $request->shortLink;
            $cards = Card::whereShortLink($shortLink)->with('contact.provider')->first();
            $user = User::whereId(Auth::id())->first();

            if(!$cards){
                return $this->jsonResponse('', true, 'there is no card', 403);
            }
            $cardId = $cards->id;
            $viewedId= $cards->user_id;
            $viewedIds = View::whereViewerId(Auth::id())->pluck('viewed_id')->toArray();
            $cardIds = View::whereViewerId(Auth::id())->pluck('card_id')->toArray();
            $checkIfInViewedIds= in_array($viewedId, $viewedIds);
            $checkIfInCardIds=  in_array($cardId, $cardIds);
            if (!$checkIfInViewedIds || !$checkIfInCardIds){
                View::create([
                    'viewed_id'=>$viewedId ,
                    'card_id' => $cardId,
                    'viewer_id'=>Auth::id()
                ]);
            }
            $success['card']=new CardResource($cards);
            $success['owner']=new UserResource($user);
            return $this->jsonResponse($success, false, '', 200);
        }catch (\Exception $ex){
            return $ex;
            return $this->jsonResponse('', true, 'Something went wrong', 403);
        }
    }
}



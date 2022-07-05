<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Http\Resources\UserResource;
use App\Models\Card;
use App\Models\Connection;
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
                return $this->jsonResponse('', true, 'Not authorized', 403);
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
            $cards = Card::whereShortLink($shortLink)->with('contact.provider','user')->first();
            if(!$cards){
                return $this->jsonResponse('', true, 'there is no card', 403);
            }
            $cardId = $cards->id;
            $viewedId= $cards->user_id;
                View::create([
                    'viewed_id'=>$viewedId ,
                    'card_id' => $cardId,
                    'viewer_id'=>Auth::id()
                ]);
            return $this->jsonResponse(new CardResource($cards), false, '', 200);
        }catch (\Exception $ex){
            return $ex;
            return $this->jsonResponse('', true, 'Something went wrong', 403);
        }
    }

/*    public function scanCard(Request $request)
    {
        try{
            $shortLink= $request->shortLink;
            $cards = Card::whereShortLink($shortLink)->with('contact.provider','user')->first();
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
            return $this->jsonResponse(new CardResource($cards), false, '', 200);
        }catch (\Exception $ex){
            return $ex;
            return $this->jsonResponse('', true, 'Something went wrong', 403);
        }
    }*/

    public function addConnection(Request $request)
    {
        try{
            $addedId= $request->addedId;
            $cardId= $request->cardId;
            if(!$addedId and !$cardId){
                return $this->jsonResponse('', true, 'adder_id, card_id required', 403);
            }
            if($addedId == Auth::id()){
                return $this->jsonResponse('', true, 'Can not add yourself', 403);
            }
            $addedIds = Connection::whereAdderId(Auth::id())->pluck('added_id')->toArray();
            $cardIds = Connection::whereAdderId(Auth::id())->pluck('card_id')->toArray();
            $checkIfInViewedIds= in_array($addedId, $addedIds);
            $checkIfInCardIds=  in_array($cardId, $cardIds);
            if (!$checkIfInViewedIds || !$checkIfInCardIds){
                Connection::create([
                    'added_id'=>$addedId ,
                    'card_id' => $cardId,
                    'adder_id'=>Auth::id()
                ]);
            }
            return $this->jsonResponse('', false, 'Added Successfully', 200);
        }catch (\Exception $ex){
            return $ex;
            return $this->jsonResponse('', true, 'Something went wrong', 403);
        }
    }

/*    public function getConnection()
    {
        try{

            $cardIds = Connection::whereAdderId(Auth::id())->pluck('card_id');
            return Card::whereIn('id',$cardIds)->with('user')->get();
            $addedIds = Connection::whereAdderId(Auth::id())->pluck('added_id')->toArray();
            $userIds= array_unique($addedIds);
           return   $addedFriend = User::whereId(Auth::id())->with(['added'=> function($query) use ($userIds)  {
                 $query->whereIn('added_id', $userIds)->first();
             },
             'added.card'=> function($query) use ($cardIds) {
                 $query->whereIn('id', $cardIds);
            },'added.card.contact.provider'])->first();
            return $this->jsonResponse(new userResource($addedFriend), false, '', 200);
        }catch (\Exception $ex){
            return $ex;
            return $this->jsonResponse('', true, 'Something went wrong', 403);
        }
    }*/

    public function getConnection()
    {
        try{
            $connectionIds = Connection::whereAdderId(Auth::id())->pluck('added_id')->toArray();
            if(!$connectionIds){
                return $this->jsonResponse('', true, 'There is no friends', 403);
            }
            $filterConnectionIds = array_unique($connectionIds);
            $connectionData= User::whereIn('id',$filterConnectionIds)->get();
            return $this->jsonResponse(UserResource::collection($connectionData), false, '', 200);
        }catch (\Exception $ex){
         //   return $ex;
            return $this->jsonResponse('', true, 'Something went wrong', 403);
        }
    }

    public function getConnectionScanedCards(Request $request)
    {
        try{
            $ConnectionScanedCards = Connection::whereAdderId(Auth::id())->whereAddedId($request->addedId)->pluck('card_id')->toArray();
            if(!$ConnectionScanedCards){
                return $this->jsonResponse('', true, 'There is no card or has been removed', 403);
            }
            $cardData= Card::whereIn('id',$ConnectionScanedCards)->with('contact.provider')->get();
            return $this->jsonResponse(CardResource::collection($cardData), false, '', 200);
        }catch (\Exception $ex){
               return $ex;
            return $this->jsonResponse('', true, 'Something went wrong', 403);
        }
    }
}



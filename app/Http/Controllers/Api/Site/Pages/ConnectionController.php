<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use App\Models\User;
use App\Models\View;
use App\Traits\ContactControllerTrait;
use App\Traits\ResponseJson;
use Auth;
use http\Env\Response;
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
            $cards = Card::whereShortLink($shortLink)->first();
            if(!$cards){
                return $this->jsonResponse('', true, 'there is no card', 403);
            }
            $viewedIds = View::whereViewerId($request->viewer_id)->pluck('viewed_id')->toArray();
            $cardIds = View::whereViewerId($request->viewer_id)->pluck('card_id')->toArray();
            $checkIfInViewedIds= in_array($request->viewed_id, $viewedIds);
            $checkIfInCardIds=  in_array($request->card_id, $cardIds);
            if (!$checkIfInViewedIds || !$checkIfInCardIds){
                View::create([
                    'viewed_id'=> $request->viewed_id,
                    'card_id' => $request->card_id,
                    'viewer_id'=>$request->viewer_id
                ]);
            }
            return $this->jsonResponse(new CardResource($cards), false, '', 200);
        }catch (\Exception $ex){
            return $this->jsonResponse('', true, 'Something went wrong', 403);
        }
    }
}



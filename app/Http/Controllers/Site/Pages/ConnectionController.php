<?php

namespace App\Http\Controllers\Site\Pages;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Connection;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;


class ConnectionController extends Controller
{
    public function countOfScan()
    {
        try{
            $countScans = Card::select('id')->withCount('view')->get()->toArray();
            if(!$countScans){
                return response()->json([
                        'status' => false,
                        'msg' => 'notFond'
                    ]
                );
            }
            return response()->json([
                'status' => true,
                'data' => $countScans
            ]);
        }catch (\Exception $ex){
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

    public function addedContact(){
        try{
            $connectionIds = array_unique(Connection::whereAdderId(Auth::id())->pluck('added_id')->toArray());
            $addeds= User::whereIn('id',$connectionIds)->paginate(4);
            $users= Auth::user();
            return view('site.pages.addedContact',compact('addeds','users'));
        }catch(\Exception $e){
            return $e;
        }
    }

    public function scanCard($adderId){
        try{
            $users= Auth::user();
            $addedUser= User::whereId($adderId)->first();
            $ConnectionScanedCards = Connection::whereAdderId(Auth::id())->whereAddedId($adderId)->pluck('card_id')->toArray();
            if(!$ConnectionScanedCards){
                return $this->jsonResponse('', true, 'There is no card or has been removed', 403);
            }
            $cards= Card::whereIn('id',$ConnectionScanedCards)->with('contact.provider')->get();
            return view('site.pages.friendCards',compact('cards','users','addedUser'));
        }catch (\Exception $ex){
            return $ex;
            return $this->jsonResponse('', true, 'Something went wrong', 403);
        }
    }

    public function getConnectionCardContact(Request $request,$cardId){
        try{
            $card= Card::whereUserId($request->addedId)->whereId($cardId)->with('contact.provider')->first();
            if(!$card){
                return response()->json([
                    'status' => 'noCard',
                    'msg' => 'no card found'
                ]);
            }
            $contacts = $card->contact;
            if($contacts->isEmpty()){
                return response()->json([
                    'status' => false,
                    'msg' => 'there is no contact in this card or has been removed'
                ]);
            }
            return response()->json([
                'status' => true,
                'data' => $contacts
            ]);
        }catch (\Exception $ex){
            return $ex;
            return $this->jsonResponse('', true, 'Something went wrong', 403);
        }
    }




}

<?php

namespace App\Http\Controllers\Site\Pages;

use App\Exceptions\NotAuthrizedException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\CardContact;
use Auth;
use DB;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function create(CardRequest $request)
    {
        try {
            $userId = Auth::id();
            $card = Card::create([
                'name' => $request->card,
                'user_id' =>  $userId,
                'description' =>$request->description
            ]);
/*            $image = QrCode::format('png')
                ->merge('img/OneMeLogo.png', 0.4, true)
                ->size(300)->errorCorrection('H')
                ->style('round')
                ->color(13,103,203)
                ->generate($card->id);
            $cardQrPath= new General();
            $cardQrPath =  $cardQrPath->saveImage($image);
            $card->update([
                'qr_url'=>$cardQrPath
            ]);*/
            if ($card) {
                return response()->json([
                    'status' => true,
                    'msg' => 'card added successfully',
                ]);
            }
        }catch(\Exception $e){
            return  $e;
        }
    }

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
        $authId = Auth::id();
        $card = Card::create([
            'name' => $request->card,
            'user_id' => $authId,
            'description' =>$request->description
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
        try {
            $userId= Auth::id();
            $card= Card::find($id);
            if(!$card){
                return response()->json([
                        'status' => false,
                        'msg' => 'notFond'
                    ]
                );
            }
            if($userId!=$card->user_id){
                return back();
            }
            $contactsThatInCard= Card::whereUserId($userId)->whereId($id)->with('contact:id')->first();
            $contactsId =  $contactsThatInCard->contact;
            $contactids = array();
            foreach($contactsId as $contactId) {
                $contactids[]=$contactId->id;
            }
            return response()->json([
                    'status' => true,
                    'card' => $card,
                    'contactsThatInCard' => $contactids
                ]
            );
        }catch (\Exception $e){
            return $e;
        }

    }


    public function update(CardRequest $request)
    {
        try {
            $userId= Auth::id();
            $card = Card::whereUserId($userId)->find($request->card_id);
            if(!$card){
                return response()->json([
                    'status' => false,
                    'msg' => 'Not Found',
                ]);
            }
            if($userId!==$card->user_id) {
                return redirect()->back();
            }
            DB::beginTransaction();
            $card->contact()->detach();
            $card->update([
                'name' => $request->card,
                'user_id' => $userId,
                'description' =>$request->description
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
        if(!$card){
            return response()->json([
                'status' => false,
                'msg' => "Not Found",
            ]);
        }
        $card->delete();
        return response()->json([
            'status' => true,
        ]);
    }

}

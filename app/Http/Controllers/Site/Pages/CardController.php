<?php

namespace App\Http\Controllers\Site\Pages;

use App\Exceptions\Base64Exception;
use App\Exceptions\NotFoundException;
use App\Helper\General;
use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\CardContact;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CardController extends Controller
{
    public function create(CardRequest $request)
    {
        try {
            $userId = Auth::id();
            $card = Card::create([
                'name' => $request->card,
                'user_id' =>  $userId,
                'description' =>$request->description,
                'short_link' => Str::random(5)
            ]);
            $image = QrCode::format('png')
                ->merge('img/OneMeLogo.png', 0.4, true)
                ->size(300)->errorCorrection('H')
                ->style('dot')
                ->eye('square')
                ->color(0,0,0)
                //  ->color(13,103,203)
                ->eyeColor(0, 13,103,203, 13,103,203)
                ->eyeColor(1, 13,103,203, 13,103,203)
                ->eyeColor(2, 13,103,203, 13,103,203)
                ->generate(asset('card-show/'.$card->short_link));
            $cardQrPath =  General::saveQr($image,'img/cardQr/');
            $card->update([
                'qr_url'=>$cardQrPath
            ]);
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
                throw new Base64Exception;
            }
          return   $cards = Card::with('contact')->whereUserId($userId)->get();
        } catch (NotFoundException | Base64Exception $e) {
            return $e->render();
        }
    }


    public function store(CardRequest $request)
    {
        try {
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

        }catch (\Exception $ex){
            return $ex;

        }
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

    public function show($id)
    {
        try {
            $userId= Auth::id();
            $card= Card::find($id);
            if(!$card){
                return response()->json([
                    'status' => false,
                    'msg' => "Not Found",
                ]);
            }
            if($userId!==$card->user_id) {
                return redirect()->back();
            }
            return response()->json([
                'status' => true,
                'card' => $card
            ]);
        }catch (\Exception $ex){
            return $ex;
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

        }catch (\Exception $ex){
            DB::rollback();
            return $ex;
        }
    }


    public function delete($id)
    {
        try {
            $userId= Auth::id();
            $card= Card::find($id);
            if(!$card){
                return response()->json([
                    'status' => false,
                    'msg' => "Not Found",
                ]);
            }
            if($userId!==$card->user_id) {
                return redirect()->back();
            }
            $card->delete();
            return response()->json([
                'status' => true,
            ]);
        }catch (\Exception $ex){
            return $ex;
        }
    }

}

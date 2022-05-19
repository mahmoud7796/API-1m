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
    public function addedContact(){
        try{
            $authUserId = Auth::id();
              $connections = User::with('added')->whereId($authUserId)->first();
              $addeds = $connections->added()->paginate(4);
            return view('site.pages.addedContact',compact('addeds'));
        }catch(\Exception $e){
            return $e;
        }
    }

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
}

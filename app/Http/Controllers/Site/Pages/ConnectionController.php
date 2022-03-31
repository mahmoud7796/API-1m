<?php

namespace App\Http\Controllers\Site\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

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
}

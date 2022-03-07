<?php

namespace App\Http\Controllers\Site\Pages;


use App\Http\Controllers\Controller;
use App\Models\Card;
use Auth;
use DB;
use Illuminate\Support\Facades\Crypt;


class QrController extends Controller
{
    public function show($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $cards = Card::with('contact')->whereId($id)->first();
             $contacts= $cards->contact;
            $users = Auth::user();
            return view('qrGenerate',compact('cards','contacts','users'));
        } catch (\Exception $e ) {
            return "invalid URL";
        }
    }

}

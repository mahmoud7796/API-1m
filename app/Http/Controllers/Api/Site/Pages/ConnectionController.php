<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            // dd('succ');
            return $this->jsonResponse($added, false, '', 200);

        } catch ( \Exception $e) {
        }
    }

    public function addedUsers(Request $request)
    {

    }

}



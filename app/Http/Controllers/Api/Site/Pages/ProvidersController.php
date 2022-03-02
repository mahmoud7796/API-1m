<?php

namespace App\Http\Controllers\Api\Site\Pages;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use App\Traits\ResponseJson;

class ProvidersController extends Controller
{
    use ResponseJson;

    public function index()
    {
        try {
            $providers = Provider::get();
            if(!$providers){
                return $this->jsonResponse('', true, 'There is no providers', 404);
            }
            return $this->jsonResponse(ProviderResource::collection($providers), false, '', 200);
        } catch (\Exception $ex) {
            return $ex;
        }
    }
}

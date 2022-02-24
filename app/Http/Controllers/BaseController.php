<?php

namespace App\Http\Controllers;

use App\Exceptions\NotFoundException;
use App\Traits\ParentController;
use App\Traits\ResponseJson;

class BaseController extends Controller
{
    use ParentController;
    use ResponseJson;
    public function edit($id)
    {
        $this->editContact($id,new NotFoundException,$this->jsonResponseError(true, 'Not authorized', 401),);
    }
}

<?php

namespace App\Exceptions;

use App\Traits\ResponseJson;
use Exception;

class Base64Exception extends Exception
{
    use ResponseJson;
    public function render()
    {
        return $this->jsonResponseError(true, 'Not valid base64', 200);
    }
}

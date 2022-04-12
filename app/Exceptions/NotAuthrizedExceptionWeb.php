<?php

namespace App\Exceptions;

use App\Traits\ResponseJson;
use Exception;

class NotAuthrizedExceptionWeb extends Exception
{
    use ResponseJson;
    public function render()
    {
        return $this->jsonResponseError(true, 'Not Authorized', 403);
    }
}

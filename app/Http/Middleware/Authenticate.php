<?php

namespace App\Http\Middleware;

use App\Traits\ResponseJson;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    use ResponseJson;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('site.login');
        }
    }

/*    protected function unauthenticated($request, array $guards)
    {
        abort($this->jsonResponseError(true, 'Unauthenticated', 402)
);
    }*/
}

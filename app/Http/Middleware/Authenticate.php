<?php

namespace App\Http\Middleware;

use App\Traits\ResponderTrait;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    use ResponderTrait;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, \Closure $next, ...$guards) {
    
        try {
            $this->authenticate($request, $guards);
        } catch (\Illuminate\Auth\AuthenticationException $e) {
            return $this->aunthorizationError('error', null, 'Unauthenticated', 401);
        }

        return $next($request);
    }

}

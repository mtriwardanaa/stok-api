<?php

namespace App\Http\Middleware;

use Laravel\Passport\Exceptions\AuthenticationException;
use Laravel\Passport\Exceptions\MissingScopeException;

class CheckScopesGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, $next, ...$scopes)
    {
        if (!$request->user() || !$request->user()->tokens()) {
            throw new AuthenticationException;
        }
        foreach ($scopes as $scope) {
            if (!$request->user()->tokenCan($scope)) {
                throw new MissingScopeException($scope);
            }
        }

        return $next($request);
    }
}

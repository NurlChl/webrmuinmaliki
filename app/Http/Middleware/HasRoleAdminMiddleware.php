<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasRoleAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->isAdmin() || $request->user()->isPartner()) {
            return $next($request);
        }

        abort(401);
    }
}

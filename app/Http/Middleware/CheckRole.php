<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {

        // dd(auth()->user()->role);

        if (!$request->user() || !in_array($request->user()->role, $roles)) {
            abort(403, 'Akses Ditolak');
        }

        return $next($request);
    }
}

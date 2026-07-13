<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (
            !auth()->check() ||
            auth()->user()->ma_vai_tro != 3
        ) {
            abort(403);
        }

        return $next($request);
    }
}
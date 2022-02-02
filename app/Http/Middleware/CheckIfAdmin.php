<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfAdmin
{
    const ADMIN = 1;

    public function handle(Request $request, Closure $next)
    {
        if(auth()->user() && !(auth()->user()->id == self::ADMIN))
        {
            return response()->json("Not allowed!");
        }

        return $next($request);
    }
}

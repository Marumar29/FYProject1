<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OrgAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('org_id')) {
            return redirect()->route('login-org')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }

}

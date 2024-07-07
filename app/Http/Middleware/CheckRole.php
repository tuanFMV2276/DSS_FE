<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        
        $key = $request->session()->get('role');
        // dd($key);
        if ($key !== $role) {
            return redirect('/login')->withErrors(['error' => 'Unauthorized.']);
        }

        return $next($request);
    }
}

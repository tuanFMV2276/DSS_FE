<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnsureTokenIsValid
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->session()->get('access_token');

        if (!$token) {
            return redirect('/login')->withErrors(['error' => 'You need to log in to access this page.']);
        }

        $response = Http::withHeaders(['Authorization' => 'Bearer ' . $token])
                        ->get('http://127.0.0.1:8000/api/user');

        if ($response->failed()) {
            return redirect('/login')->withErrors(['error' => 'Invalid or expired token. Please log in again.']);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $expectedToken = env('API_TOKEN');
        $providedToken = $request->header('Authorization');

        if ($providedToken !== 'Bearer ' . $expectedToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}

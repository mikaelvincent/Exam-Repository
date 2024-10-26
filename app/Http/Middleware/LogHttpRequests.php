<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\HttpRequest;

class LogHttpRequests
{
    /**
     * Handle an incoming request.
     *
     * Logs the HTTP request details to the http_requests table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Retrieve the authenticated user, if any
        $user = auth()->user();

        // Log the HTTP request
        HttpRequest::create([
            'user_id' => $user ? $user->id : null,
            'http_method' => $request->method(),
            'path' => $request->path(),
        ]);

        return $next($request);
    }
}

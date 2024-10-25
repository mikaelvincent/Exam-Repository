<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class GuestUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Checks for a guest user UUID in the cookie and creates a new guest user if necessary.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $uuid = $request->cookie('guest_uuid');

        if ($uuid) {
            // Check if the UUID exists in the database
            $user = User::where('uuid', $uuid)->first();

            if ($user) {
                // Reset the cookie expiry
                Cookie::queue('guest_uuid', $uuid, 60 * 24 * 365 * 10); // 10 years
            } else {
                // UUID not found, create a new guest user
                Log::warning('Guest UUID not found in database: ' . $uuid);
                $user = $this->createGuestUser();
            }
        } else {
            // No UUID in cookie, create a new guest user
            $user = $this->createGuestUser();
        }

        // Authenticate the user
        auth()->login($user);

        return $next($request);
    }

    /**
     * Create a new guest user and store UUID in a cookie.
     *
     * @return \App\Models\User
     */
    protected function createGuestUser()
    {
        $uuid = (string) Str::uuid();
        $user = User::create(['uuid' => $uuid]);

        // Store UUID in a cookie with a 10-year expiry
        Cookie::queue('guest_uuid', $uuid, 60 * 24 * 365 * 10); // 10 years

        // Log the creation of a new guest user
        Log::info('Created new guest user with UUID: ' . $uuid);

        return $user;
    }
}

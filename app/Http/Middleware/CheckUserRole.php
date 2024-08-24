<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  array  ...$roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user's role_id
            $userRoleId = Auth::user()->role_id;

            // Check if the user's role_id is in the list of allowed roles
            if (in_array($userRoleId, $roles)) {
                // Allow the request to proceed
                return $next($request);
            }
        }

        // Redirect or abort if the user does not have the correct role
        return redirect('/')->with('error', 'You do not have access to this page.');
    }
}

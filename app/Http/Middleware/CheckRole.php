<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            // This will abort the request if the user is not logged in
            // or does not have the required role.
            // You can customize the response, e.g., redirect to a different page
            // or show a 403 Forbidden error.
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

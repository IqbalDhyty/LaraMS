<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class StudentRoleCheck
{
    /**
     * IMPORTANT: This class was predominantly created as a way to check the authorization of a user trying to access a dashboard
     * it checks two things
     * 1. if a user that is not logged in is trying to access THEN reroute to login
     * 2. if a user that does not have a student role is trying to access THEN give an error
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'student') {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
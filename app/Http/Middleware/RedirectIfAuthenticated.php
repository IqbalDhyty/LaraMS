<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * IMPORTANT: This class was created to redirect an authenticated user if they decided to access either the log in or the register page
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                
                // Redirect based on role
                if ($user->role === 'teacher') {
                    return redirect()->route('teacher.dashboard');
                } elseif ($user->role === 'student') {
                    return redirect()->route('student.dashboard');
                }
                
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
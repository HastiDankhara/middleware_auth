<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // echo "<h2>".$role."</h2>";
        // Check if the user is authenticated

        // if role is admin then return on dashboard other wise redirect on register
            // if (Auth::user()->role == $role) {
            //     return $next($request);
            //     // return view('dashboard');
            // } elseif (Auth::user()->role == "user") {
            //     return redirect()->route('register');
            //     // return view('dashboard');
            // }else{
            //     return redirect()->route('login');
            // }

        // if role is admin then return on dashboard using default middleware
            //  if (Auth::user()->role == $role) {
            //     return $next($request);
            //     // return view('dashboard');
            // }else{
            //     return redirect()->route('login');
            // }
         if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
            // return view('dashboard');
        }else{
            return redirect()->route('login');
        }
    }

    public function terminate(Request $request, Response $res): void
    {
        // echo "ValidUser middleware is terminating<br>";
        // You can perform any cleanup or logging here
        // For example, you can log the request and response
        // Log::info('Request:', ['request' => $request->all()]);
        // Log::info('Response:', ['response' => $res]);
        // Or you can perform any other actions you need
        // For example, you can clear session data or perform cleanup tasks
        // session()->flush();
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if (Auth::user()->role == 'admin') {
            return $next($request);
        }
        
        // Redirect to home page after 3 seconds
        echo 
        '<script>
            setTimeout(function() {
                window.location.href = "/";
            }, 3000);
        </script>';
        
        abort(403, "Unauthorized action.");
    }
}

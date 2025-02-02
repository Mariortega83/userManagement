<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (Auth::check() && Auth::user()->role === 'superAdmin') {
            return $next($request);
        }

        // Si no tiene el rol adecuado, redirige o muestra un error
        return redirect('/')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}

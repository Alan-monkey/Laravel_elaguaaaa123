<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Si el usuario NO está autenticado
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Debes iniciar sesión primero.');
        }

        // Si está autenticado, evitar que guarde caché (botón atrás)
        $response = $next($request);
        return $response->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                        ->header('Pragma','no-cache')
                        ->header('Expires','Sat, 01 Jan 1990 00:00:00 GMT');
    }
}

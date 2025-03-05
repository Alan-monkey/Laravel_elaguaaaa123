<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // este if protege las rutas restringidas verificando si el usuario autenticado tiene el rol requerido. Si el rol
        // del usuario no coincide con el esperado, el sistema lo redirige a la ruta 'dashboard' en lugar de permitirle 
        // continuar con la solicitud.
        if($request->user()->role !== $role){
            return redirect()->route('dashboard');
        }
        // 

        return $next($request);
    }
}

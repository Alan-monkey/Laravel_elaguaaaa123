<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // La carpeta Backend se creó para organizar y separar los controladores que manejan la lógica del 
    // panel administrativo y de gestión del sistema.
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    

    public function logout(Request $request)
    {
        auth()->logout(); // Cerrar la sesión
        $request->session()->invalidate(); // Invalidar la sesión
        $request->session()->regenerateToken(); // Regenerar el token de la sesión

        return redirect('/admin/login'); // Redirigir a la página de login
    }
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Añadir cabeceras HTTP para evitar que el navegador guarde la página en caché
        return $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    }

}

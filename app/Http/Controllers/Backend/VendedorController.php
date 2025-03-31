<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function dashboard()
    {
        return view('vendedor.dashboard');
    }

    public function logout(Request $request)
    {
        auth()->logout(); // Cerrar la sesión
        $request->session()->invalidate(); // Invalidar la sesión
        $request->session()->regenerateToken(); // Regenerar el token de la sesión

        return redirect('/vendedor/login'); // Redirigir a la página de login
    }
}

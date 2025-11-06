<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $response = Http::post('http://localhost:3000/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/login')->with('status', $response->json()['message'] ?? 'Error');
    }

    public function login(Request $request)
    {
        $response = Http::post('http://localhost:3000/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->status() == 200) {
    return redirect('/welcome_admin')->with('status', 'Login exitoso');
}

        return back()->withErrors(['msg' => 'Credenciales inválidas']);
        
    }
    
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // La carpeta Backend se creó para organizar y separar los controladores que manejan la lógica del 
    // panel administrativo y de gestión del sistema.
    public function dashboard(){
        return view('admin.dashboard');
    }
}

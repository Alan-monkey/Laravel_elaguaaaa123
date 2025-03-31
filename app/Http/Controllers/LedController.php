<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LedController extends Controller
{
    public function index()
    {
        // Obtener todos los registros de la tabla leds
        $leds = DB::table('leds')->orderBy('timestamp', 'desc')->get();

        return view('leds.index', compact('leds'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadoLed;

class EstadoLedController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'led' => 'required|integer',
            'estado' => 'required|boolean',
        ]);

        EstadoLed::create([
            'led' => $request->led,
            'estado' => $request->estado,
        ]);

        return response()->json(['message' => 'Estado del LED guardado correctamente']);
    }

    public function index()
    {
        $leds = EstadoLed::orderBy('fecha', 'desc')->limit(10)->get();
        return view('leds', compact('leds'));
    }
}

<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\Http;

class CamionetaExport implements FromArray
{
    public function array(): array
    {
        // Obtener datos de la API
        $response = Http::get('http://localhost:3000/api/tb_camionetas');

        if ($response->successful()) {
            return $response->json(); // Retorna los datos en formato array
        }

        return []; // Si falla, retorna un array vacío
    }
}

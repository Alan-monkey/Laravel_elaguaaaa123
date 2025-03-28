<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Http;

class GarrafonesImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            if ($index == 0) continue; // Saltar la primera fila si es encabezado

            Http::post('http://localhost:3000/api/registro_garrafon', [
                
                'estado' => $row[0],
                'peso' => $row[1],
                'marca' => $row[2],
            ]);
        }
    }
}

<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Http;

class AdminImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            if ($index == 0) continue; // Saltar la primera fila si es encabezado

            Http::post('http://localhost:3000/api/registro_administrador', [
                
                'nombre' => $row[0],
                'telefono' => $row[1],
                'username' => $row[2],
                'correo' => $row[3],
                'contraseña' => $row[4],
            ]);
        }
    }
}

<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Http;

class RepartidoresImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            if ($index == 0) continue; // Saltar la primera fila si es encabezado

            Http::post('http://localhost:3000/api/registro_repartidores', [
                'username' => $row[0],
                'nombre' => $row[1],
                'App' => $row[2],
                'Apm' => $row[3],
                'Email' => $row[4],
                'Password' => $row[5],
            ]);
        }
    }
}

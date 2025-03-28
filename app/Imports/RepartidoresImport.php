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

            $username = $row[0]; // Nombre de usuario
            $email = $row[4];    // Email como identificador único

            // Obtener todos los repartidores existentes
            $response = Http::get("http://localhost:3000/api/tb_repartidores");

            if ($response->successful()) {
                $repartidores = $response->json();
                
                // Verificar si ya existe el usuario por username o email
                $existe = collect($repartidores)->contains(function ($repartidor) use ($username, $email) {
                    return $repartidor['username'] === $username || $repartidor['Email'] === $email;
                });

                if ($existe) {
                    continue; // Saltar este registro si ya existe
                }
            }

            // Si no existe, registrar el usuario
            Http::post('http://localhost:3000/api/registro_repartidores', [
                'username' => $username,
                'nombre' => $row[1],
                'App' => $row[2],
                'Apm' => $row[3],
                'Email' => $email,
                'Password' => $row[5],
            ]);
        }
    }
}

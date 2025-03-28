<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Http;

class ClientesImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            if ($index == 0) continue; // Saltar la primera fila si es encabezado

            $username = $row[0]; // Nombre de usuario
            $correo = $row[4];    // Email como identificador único

            // Obtener todos los repartidores existentes
            $response = Http::get("http://localhost:3000/api/tb_cliente");

            if ($response->successful()) {
                $clientes = $response->json();
                
                // Verificar si ya existe el usuario por username o email
                $existe = collect($clientes)->contains(function ($clientes) use ($username, $correo) {
                    return $clientes['username'] === $username || $clientes['correo'] === $correo;
                });

                if ($existe) {
                    continue; // Saltar este registro si ya existe
                }
            }

            // Si no existe, registrar el usuario
            Http::post('http://localhost:3000/api/registro_repartidores', [
                'nombre' => $row[1],
                'telefono' => $row[2],
                'username' => $username,
                'correo' => $correo,
                'contraseña' => $row[3],
            ]);
        }
    }
}

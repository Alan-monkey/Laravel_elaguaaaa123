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

        $username = $row[0]; // Nombre de usuario
        $correo = $row[4];    // Email como identificador único
        

        // Obtener todos los repartidores existentes
        $response = Http::get("http://localhost:3000/api/tb_administrador");

        if ($response->successful()) {
            $repartidores = $response->json();
            
            // Verificar si ya existe el usuario por username o email
            $existe = collect($repartidores)->contains(function ($admin) use ($username, $correo) {
                return $admin['username'] === $username || $admin['correo'] === $correo;
            });

            if ($existe) {
                continue; // Saltar este registro si ya existe
            }
        }

        // Si no existe, registrar el usuario
        Http::post('http://localhost:3000/api/registro_administrador', [
                'nombre' => $row[0],
                'telefono' => $row[1],
                'username' => $username,
                'correo' => $correo,
                'contraseña' => $row[4],
        ]);
    }

}
}

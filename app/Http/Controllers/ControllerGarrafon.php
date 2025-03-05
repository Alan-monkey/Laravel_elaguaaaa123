<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class ControllerGarrafon extends Controller
{
    public function getDataGar(Request $request)
    {
        $searchTerm = $request->input('search', '');
        $page = $request->input('page', 1);
    
        $url = "http://localhost:3000/api/tb_garrafon_agua?page={$page}";
        if ($searchTerm) {
            $url .= "&search=" . urlencode($searchTerm);
        }
    
        $data = Http::get($url)->json();
    
        return view('garrafones.getData', ['data' => $data]);
    }
    
    public function welcome()
    {    
        return view('welcome');
    }
    public function getData2Gar($id){
        // Hacemos una solicitud GET a una API externa
        $response = Http::get('http://localhost:3000/api/id_garrafon/'. $id);

        


        // Verificamos si la solicitud fue exitosa
        if ($response->successful()) {
            $data = $response->json(); // Obtiene los datos en formato JSON
            
            //return view('getData2')->with(['data' => $data]);

            return view('garrafones.getData2', compact('data')); // Pasamos los datos a una vista
        } else {
            return back()->withErrors('Error al obtener el registro.');
        }
    }

    public function deleteDataGar($id)
    {
        // Hacemos una solicitud DELETE a la API para eliminar el recurso
        $response = Http::delete('http://localhost:3000/api/eli_garrafon/' . $id);

        // Verificamos si la solicitud fue exitosa
        if ($response->successful()) {
            return redirect('/consultar-apiGar')->with('message', 'Recurso eliminado correctamente');
        } else {
            return response()->json(['error' => 'Error al eliminar el recurso'], 500);
        }
    }

    public function showEditGar($id)
    {
       
        // Obtener los datos actuales de la API
        $response = Http::get('http://localhost:3000/api/id_garrafon/' . $id);

        // Verificar si la solicitud fue exitosa
        if ($response->successful()) {
            // Obtener los datos del alumno
            $data = $response->json();


            // Retornar la vista con los datos del alumno
            return view('garrafones.updateData', compact('data'));
        } else {
            // Si no se encuentra el recurso
            return back()->withErrors(['error' => 'Error al obtener los datos para actualizar.']);
        }
    }

    // Método para procesar la actualización
    public function actualizarGar(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'estado' => 'required',
            'peso' => 'required',
            'marca' => 'required',
           
        ]);

        // Enviar los datos a la API para actualizar
        $response = Http::put('http://localhost:3000/api/act_garrafon/' . $id, [
            'estado' => $request->estado,
            'peso' => $request->peso,
            'marca' => $request->marca,
            ]);

        if ($response->successful()) {
                return redirect()->route('/consultar-apiGar')->with('success', 'Registro actualizado correctamente');
            } else {
                return back()->withErrors(['error' => 'Error al actualizar el registro.']);
        }
    }

    public function postDataGar(Request $request) {
        // Validar los datos del formulario
        $request->validate([
            'estado' => 'required',
            'peso' => 'required',
            'marca' => 'required',
        ]);

        try {

        // Enviar los datos a la API para crear un nuevo registro
        $response = Http::post('http://localhost:3000/api/registro_garrafon/', [
        'estado' => $request->input('estado'),
        'peso' => $request->input('peso'),
        'marca' => $request->input('marca'),
        ]);

        // Verificar si la solicitud fue exitosa
        if ($response->successful()) {
            return redirect()->route('/consultar-apiGar')->with('success', 'Registro creado correctamente');
        } else {
            // Mostrar el mensaje de error de la API si está disponible
            $errorMessage = $response->json()['message'] ?? 'Error al crear el registro.';
            return back()->withErrors(['error' => $errorMessage]);
        }
        } catch (\Exception $e) {
            // Mostrar el mensaje de error general si no se pudo conectar con la API
            return back()->withErrors(['error' => 'Error al conectar con la API.']);

        }

    }


    // Vista de formulario para crear un nuevo registro (cambia el nombre de la función)
    public function showFormGar() {
        return view('garrafones.postData');
    }


   




    
}

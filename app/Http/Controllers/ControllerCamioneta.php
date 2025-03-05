<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class ControllerCamioneta extends Controller
{
    public function getDataCam(Request $request)
    {
        $searchTerm = $request->input('search', '');
        $page = $request->input('page', 1);
    
        $url = "http://localhost:3000/api/tb_camionetas?page={$page}";
        if ($searchTerm) {
            $url .= "&search=" . urlencode($searchTerm);
        }
    
        $data = Http::get($url)->json();
    
        return view('camioneta.getData', ['data' => $data]);
    }
    
    public function getData2Cam($id){
        // Hacemos una solicitud GET a una API externa
        $response = Http::get('http://localhost:3000/api/id_camioneta/'. $id);

        


        // Verificamos si la solicitud fue exitosa
        if ($response->successful()) {
            $data = $response->json(); // Obtiene los datos en formato JSON
            
            //return view('getData2')->with(['data' => $data]);

            return view('camioneta.getData2', compact('data')); // Pasamos los datos a una vista
        } else {
            return back()->withErrors('Error al obtener el registro.');
        }
    }

    public function deleteDataCam($id)
    {
        // Hacemos una solicitud DELETE a la API para eliminar el recurso
        $response = Http::delete('http://localhost:3000/api/eli_camioneta/' . $id);

        // Verificamos si la solicitud fue exitosa
        if ($response->successful()) {
            return redirect('/consultar-apiCam')->with('message', 'Recurso eliminado correctamente');
        } else {
            return response()->json(['error' => 'Error al eliminar el recurso'], 500);
        }
    }

    public function showEditCam($id)
    {
       
        // Obtener los datos actuales de la API
        $response = Http::get('http://localhost:3000/api/id_camioneta/' . $id);

        // Verificar si la solicitud fue exitosa
        if ($response->successful()) {
            // Obtener los datos del alumno
            $data = $response->json();


            // Retornar la vista con los datos del alumno
            return view('camioneta.updateData', compact('data'));
        } else {
            // Si no se encuentra el recurso
            return back()->withErrors(['error' => 'Error al obtener los datos para actualizar.']);
        }
    }

    // Método para procesar la actualización
    public function actualizarCam(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'placas' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'capacidad' => 'required',
            'id_garrafon' => 'required',
            'id_repartidor' => 'required',
        ]);

        // Enviar los datos a la API para actualizar
        $response = Http::put('http://localhost:3000/api/act_camioneta/' . $id, [
            'placas' => $request->placas,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'capacidad' => $request->capacidad,
            'id_garrafon' => $request->id_garrafon,
            'id_repartidor' => $request->id_repartidor, // Asegúrate de que coincida con la API
        ]);

        if ($response->successful()) {
                return redirect()->route('/consultar-apiCam')->with('success', 'Registro actualizado correctamente');
            } else {
                return back()->withErrors(['error' => 'Error al actualizar el registro.']);
        }
    }

    public function postDataCam(Request $request) {
        // Validar los datos del formulario
        $request->validate([
            'placas' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'capacidad' => 'required',
            'id_garrafon' => 'required',
            'id_repartidor' => 'required',
        ]);

        try {

        // Enviar los datos a la API para crear un nuevo registro
        $response = Http::post('http://localhost:3000/api/registro_camioneta/', [
            'placas' => $request->input('placas'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'capacidad' => $request->input('capacidad'),
            'id_garrafon' => $request->input('id_garrafon'),
            'id_repartidor' => $request->input('id_repartidor'),
        ]);

        // Verificar si la solicitud fue exitosa
        if ($response->successful()) {
            return redirect()->route('/consultar-apiCam')->with('success', 'Registro creado correctamente');
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
    public function showFormCam() {
        return view('camioneta.postData');
    }

    public function welcome()
    {    
        return view('welcome');
    }


   




    
}

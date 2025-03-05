<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RepartidoresImport;


class ControllerAPI extends Controller
{
    public function getData(Request $request)
    {
        $searchTerm = $request->input('search', '');
        $page = $request->input('page', 1);
    
        $url = "http://localhost:3000/api/tb_repartidores?page={$page}";
        if ($searchTerm) {
            $url .= "&search=" . urlencode($searchTerm);
        }
    
        $data = Http::get($url)->json();
    
        return view('repartidores.getData', ['data' => $data]);
    }
    
    public function welcome()
    {    
        return view('welcome');
    }
    public function getData2($id){
        // Hacemos una solicitud GET a una API externa
        $response = Http::get('http://localhost:3000/api/id_repartidores/'. $id);

        


        // Verificamos si la solicitud fue exitosa
        if ($response->successful()) {
            $data = $response->json(); // Obtiene los datos en formato JSON
            
            //return view('getData2')->with(['data' => $data]);

            return view('repartidores.getData2', compact('data')); // Pasamos los datos a una vista
        } else {
            return back()->withErrors('Error al obtener el registro.');
        }
    }

    public function deleteData($id)
    {
        // Hacemos una solicitud DELETE a la API para eliminar el recurso
        $response = Http::delete('http://localhost:3000/api/eli_repartidores/' . $id);

        // Verificamos si la solicitud fue exitosa
        if ($response->successful()) {
            return redirect('/consultar-api')->with('message', 'Recurso eliminado correctamente');
        } else {
            return response()->json(['error' => 'Error al eliminar el recurso'], 500);
        }
    }

    public function showEdit($id)
    {
       
        // Obtener los datos actuales de la API
        $response = Http::get('http://localhost:3000/api/id_repartidores/' . $id);

        // Verificar si la solicitud fue exitosa
        if ($response->successful()) {
            // Obtener los datos del alumno
            $data = $response->json();


            // Retornar la vista con los datos del alumno
            return view('repartidores.updateData', compact('data'));
        } else {
            // Si no se encuentra el recurso
            return back()->withErrors(['error' => 'Error al obtener los datos para actualizar.']);
        }
    }

    // Método para procesar la actualización
    public function actualizar(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'username' => 'required',
            'nombre' => 'required',
            'App' => 'required',
            'Apm' => 'required',
            'Email' => 'required',
            'Password' => 'required',
        ]);

        // Enviar los datos a la API para actualizar
        $response = Http::put('http://localhost:3000/api/act_repartidores/' . $id, [
            'username' => $request->username,
            'nombre' => $request->nombre,
            'App' => $request->App,
            'Apm' => $request->Apm,
            'Email' => $request->Email,
            'Password' => $request->Password, // Asegúrate de que coincida con la API
        ]);

        if ($response->successful()) {
                return redirect()->route('/consultar-api')->with('success', 'Registro actualizado correctamente');
            } else {
                return back()->withErrors(['error' => 'Error al actualizar el registro.']);
        }
    }

    public function postData(Request $request) {
        // Validar los datos del formulario
        $request->validate([
            'username' => 'required',
            'nombre' => 'required',
            'App' => 'required',
            'Apm' => 'required',
            'Email' => 'required',
            'Password' => 'required',
        ]);

        try {

        // Enviar los datos a la API para crear un nuevo registro
        $response = Http::post('http://localhost:3000/api/registro_repartidores/', [
            'username' => $request->input('username'),
        'nombre' => $request->input('nombre'),
        'App' => $request->input('App'),
        'Apm' => $request->input('Apm'),
        'Email' => $request->input('Email'),
        'Password' => $request->input('Password'),
        ]);

        // Verificar si la solicitud fue exitosa
        if ($response->successful()) {
            return redirect()->route('/consultar-api')->with('success', 'Registro creado correctamente');
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
    public function showForm() {
        return view('repartidores.postData');
    }


   



    public function importRepartidores(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new RepartidoresImport, $request->file('file'));

    return redirect()->back()->with('success', 'Registros importados correctamente');
}
    
}

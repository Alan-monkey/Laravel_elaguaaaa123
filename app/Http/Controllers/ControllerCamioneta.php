<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ControllerCamioneta extends Controller
{
    public function getDataCam(){
        // Hacemos una solicitud GET a una API externa
        $response = Http::get('http://localhost:3000/tb_camionetas/');

        // Verificamos si la solicitud fue exitosa
        if ($response->successful()) {
            $data = $response->json(); // Obtiene los datos en formato JSON

            //si las carreras contengan un id_universidad, se obtiene el nombre de la universidad
            foreach ($data as &$camioneta) { // Usamos & para modificar el array original
                $repartidoresResponse = Http::get('http://localhost:3000/id_repartidores/'. $camioneta['id_repartidor']);
                if ($repartidoresResponse->successful()) {
                    $camioneta['repartidor'] = $repartidoresResponse->json();
                } else {
                    $camioneta['repartidor'] = ['username' => 'No se enconto repartidor'];
                }
            }

            return view('camioneta.getData', compact('data')); // Pasamos los datos a una vista
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function getData2Cam($id){
        $response = Http::get('http://localhost:3000/id_camioneta/' . $id);

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['id_repartidor'])) {
                $repartidorResponse = Http::get('http://localhost:3000/id_repartidores/' . $data['id_repartidor']);
                if ($repartidorResponse->successful()) {
                    $data['repartidor'] = $repartidorResponse->json();
                } else {
                    $data['repartidor'] = ['nombre' => 'No se encontró el repartidor'];
                }
            } else {
                $data['repartidor'] = ['nombre' => 'No tiene repartidor asociado'];
            }

            return view('camioneta.getData2', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    public function deleteDataCam($id)
    {
        $response = Http::delete('http://localhost:3000/eli_camioneta/' . $id);

        if ($response->successful()) {
            return redirect()->route('/consultar-apiCam')->with('success', 'Camioneta eliminada correctamente');
        } else {
            return response()->json(['error' => 'Error al eliminar el recurso'], 500);
        }
    }

    public function showEditCam($id) {
        $response = Http::get("http://localhost:3000/id_camioneta/$id");

        if ($response->successful()) {
            $data = $response->json();
            $repartidoresResponse = Http::get("http://localhost:3000/id_repartidores/");
            $repartidores = $repartidoresResponse->successful() ? $repartidoresResponse->json() : [];

            return view('camioneta.updateData', [
                'camioneta' => $data,
                'repartidores' => $repartidores,
            ]);
        }

        return back()->withErrors(['error' => 'Error al obtener los datos de la camioneta']);
    }

    public function actualizarCam(Request $request, $id)
    {
        $request->validate([
            'placas' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'capacidad' => 'required|string|max:255',
            'id_repartidor' => 'required|integer',
        ]);

        $response = Http::put("http://localhost:3000/camionetas/$id", $request->all());

        if ($response->successful()) {
            return redirect()->route('camionetas.index')->with('success', 'Registro actualizado correctamente');
        } else {
            return back()->withErrors(['error' => 'Error al actualizar la camioneta']);
        }
    }

    public function postDataCam(Request $request)
    {
        $validated = $request->validate([
            'placas' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'capacidad' => 'required|string|max:255',
            'id_repartidor' => 'required|integer',
        ]);

        $response = Http::post('http://localhost:3000/registro_camioneta', $validated);

        if ($response->successful()) {
            return redirect()->route('/consultar-apiCam')->with('success', 'Camioneta creada con éxito.');
        }

        return redirect()->back()->with('error', 'Error al crear la camioneta: ' . $response->body());
    }

    public function showFormCam()
    {
        $response = Http::get('http://localhost:3000/tb_repartidores');

        if ($response->successful()) {
            $repartidores = $response->json();
            return view('camioneta.postData', compact('repartidores'));
        }

        return redirect()->back()->with('error', 'Error al obtener repartidores.');
    }
}
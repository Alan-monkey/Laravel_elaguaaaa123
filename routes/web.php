<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\VendedorController;

 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Ruta de la API de Repartidores
use App\Http\Controllers\ControllerAPI;
Route::get('/consultar-api', [ControllerAPI::class, 'getData'])->name('/consultar-api');
Route::get('/consultar2-api/{id}', [ControllerAPI::class, 'getData2']);
Route::get('/alta-api', [ControllerAPI::class, 'showForm'])->name('/alta-api');
// Ruta para procesar el envío del formulario (POST)
Route::post('/alta-api', [ControllerAPI::class, 'postData'])->name('enviar.datos');

Route::get('/editar-api/{id}', [ControllerAPI::class, 'showEdit']);
Route::put('/actualizar-api/{id}', [ControllerAPI::class, 'actualizar'])->name('actualizar.api');
Route::get('/borrar-api/{id}', [ControllerAPI::class, 'deleteData']);


Route::get('/', [ControllerAPI::class, 'welcome'])->name('/welcome');



Route::post('/import-repartidores', [ControllerAPI::class, 'importRepartidores'])->name('import.repartidores');


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


use App\Http\Controllers\ControllerCamioneta;
Route::get('/consultar-apiCam', [ControllerCamioneta::class, 'getDataCam'])->name('/consultar-apiCam');
Route::get('/consultar2-apiCam/{id}', [ControllerCamioneta::class, 'getData2Cam']);
Route::get('/alta-apiCam', [ControllerCamioneta::class, 'showFormCam'])->name('/alta-apiCam');
// Ruta para procesar el envío del formulario (POST)
Route::post('/alta-apiCam', [ControllerCamioneta::class, 'postDataCam'])->name('enviar.datosCam');

Route::get('/editar-apiCam/{id}', [ControllerCamioneta::class, 'showEditCam']);
Route::put('/actualizar-apiCam/{id}', [ControllerCamioneta::class, 'actualizarCam'])->name('actualizar.apiCam');
Route::get('/borrar-apiCam/{id}', [ControllerCamioneta::class, 'deleteDataCam']);


Route::get('/editar-apiCam', [ControllerCamioneta::class, 'showEditCam'])->name('/editar-apiCam');
Route::get('/', [ControllerCamioneta::class, 'welcome'])->name('/welcome');

//////////////////////////////////////////////////////////////////////////////////////////////////
///Garrafones

//Ruta de la API de Garrafones
use App\Http\Controllers\ControllerGarrafon;
Route::get('/consultar-apiGar', [ControllerGarrafon::class, 'getDataGar'])->name('/consultar-apiGar');
Route::get('/consultar2-apiGar/{id}', [ControllerGarrafon::class, 'getData2Gar']);
Route::get('/alta-apiGar', [ControllerGarrafon::class, 'showFormGar'])->name('/alta-apiGar');
// Ruta para procesar el envío del formulario (POST)
Route::post('/alta-apiGar', [ControllerGarrafon::class, 'postDataGar'])->name('enviar.datosGar');

Route::get('/editar-apiGar/{id}', [ControllerGarrafon::class, 'showEditGar']);
Route::put('/actualizar-apiGar/{id}', [ControllerGarrafon::class, 'actualizarGar'])->name('actualizar.apiGar');
Route::get('/borrar-apiGar/{id}', [ControllerGarrafon::class, 'deleteDataGar']);
Route::get('/', [ControllerGarrafon::class, 'welcome'])->name('/welcome');



//////////////////////////////////////////////////////////////////////////////////////////////////
///Administradores

use App\Http\Controllers\ControllerAdmin;
Route::get('/consultar-apiAdm', [ControllerAdmin::class, 'getDataAdm'])->name('/consultar-apiAdm');
Route::get('/consultar2-apiAdm/{id}', [ControllerAdmin::class, 'getData2Adm']);
Route::get('/alta-apiAdm', [ControllerAdmin::class, 'showFormAdm'])->name('/alta-apiAdm');
// Ruta para procesar el envío del formulario (POST)
Route::post('/alta-apiAdm', [ControllerAdmin::class, 'postDataAdm'])->name('enviar.datosAdm');

Route::get('/editar-apiAdm/{id}', [ControllerAdmin::class, 'showEditAdm']);
Route::put('/actualizar-apiAdm/{id}', [ControllerAdmin::class, 'actualizarAdm'])->name('actualizar.apiAdm');
Route::get('/borrar-apiAdm/{id}', [ControllerAdmin::class, 'deleteDataAdm']);
Route::get('/', [ControllerAdmin::class, 'welcome'])->name('/welcome');

Route::post('/import-admin', [ControllerAdmin::class, 'importAdmin'])->name('import.administradores');


//////////////////////////////////////////////////////////////////////////////////////////////////
///Clientes

use App\Http\Controllers\ControllerCliente;
Route::get('/consultar-apiCli', [ControllerCliente::class, 'getDataCli'])->name('/consultar-apiCli');
Route::get('/consultar2-apiCli/{id}', [ControllerCliente::class, 'getData2Cli']);
Route::get('/alta-apiCli', [ControllerCliente::class, 'showFormCli'])->name('/alta-apiCli');
// Ruta para procesar el envío del formulario (POST)
Route::post('/alta-apiCli', [ControllerCliente::class, 'postDataCli'])->name('enviar.datosCli');

Route::get('/editar-apiCli/{id}', [ControllerCliente::class, 'showEditCli']);
Route::put('/actualizar-apiCli/{id}', [ControllerCliente::class, 'actualizarCli'])->name('actualizar.apiCli');
Route::get('/borrar-apiCli/{id}', [ControllerCliente::class, 'deleteDataCli']);
Route::get('/', [ControllerCliente::class, 'welcome'])->name('/welcome');
Route::post('/import-clientes', [ControllerCliente::class, 'importClientes'])->name('import.clientes');

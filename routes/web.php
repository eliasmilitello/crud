<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\PresupuestosController;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\clientes;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});

// Rotas de Clientes
Route::get("/clientes",[ClienteController::class,"index"])->name("clientes.index");

Route::POST("/crearcliente",[ClienteController::class,"create"])->name("clientes.create");

Route::PUT("/editarcliente",[ClienteController::class,"update"])->name("clientes.update");

Route::get("/eliminarcliente-{id}",[ClienteController::class,"delete"])->name("clientes.delete");

//Rutas de Productos
Route::get("/productos",[ProductoController::class,"index"])->name("productos.index");

Route::POST("/crearproducto",[ProductoController::class,"create"])->name("productos.create");

Route::PUT("/editarproducto",[ProductoController::class,"update"])->name("productos.update");

Route::get("/eliminarproducto-{id}",[ProductoController::class,"delete"])->name("productos.delete");

//Rutas de Proveedores

Route::get("/proveedores",[ProveedoresController::class,"index"])->name("proveedores.index");

Route::POST("/crearproveedores",[ProveedoresController::class,"create"])->name("proveedores.create");

Route::PUT("/editarproveedores",[ProveedoresController::class,"update"])->name("proveedores.update");

Route::get("/eliminarproveedores-{id}",[ProveedoresController::class,"delete"])->name("proveedores.delete");

//Rutas de Presupuestos

Route::get("/presupuestos",[PresupuestosController::class,"index"])->name("presupuestos.index");

Route::post('procesar-formulario',[PresupuestosController::class,"procesarFormulario"])->name("procesar.formulario");

Route::post('/guardar-datos', [PresupuestosController::class,"guardarDatos"]);

Route::post('/borrar-dato',  [PresupuestosController::class,"guardarDatos"]);

// DOMPDF

Route::get('/prueba', function () {

    $clientes = clientes::all();
    $pdf = Pdf::loadView('pdf.pdf',[
        'clientes'=> $clientes,
    ]);

    return $pdf->stream();
})->name("prueba");

Route::post('/presupuestos/buscar', [PresupuestosController::class, 'buscar'])->name('presupuestos.buscar');
Route::post('/agregar-producto', [PresupuestosController::class, 'agregarProducto']);
Route::post('/eliminar-producto', [PresupuestosController::class, 'eliminarProducto']);
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;
class PresupuestosController extends Controller
{
    public function index()
    {
      
        return view ('presupuestos.index');
       
    }


    public function buscar(Request $request)
    {
        $codigo = $request->input('codigo');
        $producto = productos::where('codigo', $codigo)->first();

        return response()->json(['producto' => $producto]);
    }
    public function agregarProducto(Request $request)
    {
        // Obtener datos del formulario
        $codigo = $request->input('codigo');
        $descripcion = $request->input('descripcion');
        $precio = $request->input('precio');

        // Validar y almacenar en la base de datos o realizar las acciones necesarias
        // Por simplicidad, asumiremos que estás trabajando con un modelo llamado Producto
        // Asegúrate de tener el modelo creado o créalo con: php artisan make:model Producto
        // y que la migración para la tabla productos esté creada y ejecutada

        $producto = new \App\Models\productos();
        $producto->codigo = $codigo;
        $producto->descripcion = $descripcion;
        $producto->precio = $precio;
        $producto->save();

        return response()->json([
            'success' => true,
            'mensaje' => 'Producto agregado correctamente.',
        ]);
    }
    public function eliminarProducto(Request $request)
    {
        // Obtener el código del producto a eliminar
        $codigo = $request->input('codigo');

        // Validar y eliminar el producto en la base de datos o realizar las acciones necesarias
        // Por simplicidad, asumiremos que estás trabajando con un modelo llamado Producto

        $producto = \App\Models\productos::where('codigo', $codigo)->first();

        if ($producto) {
            $producto->delete();
            return response()->json([
                'success' => true,
                'mensaje' => 'Producto eliminado correctamente.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'mensaje' => 'Producto no encontrado.',
            ]);
        }
    }
}


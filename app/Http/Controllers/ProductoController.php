<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;
use App\Models\proveedores;

class ProductoController extends Controller

{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $proveedores = proveedores::all();
        $productos = productos::all();
        return view ('productos.index')
        ->with('productos',$productos)
        ->with('proveedores',$proveedores);
    }

    public function create(Request $request)
    {
        $productos = new productos();
        $productos->codigo = $request->get('codigo');
        $productos->descripcion = $request->get('descripcion');
        $productos->precio = $request->get('precio');
        $productos->stock = $request->get('stock');  
        $productos->idProveedores = $request->get('proveedores');
    
        $productos->save();
    
        return redirect('productos') 
        ->with('success','El Producto se Cargo Correctamente');
    }

    public function update(Request $request)
    {
        $id=$request->post('id');
        $productos = productos::findOrFail($id);
        $productos->codigo = $request->get('codigo');
        $productos->descripcion = $request->get('descripcion');
        $productos->precio = $request->get('precio');
        $productos->stock = $request->get('stock');  
        $productos->idProveedores = $request->get('idProveedores'); 
    
        $productos->save();
    
        return redirect('productos')
        ->with('success','El Producto se Modifico Correctamente');
    }
    public function delete($id)
    {
        $productos = productos::find($id);
        $productos->delete();
        return redirect('/productos')
        ->with('success','El Producto se Elimino Correctamente');
    }
}

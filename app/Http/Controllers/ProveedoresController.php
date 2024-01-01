<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proveedores;

class ProveedoresController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $proveedores = proveedores::all();
        return view ('proveedores.index')
        ->with('proveedores',$proveedores);
    }

    public function create(Request $request)
    {
        $proveedores = new proveedores();
        $proveedores->nombre = $request->get('nombre');
        $proveedores->telefono = $request->get('telefono');
        $proveedores->domicilio = $request->get('domicilio');
        
        $proveedores->save();
    
        return redirect('proveedores') 
        ->with('success','El Proveedor se Cargo Correctamente');
    }

    public function update(Request $request)
    {
        $id=$request->post('id');
        $proveedores = proveedores::findOrFail($id);

        $proveedores->nombre = $request->post('nombre');
        $proveedores->telefono = $request->post('telefono');
        $proveedores->domicilio = $request->post('domicilio');
           
        $proveedores->save();
    
        return redirect('proveedores')
        ->with('success','El Proveedor se Modifico Correctamente');
    }
    public function delete($id)
    {
        $proveedores = proveedores::find($id);
        $proveedores->delete();
        return redirect('/proveedores')
        ->with('success','El Proveedor se Elimino Correctamente');
    }
}


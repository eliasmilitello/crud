<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientes;

class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = clientes::all();
        return view ('clientes.index')
        ->with('clientes',$clientes);
    }

    public function create(Request $request)
    {
        $clientes = new clientes();
        $clientes->cliente = $request->get('cliente');
        $clientes->dni = $request->get('dni');
        $clientes->domicilio = $request->get('domicilio');
        $clientes->telefono = $request->get('telefono');  
    
        $clientes->save();
    
        return redirect('clientes') 
        ->with('success','El Cliente se Cargo Correctamente');
    }

    public function update(Request $request)
    {
        $id=$request->post('id');
        $cliente = clientes::findOrFail($id);

        $cliente->cliente = $request->post('cliente');
        $cliente->dni = $request->post('dni');
        $cliente->domicilio = $request->post('domicilio');
        $cliente->telefono = $request->post('telefono');  
    
        $cliente->save();
    
        return redirect('clientes')
        ->with('success','El Cliente se Modifico Correctamente');
    }
    public function delete($id)
    {
        $cliente = clientes::find($id);
        $cliente->delete();
        return redirect('/clientes')
        ->with('success','El Cliente se Elimino Correctamente');
    }
}

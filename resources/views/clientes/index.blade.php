@extends('adminlte::page')

@section('title', 'ME Soluciones Informaticas')

@section('content_header')
    <h1>Listado de Clientes</h1>
@stop

@section('content')

<a href="" data-bs-toggle="modal" data-bs-target="#modalcrear" class="btn btn-primary"> Crear Nuevo </a>
 <a href="{{route("prueba")}}" data-bs-toggle="modal"  class="btn btn-primary"> Exportar a PDF</a>
 <!-- Modal de Crear -->
 <div class="modal fade" id="modalcrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Nuevo Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route("clientes.create")}}" method= "POST">
      @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cliente</label>
    <input type="text" class="form-control" id="cliente" name="cliente" aria-describedby="emailHelp"> 
  </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">DNI</label>
    <input type="text" class="form-control" id="dni" name="dni" aria-describedby="emailHelp"> 
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Domicilio</label>
    <input type="text" class="form-control" id="domicilio" name="domicilio" aria-describedby="emailHelp"> 
  </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Telefono</label>
    <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="emailHelp"> 
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>
</br>
</br>
 @include('clientes.success-menssage')

<table id="clientes" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th scope="col">Cliente</th>
      <th scope="col">Telefono</th>
      <th scope="col">Domicilio</th>
      <th scope="col">DNI</th>
      <th scope="col">Accionnes</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($clientes as $cliente)
  <tr>
      <td>{{$cliente->cliente}}</td>
      <td>{{$cliente->telefono}}</td>
      <td>{{$cliente->domicilio}}</td>
      <td>{{$cliente->dni}}</td>
      <td>
       <a href="" data-bs-toggle="modal" data-bs-target="#modaleditar{{$cliente->id}}" class ="btn btn-info"> EDITAR</a>
       <a href="{{route("clientes.delete",$cliente->id)}}" onclick="return res()" class ="btn btn-danger"> BORRAR</a>
      </td>

      

<!-- Modal de Edicion -->
<div class="modal fade" id="modaleditar{{$cliente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('clientes.update')}}" method="POST">
      <input id="id" name="id" type="hidden" value="{{$cliente->id}}" />
      @csrf
      @method('PUT')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cliente</label>
    <input type="text" class="form-control" id="cliente" name="cliente" aria-describedby="emailHelp" value="{{$cliente->cliente}}"> 
  </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">DNI</label>
    <input type="text" class="form-control" id="dni" name="dni" aria-describedby="emailHelp" value="{{$cliente->dni}}"> 
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Domicilio</label>
    <input type="text" class="form-control" id="domicilio" name="domicilio" aria-describedby="emailHelp"value="{{$cliente->domicilio}}"> 
  </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Telefono</label>
    <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="emailHelp" value="{{$cliente->telefono}}"> 
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>
    </tr>
  @endforeach
  </tbody>
</table>
@stop

@section('css')
<link rel="stylesheet" href=	"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
@stop

@section('js')<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
new DataTable('#clientes');
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
var res=function(){
   var not=confirm("¿Esta seguro que desea eliminar?");
   return not;
   }
</script>
@stop
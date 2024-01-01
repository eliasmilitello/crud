<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div>
<img src="{{public_path('img/logoME.png')}}" alt="">
<h1> Listado de Clientes</h1>

<table id="clientes" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th scope="col">Cliente</th>
      <th scope="col">Telefono</th>
      <th scope="col">Domicilio</th>
      <th scope="col">DNI</th>
  
    </tr>
  </thead>
  <tbody>
  @foreach ($clientes as $cliente)
  <tr>
      <td>{{$cliente->cliente}}</td>
      <td>{{$cliente->telefono}}</td>
      <td>{{$cliente->domicilio}}</td>
      <td>{{$cliente->dni}}</td>
  </tr>
  @endforeach

</table>
</div>

</body>
</html>
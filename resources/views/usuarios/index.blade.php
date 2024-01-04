
<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'USUARIOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h1>USUARIOS</h1>
<img class="logo_banner"src="../../img/LO1.png" alt="Image 2">
</center>
</div>
<br>
<form method="POST"  action="{{route('buscarus')}}" >
    @csrf
    <div class="form-group">

        <input type="text" name="filtro_nombre" placeholder="Nombre"class="form-control" >
    </div>

    <!-- Agrega más campos de filtro según tus necesidades -->
    <button type="submit" class="btn btn-info">Buscar</button>
</form>
@if(session('roles')->codigo_rol== 3 )
<a href="{{route('usuarios.create')}} " class="btn btn-primary">Crear Usuario</a>
@endif
<button onclick="imprimirDiv()" class="btn btn-success">Imprimir</button>

@if(session('roles')->codigo_rol>=0)
<div class="container "id="reportid">
<table class="table boder_bar btn_modulos">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Usuario</th>
      <th>Rol</th>
      <th>Editar</th>
      @if(session('roles')->codigo_rol== 3 )  <th>Eliminar</th>@endif
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
    @if($dato->id==session('user')->id || session('roles')->codigo_rol== 3 )
    <tr>
      <td>{{ $dato['id'] }}</td>
      <td>{{ $dato['nombre_apellido'] }}</td>
      <td>{{ $dato['correo'] }}</td>
      <td>{{ $dato['usuario'] }}</td>
      <td>{{ $dato->Role['nombre_rol'] }}

      </td>
      <td><a  class="btn btn-primary" href="{{route('usuarios.edit',$dato['id'])}}">Editar</a></td>

      <td>
        <form class="deleteForm" action="{{route('usuarios.destroy',$dato['id'])}}" id_eliminar="{{$dato['id']}}"method="POST">
            @csrf
            @method('DELETE')
            @if(session('roles')->codigo_rol== 3 )   <button type="submit" class="btn btn-danger">Eliminar</button>@endif
        </form>
     </td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>
{{ $datos->links() }}
</div>

@endif


@endsection

<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'ROLES')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>ROLES</h1>
        <img class="logo_banner" src="../../img/LO1.png" alt="Image 2">
    </center>
</div>
<br>
<form method="POST"  action="{{route('buscarroles')}}" >
    @csrf
    <div class="form-group">

        <input type="text" name="filtro_nombre" placeholder="Nombre del Rol"class="form-control" >
    </div>

    <!-- Agrega más campos de filtro según tus necesidades -->
    <button type="submit" class="btn btn-info">Buscar</button>
</form>
<a href="{{route('roles.create')}} " class="btn btn-primary">Crear Roles</a>
<button onclick="imprimirDiv()" class="btn btn-success">Imprimir</button>
@if(session('roles')->codigo_rol>=0)
<div class="container "id="reportid">
    <table class="table boder_bar btn_modulos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Rol</th>
                <th>Codigo Rol</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            @if( session('roles')->codigo_rol== 3 )
            <tr>
                <td>{{ $dato['id'] }}</td>
                <td>{{ $dato['nombre_rol'] }}</td>
                <td>{{ $dato['codigo_rol']}}</td>

                <td><a class="btn btn-primary" href="{{route('roles.edit',$dato['id'])}}">Editar</a></td>

                <td>
                    <form class="deleteForm" action="{{route('roles.destroy',$dato['id'])}}" id_eliminar="{{$dato['id']}}"method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
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

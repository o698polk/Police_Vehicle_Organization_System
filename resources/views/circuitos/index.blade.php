<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'DISTRITOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CIRCUITOS</h1>
        <img class="logo_banner" src="../../img/LO1.png" alt="Image 2">
    </center>
</div>
<br>
<form method="POST"  action="{{route('buscarcir')}}" >
    @csrf
    <div class="form-group">

        <input type="text" name="filtro_nombre" placeholder="Codigo Circuito"class="form-control" >
    </div>

    <!-- Agrega más campos de filtro según tus necesidades -->
    <button type="submit" class="btn btn-info">Buscar</button>
</form>
<a href="{{route('circuitos.create')}} " class="btn btn-primary">Crear Circuito</a>
<button onclick="imprimirDiv()" class="btn btn-success">Imprimir</button>
@if(session('roles')->codigo_rol>=0)
<div class="container " id="reportid">
    <table class="table boder_bar btn_modulos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de circuito</th>
                <th>Codigo de circuito</th>
                <th>Numero de circuito</th>
                <th>Porroquia</th>
                <th>Usuario</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            @if($dato->Usuario['id']==session('user')->id || session('roles')->codigo_rol== 3 || session('roles')->codigo_rol== 1 ||session('roles')->codigo_rol== 0 )
            <tr>
                <td>{{ $dato['id'] }}</td>
                <td>{{ $dato['nombre_circuito'] }}</td>
                <td>{{ $dato['codigo_circuito'] }}</td>
                <td>{{ $dato['numero_circuito'] }}</td>
                <td>{{ $dato->Parroquia['nombre_parroquia']}}</td>
                <td>{{ $dato->Usuario['nombre_apellido']  }}</td>
                <td><a class="btn btn-primary" href="{{route('circuitos.edit',$dato['id'])}}">Editar</a></td>

                <td>
                    <form class="deleteForm" action="{{route('circuitos.destroy',$dato['id'])}}" id_eliminar="{{$dato['id']}}"method="POST">
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

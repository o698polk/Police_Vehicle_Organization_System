<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'VEHICULO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>VEHICULO</h1>
        <img class="logo_banner" src="../../img/LO1.png" alt="Image 2">
    </center>
</div>
<br>
<form method="POST"  action="{{route('buscarvh')}}" >
    @csrf
    <div class="form-group">

        <input type="text" name="filtro_nombre" placeholder="Placa"class="form-control" >
    </div>

    <!-- Agrega más campos de filtro según tus necesidades -->
    <button type="submit" class="btn btn-info">Buscar</button>
</form>
@if(session('roles')->codigo_rol== 3 )
<a href="{{route('vehiculos.create')}} " class="btn btn-primary">Crear Vehiculo</a>
@endif
<button onclick="imprimirDiv()" class="btn btn-success">Imprimir</button>
   <style>
    .bordetabl{
        border: 1px solid black;
    }

    </style>
@if(session('roles')->codigo_rol>=0)
<div class="container "id="reportid">
    <table class="table boder_bar btn_modulos" border="2">

        <thead>
            <tr>
                <th class="bordetabl">ID</th>
                <th class="bordetabl">Provincia</th>
                <th class="bordetabl">Tipo Vehiculo</th>
                <th class="bordetabl">Placa</th>
                <th class="bordetabl">Chasis</th>
                <th class="bordetabl">Marca</th>
                <th class="bordetabl">Modelo</th>
                <th class="bordetabl">Motor</th>
                <th class="bordetabl">Kilometraje</th>
                <th class="bordetabl">Cilindraje</th>
                <th class="bordetabl">Capacidad Carga</th>
                <th class="bordetabl">Capacidad Pasajeros</th>
                <th class="bordetabl">Usuario</th>
                <th class="bordetabl">Subcircuito</th>
                @if(session('roles')->codigo_rol== 3 )     <th>Editar</th>
                <th>Eliminar</th>   @endif
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            @if($dato->id==session('user')->id || session('roles')->codigo_rol== 3 || session('roles')->codigo_rol== 1 ||session('roles')->codigo_rol== 0 )
            <tr>
                <td class="bordetabl" >{{  $dato->id }}</td>
                <td class="bordetabl">{{ $dato->provincia}}</td>
                <td class="bordetabl">{{ $dato->tipo_vehiculo}}</td>
                <td class="bordetabl">{{ $dato->placa }}</td>
                <td class="bordetabl">{{ $dato->chasis }}</td>
                <td class="bordetabl">{{ $dato->marca }}</td>
                <td class="bordetabl">{{ $dato->modelo }}</td>
                <td class="bordetabl">{{ $dato->motor }}</td>
                <td class="bordetabl">{{ $dato->kilometraje }}</td>
                <td class="bordetabl">{{ $dato->cilindraje }}</td>
                <td class="bordetabl">{{ $dato->capacidad_carga }}</td>
                <td class="bordetabl">{{ $dato->capacidad_pasajeros }}</td>
                <td class="bordetabl">{{$dato->nombre_apellido }}</td>
                <td class="bordetabl">{{$dato->nombre_subcircuito ?? 'Sin subcircuito' }}</td>

                @if(session('roles')->codigo_rol== 3 ) <td><a class="btn btn-primary" href="{{route('vehiculos.edit',$dato->id)}}">Editar</a></td>
               
                <td>
                    <form class="deleteForm" action="{{route('vehiculos.destroy',$dato->id)}}" id_eliminar="{{$dato->id}}"method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                 </td>
                 @endif
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    {{ $datos->links() }}
</div>
@endif


@endsection

<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'PERSONAL POLICIAL')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>PERSONAL POLICIAL</h1>
        <img class="logo_banner" src="../../img/LO1.png" alt="Image 2">
    </center>
</div>
<br>
<form method="POST"  action="{{route('buscarpersonals')}}" >
    @csrf
    <div class="form-group">

        <input type="text" name="filtro_nombre" placeholder="Cedula"class="form-control" >
    </div>

    <!-- Agrega más campos de filtro según tus necesidades -->
    <button type="submit" class="btn btn-info">Buscar</button>
</form>
<a href="{{route('personals.create')}} " class="btn btn-primary">Crear Personals</a>
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
                <th class="bordetabl">Identificacion</th>
                <th class="bordetabl">Nombre y Apellido</th>
                <th class="bordetabl">Fecha de Nacimiento</th>
                <th class="bordetabl">Tipo de Sangre </th>
                <th class="bordetabl">Ciudad de Nacimineto</th>
                <th class="bordetabl">Numero de Telñefono</th>
                <th class="bordetabl">Rango</th>
                <th class="bordetabl">Proviencia</th>
                <th class="bordetabl">Subcircuito</th>
                <th class="bordetabl">Vehiculo</th>
                <th class="bordetabl">Placa</th>
                <th class="bordetabl">Usuario</th>

                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            @if($dato->id == session('user')->id || session('roles')->codigo_rol== 3 )
            <tr>
                <td class="bordetabl" >{{  $dato->id }}</td>
                <td class="bordetabl">{{ $dato->identificacion}}</td>
                <td class="bordetabl">{{ $dato->nombre_apellido }}</td>
                <td class="bordetabl">{{ $dato->fecha_nacimiento }}</td>
                <td class="bordetabl">{{ $dato->tipo_sangre }}</td>
                <td class="bordetabl">{{ $dato->ciudad_nacimeinto }}</td>
                <td class="bordetabl">{{ $dato->num_telefono }}</td>
                <td class="bordetabl">{{ $dato->rango }}</td>
                <td class="bordetabl">{{ $dato->provincia }}</td>
                <td class="bordetabl">{{$dato->nombre_subcircuito ?? 'Sin subcircuito' }}</td>
                <td class="bordetabl">{{ $dato->tipo_vehiculo }}</td>
                <td class="bordetabl">{{ $dato->placa }}</td>
                <td class="bordetabl">{{$dato->nombre_apellidou }}</td>


                <td><a class="btn btn-primary" href="{{route('personals.edit',$dato->id)}}">Editar</a></td>

                <td>
                    <form class="deleteForm" action="{{route('personals.destroy',$dato->id)}}" id_eliminar="{{$dato->id}}"method="POST">
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

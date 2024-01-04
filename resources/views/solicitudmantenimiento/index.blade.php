<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'SOLICITUD DE MANTENIMIENTO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>SOLICITUD DE MANTENIMIENTO</h1>
        <img class="logo_banner" src="../../img/LO1.png" alt="Image 2">
    </center>
</div>
<style>


</style>
<br>
<form method="POST"  action="{{route('buscarsolicitudmantenimiento')}}" >
    @csrf
    <div class="form-group">

        <input type="text" name="filtro_nombre" placeholder="Identificacion"class="form-control" >
    </div>

    <!-- Agrega más campos de filtro según tus necesidades -->
    <button type="submit" class="btn btn-info">Buscar</button>
</form>
<a href="{{route('solicitudmantenimiento.create')}} " class="btn btn-primary">Crear Solicitud</a>
<button onclick="imprimirDiv()" class="btn btn-success">Imprimir</button>
   <style>
    .bordetabl{
        border: 1px solid black;
    }

    </style>
@if(session('roles')->codigo_rol>=0)
<div class="container " id="reportid">
    <table class="table boder_bar btn_modulos" border="2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Solictante</th>
                <th>Identificacion</th>
                <th>Numero Telefonico</th>
                <th>Detalles</th>
                <th>Vehiculo Placa</th>
                <th>ID Dependencia </th>
                <th>Mantenimiento</th>
                <th>Usuario </th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            @if($dato->Usuario['id']==session('user')->id || session('roles')->codigo_rol== 3 || session('roles')->codigo_rol== 1 ||session('roles')->codigo_rol== 0 )
            <tr>
                <td class="bordetabl">{{ $dato['id'] }}</td>
                <td class="bordetabl">{{ $dato['nombre_apellido'] }}</td>
                <td class="bordetabl">{{ $dato['identificacion'] }}</td>
                <td class="bordetabl">{{ $dato['num_telefono'] }}</td>
                <td class="bordetabl">{{ $dato['detalle'] }}</td>
                <td class="bordetabl">{{ $dato->Vehiculo['tipo_vehiculo']}}/{{ $dato->Vehiculo['placa']}}</td>
                <td class="bordetabl">{{ $dato->Vehiculo['id_dependencia']}}</td>
                <td class="bordetabl">{{ $dato->Tipomantenimento['tipo_mantenineto']  }}</td>
                <td class="bordetabl">{{ $dato->Usuario['nombre_apellido']  }}</td>
                <td class="bordetabl"><a class="btn btn-primary" href="{{route('solicitudmantenimiento.edit',$dato['id'])}}">Editar</a></td>

                <td>
                    <form class="deleteForm" action="{{route('solicitudmantenimiento.destroy',$dato['id'])}}" id_eliminar="{{$dato['id']}}"method="POST">
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

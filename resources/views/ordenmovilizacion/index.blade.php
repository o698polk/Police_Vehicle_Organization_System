<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'ORDEN DE MOVILIZACION')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>ORDEN DE MOVILIZACION</h1>
        <img class="logo_banner" src="../../img/LO1.png" alt="Image 2">
    </center>
</div>
<style>


</style>
<br>
<form method="POST"  action="{{route('buscarordenmovilizacion')}}" >
    @csrf
    <div class="form-group">

        <input type="text" name="filtro_nombre" placeholder="Ocupantes"class="form-control" >
    </div>

    <!-- Agrega más campos de filtro según tus necesidades -->
    <button type="submit" class="btn btn-info">Buscar</button>
</form>
<a href="{{route('ordenmovilizacion.create')}} " class="btn btn-primary">Crear Orden</a>
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
                <th>Motivo</th>
                <th>Ruta</th>
                <th>Kilometraje Inicial</th>
                 <th>Datos de los Ocupantes</th>
                <th>Nombre del Solicitante</th>
                <th>Tipo vehiculo</th>
                <th>Placa vehiculo</th>
                <th>Kilometraje vehiculo</th>
                <th>Nombre del Conductor</th>
                <th>Dependencia</th>
                <th>Usuario </th>
                  @if(session('roles')->codigo_rol== 3 ||session('roles')->codigo_rol== 1 )
                 <th>Orden </th>
                  @endif
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            @if($dato->Usuario['id']==session('user')->id || session('roles')->codigo_rol== 3 || session('roles')->codigo_rol== 1)
            <tr>
                <td class="bordetabl">{{ $dato['id'] }}</td>
                <td class="bordetabl">{{ $dato['motivo'] }}</td>
                <td class="bordetabl">{{ $dato['ruta'] }}</td>
                <td class="bordetabl">{{ $dato['km_inicial'] }}</td>
                <td class="bordetabl">{{ $dato['dato_ocupantes'] }}</td>
                <td class="bordetabl">{{ $dato->personal2['id']}}-{{ $dato->personal2['nombre_apellido']}}-{{ $dato->personal2['identificacion']}}</td>
                <td class="bordetabl">{{ $dato->Vehiculo['tipo_vehiculo']}}</td>
                <td class="bordetabl">{{ $dato->Vehiculo['placa']}}</td>
                <td class="bordetabl">{{ $dato->Vehiculo['kilometraje']}}</td>
                <td class="bordetabl">{{ $dato->personal1['id']}}-{{ $dato->personal1['nombre_apellido']}}-{{ $dato->personal1['identificacion']}}</td>
               <td class="bordetabl">{{ $dato->Dependencia['id_subcircuito']  }}-{{ $dato->Dependencia['provincia']  }}</td>
                <td class="bordetabl">{{ $dato->Usuario['nombre_apellido']  }}</td>
               @if(session('roles')->codigo_rol== 3 ||session('roles')->codigo_rol== 1 )
                <td class="bordetabl"><a class="btn btn-primary" href="{{route('ordenmovilizacionfinalizar',$dato['id'])}}">Orden</a></td>
                @endif
                <td class="bordetabl"><a class="btn btn-primary" href="{{route('ordenmovilizacion.edit',$dato['id'])}}">Editar</a></td>

                <td>
                    <form class="deleteForm" action="{{route('ordenmovilizacion.destroy',$dato['id'])}}" id_eliminar="{{$dato['id']}}"method="POST">
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

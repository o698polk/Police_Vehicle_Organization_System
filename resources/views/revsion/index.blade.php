<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'REVISION VEHICULAR')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>REVISION VEHICULAR</h1>
        <img class="logo_banner" src="../../img/LO1.png" alt="Image 2">
    </center>
</div>
<style>


</style>
<br>
<form method="POST"  action="{{route('buscarevision')}}" >
    @csrf
    <div class="form-group">

        <input type="text" name="filtro_nombre" placeholder="Identificacion"class="form-control" >
    </div>

    <!-- Agrega más campos de filtro según tus necesidades -->
    <button type="submit" class="btn btn-info">Buscar</button>
</form>
<a href="{{route('revsion.create')}} " class="btn btn-primary">Crear Revision Vehicular</a>
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
                <th>Pago de la Matricula</th>
                <th> Pago de Rodaje </th>
                <th>No adeudar al Municipio</th>
                <th>Copia de cedula</th>
                <th>Detalles</th>
                <th>Recomendacion </th>
                <th>Vehiculo en Revision </th>
                <th>Nombre de Usuario</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            @if($dato->Usuario['id']==session('user')->id || session('roles')->codigo_rol== 3  )
            <tr>
                <td class="bordetabl">{{ $dato['id'] }}</td>
                <td class="bordetabl">{{ $dato['pago_matricula'] }}</td>
                <td class="bordetabl">{{ $dato['págo_rodaje'] }}</td>
                <td class="bordetabl">{{ $dato['no_deuda_gad'] }}</td>
                <td class="bordetabl"><iframe src=" url('{{ $dato['copia_cedula'] }}') " width="100%" height="500px"></iframe></td>
                <td class="bordetabl">{{ $dato['detalle'] }}</td>
                <td class="bordetabl">{{ $dato['recomendaciones'] }}</td>
                <td class="bordetabl">{{ $dato->Vehiculo['tipo_vehiculo']}}/{{ $dato->Vehiculo['placa']}}</td>
              
                <td class="bordetabl">{{ $dato->Usuario['nombre_apellido']  }}</td>
                <td class="bordetabl"><a class="btn btn-primary" href="{{route('revsion.edit',$dato['id'])}}">Editar</a></td>

                <td>
                    <form class="deleteForm" action="{{route('revsion.destroy',$dato['id'])}}" id_eliminar="{{$dato['id']}}"method="POST">
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




<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR SUBCIRCUITOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h1>CIRCUITOS</h1>
<img class="logo_banner"src="../../img/LO1.png" alt="Image 2">
</center>
</div>

@if(session('roles')->codigo_rol>=0)
<div class="container ">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>

                        @endif

                        <form method="post" action="{{ route('solicitudmantenimiento.update',$matriz['depen']->id) }}">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">
                            <div class="form-group">
                                <label for="nombre_apellido">Nombres</label>
                                <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control"value="{{$matriz['depen']->nombre_apellido}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="identificacion">DNI</label>
                                <input type="text" name="identificacion" id="identificacion" class="form-control"value="{{$matriz['depen']->identificacion}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="num_telefono" >Numero de Telefono</label>
                                <input type="text" name="num_telefono" id="num_telefonoo" class="form-control" value="{{$matriz['depen']->num_telefono}}"required >
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalle</label>
                                <input type="text" id="detalle" name="detalle" class="form-control"  value="{{$matriz['depen']->detalle}}" required>
                            </div>
                            <div class="form-group">
                                <label for="id_vehiculos">Selecciona un Vehiculo:</label>
                                <select name="id_vehiculos" id="id_vehiculos" class="form-control">
                                    @foreach ($matriz['datos']['Vehiculo'] as $dato)
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_vehiculos== $dato->id ? 'selected' : '' }}>
                                            {{ $dato->tipo_vehiculo}}/ {{ $dato->placa}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_tipomantenimentos">Selecciona un Tipo de mantenimiento</label>
                                <select name="id_tipomantenimentos" id="id_tipomantenimentos" class="form-control">
                                    @foreach ($matriz['datos']['Tipomantenimento'] as $dato)
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_tipomantenimentos== $dato->id ? 'selected' : '' }}>
                                            {{ $dato->tipo_mantenineto}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="{{$matriz['depen']->id_usuario}}"required style="display: none;"readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                        <a href="{{route('solicitudmantenimiento.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




  </tbody>
</table>

</div>
@endif


@endsection

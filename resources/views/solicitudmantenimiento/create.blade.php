<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR UNA SOLIICITUD')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREAR UNA SOLIICITUD</h1>
        <img class="logo_banner" src="../img/LO1.png" alt="Image 2">
    </center>


<div class="container">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form method="POST" action="{{route('solicitudmantenimiento.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre_apellido">Nombre</label>
                                <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="identificacion">Cedula</label>
                                <input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="num_telefono">Numero telefono</label>
                                <input type="text" id="num_telefono" name="num_telefono" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalle</label>
                                <input type="text" id="detalle" name="detalle" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="id_vehiculos">Selecciona el Vehiculo:</label>
                                <select class="form-control" id="id_vehiculos" name="id_vehiculos">
                                    @foreach($datos['Vehiculo'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->tipo_vehiculo}}/{{ $dato->placa}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_tipomantenimentos">Selecciona un Tipo de Solicitud</label>
                                <select class="form-control" id="id_tipomantenimentos" name="id_tipomantenimentos">
                                    @foreach($datos['Tipomantenimento'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->tipo_mantenineto}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('solicitudmantenimiento.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

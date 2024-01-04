<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR UNA SOLIICITUD')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREAR ORDEN DE MANTENIMIENTO </h1>
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

                        <form method="POST" action="{{route('mantenimiento.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="asunto">Asunto</label>
                                <input type="text" name="asunto" id="asunto" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalle</label>
                                <input type="text" name="detalle" id="detalle" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="prevencion">Reporte Preventivo</label>
                                <input type="text" id="prevencion" name="prevencion" class="form-control" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="id_vehiculos">Selecciona el Vehiculo:</label>
                                <select class="form-control" id="id_vehiculos" name="id_vehiculos">
                                    @foreach($datos['Vehiculo'] as $dato)
                                    <option value="{{ $dato->id }}">{{$dato->tipo_vehiculo}}-{{ $dato->placa}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_personals">Selecciona el Personal:</label>
                                <select class="form-control" id="id_personals" name="id_personals">
                                    @foreach($datos['Personal'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->nombre_apellido}}/{{ $dato->identificacion}}</option>
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
                            <div class="form-group">
                                <label for="id_solicitudmanteniminetos">Selecciona la Solicitud:</label>
                                <select class="form-control" id="id_solicitudmanteniminetos" name="id_solicitudmanteniminetos">
                                    @foreach($datos['Solicitudmantenimineto'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->id}}-{{ $dato->nombre_apellido}}-{{ $dato->identificacion}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('mantenimiento.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

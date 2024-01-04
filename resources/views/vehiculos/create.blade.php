<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR VEHICULO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREAR VEHICULO</h1>
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

                        <form method="POST" action="{{route('vehiculos.store')}}">
                            @csrf
                            
                            <div class="form-group">
                                <label for="id_dependencia">Tipo Vehiculo:</label>
                                <select class="form-control" name="tipo_vehiculo" id="tipo_vehiculo">
                                <option value="Auto">Auto</option>
                                <option value="Motocicleta">Motocicleta</option>
                                <option value="Camioneta">Camioneta</option>
                               
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="placa">Placa</label>
                                <input type="text" name="placa" id="placa" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="chasis">Chasis</label>
                                <input type="text" name="chasis" id="chasis" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca</label>
                                <input type="text" name="marca" id="marca" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="modelo">Modelo</label>
                                <input type="text" name="modelo" id="modelo" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="motor">Motor</label>
                                <input type="text" id="motor" name="motor" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="kilometraje">Kilometraje</label>
                                <input type="text" id="kilometraje" name="kilometraje" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cilindraje">Cilindraje</label>
                                <input type="text" id="cilindraje" name="cilindraje" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="capacidad_carga">Capacidad Carga</label>
                                <input type="text" id="capacidad_carga" name="capacidad_carga" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="capacidad_pasajeros">Capacidad Pasajeros</label>
                                <input type="text" id="capacidad_pasajeros" name="capacidad_pasajeros" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="id_dependencia">Selecciona un Subcircuito:</label>
                                <select class="form-control" id="id_dependencia" name="id_dependencia">
                                    @foreach($datos as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->Subcircuito->nombre_subcircuito}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('vehiculos.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

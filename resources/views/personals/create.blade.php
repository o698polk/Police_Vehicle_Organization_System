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

                        <form method="POST" action="{{route('personals.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="identificacion">Cedula o Identificacion </label>
                                <input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="'nombre_apellido">Nombre y Apellidos </label>
                                <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="tipo_sangre">Tipo de Sangre</label>
                                <select class="form-control" id="tipo_sangre" name="tipo_sangre">

                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ciudad_nacimeinto">Ciudad de Nacimiento</label>
                                <input type="text" name="ciudad_nacimeinto" id="ciudad_nacimeinto" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="num_telefono">Numero Telefonico</label>
                                <input type="text" id="num_telefono" name="num_telefono" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="rango">Rango</label>
                                <select class="form-control" id="rango" name="rango">

                                    <option value="Capitán">Capitán</option>
                                    <option value="Teniente">Teniente</option>
                                    <option value="Subteniente">Subteniente</option>
                                    <option value="Sargento Primero">Sargento Primero</option>
                                    <option value="Sargento Segundo">Sargento Segundo</option>
                                    <option value="Cabo Primero">Cabo Primero</option>
                                    <option value="Cabo Segundo">Cabo Segundo</option>


                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_vehiculos">Selecciona un Vehiculo:</label>
                                <select class="form-control" id="id_vehiculos" name="id_vehiculos">
                                    @foreach ($matriz['depen'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->tipo_vehiculo}}/{{ $dato->placa}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_dependencia">Selecciona un Subcircuito:</label>
                                <select class="form-control" id="id_dependencia" name="id_dependencia">
                                    @foreach($matriz['datos'] as $dato)
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
                        <a href="{{route('personals.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR MODULO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREAR MODULO</h1>
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

                        <form method="POST" action="{{route('modulos.store')}}">
                            @csrf

                            <div class="form-group">
                                <label for="nombre_modulos">Modulo</label>

                                <select class="form-control" name="nombre_modulos" id="nombre_modulos">
                                    <option value=""></option>
                                    <option value="ROLES">ROLES</option>
                                    <option value="USUARIOS">USUARIOS</option>
                                    <option value="DISTRITOS">DISTRITOS</option>
                                    <option value="PARROQUIAS">PARROQUIAS</option>
                                    <option value="CIRCUITOS">CIRCUITOS</option>
                                    <option value="SUBCIRCUITOS">SUBCIRCUITOS</option>
                                    <option value="DEPENDENCIAS">DEPENDENCIAS</option>
                                    <option value="REPORTES ATC">REPORTES ATC</option>
                                    <option value="VEHICULOS">VEHICULOS</option>
                                    <option value="PERSONAL POLICIAL">PERSONAL POLICIAL</option>
                                    <option value="SOLICITUD MANTENIMIENTO">SOLICITUD MANTENIMIENTO</option>
                                    <option value="ORDEN DE MANTENIMIENTO">ORDEN DE MANTENIMIENTO </option>
                                   <option value="ORDEN DE MOVILIZACION">ORDEN DE MOVILIZACION</option>
                                </select>
                            </div>

                            <div class="form-group"id="rutamodulo">
                                <select class="form-control" name="ruta" id="ruta">
                                    
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="id_roles">Selecciona un Rol:</label>
                                <select class="form-control" id="id_roles" name="id_roles">
                                    @foreach($datos['Role'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->nombre_rol}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('modulos.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

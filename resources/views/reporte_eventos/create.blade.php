<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR REPORTE ATC')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREARREPORTE ATC</h1>
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

                        <form method="POST" action="{{route('reporte_eventos.store')}}"id="formcontrol">
                            @csrf

                            <div class="form-group">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos">
                            </div>
                            <div class="form-group">
                                <label for="nombres">Nombres:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres">
                            </div>
                            <div class="form-group">
                                <label for="contacto">Contactos:</label>
                                <input type="text" class="form-control" id="contacto" name="contacto">
                            </div>

                            <div class="form-group">
                                <label for="tipo">Selecciona un Tipo:</label>
                                <select class="form-control" id="tipo" name="tipo">

                                    <option value="Reclamo">Reclamo</option>
                                    <option value="Sugerencia">Sugerencia</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalle:</label>
                                <input type="text" class="form-control" id="detalle" name="detalle">
                            </div>
                            <div class="form-group">
                                <label for="id_circuito">Selecciona un Circuito:</label>
                                <select class="form-control" id="id_circuito" name="id_circuito">
                                    @foreach($datos['Circuito'] as $dato2)
                                    <option value="{{ $dato2->id }}">{{ $dato2->nombre_circuito}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_subcircuito">Selecciona un Subircuito:</label>
                                <select class="form-control" id="id_subcircuito" name="id_subcircuito">

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('reporte_eventos.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

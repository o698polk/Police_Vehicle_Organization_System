<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR DEPENDENCIA')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREAR DEPENDENCIA</h1>
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

                        <form method="POST" action="{{route('dependencias.store')}}" id="formcontrol">
                            @csrf

                            <div class="form-group">
                                <label for="provincia">Selecciona una Provincia:</label>
                                <select class="form-control" id="provincia" name="provincia">
                                    <option value="LOJA">LOJA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_distrito">Selecciona un Distrito:</label>
                                <select class="form-control" id="id_distrito" name="id_distrito">
                                    @foreach($datos['Distrito'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->nombre_distrito}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_parroquia">Selecciona una Parroquia:</label>
                                <select class="form-control" id="id_parroquia" name="id_parroquia">

                                    @foreach($datos['Parroquia'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->nombre_parroquia}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" id="CircuitoSelect">
                                <label for="id_circuito">Selecciona una Circuito:</label>
                                <select class="form-control" id="id_circuito" name="id_circuito">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_subcircuito">Selecciona un Subcircuito:</label>
                                <select class="form-control" id="id_subcircuito" name="id_subcircuito">

                                </select>
                            </div>

                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('dependencias.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

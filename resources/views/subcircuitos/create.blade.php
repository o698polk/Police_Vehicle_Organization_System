<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR SUBCIRCUITO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREAR SUBCIRCUITO</h1>
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

                        <form method="POST" action="{{route('subcircuitos.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre_circuito">Nombres de subcircuito</label>
                                <input type="text" name="nombre_subcircuito" id="nombre_subcircuito" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="codigo_circuito">Codigo de subcircuito</label>
                                <input type="text" name="codigo_subcircuito" id="codigo_subcircuito" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="numero_circuito">Numero de subcircuito</label>
                                <input type="text" id="numero_subcircuito" name="numero_subcircuito" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="id_circuito">Selecciona un Circuito:</label>
                                <select class="form-control" id="id_circuito" name="id_circuito">
                                    @foreach($datos['Circuito'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->nombre_circuito}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('subcircuitos.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

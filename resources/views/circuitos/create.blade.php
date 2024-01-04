<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR CIRCUITO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREAR CIRCUITO</h1>
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

                        <form method="POST" action="{{route('circuitos.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre_circuito">Nombres de circuito</label>
                                <input type="text" name="nombre_circuito" id="nombre_circuito" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="codigo_circuito">Codigo de circuito</label>
                                <input type="text" name="codigo_circuito" id="codigo_circuito" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="numero_circuito">Numero de circuito</label>
                                <input type="text" id="numero_circuito" name="numero_circuito" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="id_parroquia">Selecciona una Parroquia:</label>
                                <select class="form-control" id="id_parroquia" name="id_parroquia">
                                    @foreach($datos['Parroquia'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->nombre_parroquia}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('circuitos.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

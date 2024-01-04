<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR DISTRITO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREAR DISTRITO</h1>
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

                        <form method="POST" action="{{route('distritos.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre_distrito">Nombres de distrito</label>
                                <input type="text" name="nombre_distrito" id="nombre_distrito" class="form-control" placeholder="" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="codigo_distrito">Codigo de distrito</label>
                                <input type="text" name="codigo_distrito" id="codigo_distrito" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="numero_distrito">Numero de distrito</label>
                                <input type="text" id="numero_distrito" name="numero_distrito" class="form-control" required>
                            </div>
                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('distritos.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

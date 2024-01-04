<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR PORROQUIAS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREAR PARROQUIAS</h1>
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

                        <form method="POST" action="{{route('parroquias.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre_parroquia">Nombres de la Parroquia </label>
                                <input type="text" name="nombre_parroquia" id="nombre_parroquia" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="id_distrito">Selecciona un Distrito:</label>
                                <select class="form-control" id="id_distrito" name="id_distrito">
                                    @foreach($datos['Distrito'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->nombre_distrito}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('parroquias.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

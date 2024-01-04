<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR  ROLES')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREAR ROLES</h1>
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

                        <form method="POST" action="{{route('roles.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre_rol">Nombres Rol</label>
                                <input type="text" name="nombre_rol" id="nombre_rol" class="form-control" placeholder="" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="codigo_rol">Codigo Rol</label>
                                <input type="text" name="codigo_rol" id="codigo_rol" class="form-control" placeholder="" required autofocus>
                            </div>


                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('roles.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

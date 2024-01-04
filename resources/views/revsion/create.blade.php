<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'CREAR UNA REVISION VEHICULAR')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
    <center>
        <h1>CREAR UNA REVISION VEHICULAR</h1>
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

                        <form method="POST" action="{{route('revsion.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="pago_matricula">Matricula Pgada</label>
                                <input type="text" name="pago_matricula" id="pago_matricula" class="form-control" placeholder="si o no" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="págo_rodaje">Pago de Rodaje</label>
                                <input type="text" name="págo_rodaje" id="págo_rodaje" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="no_deuda_gad">No adeudar al Municipio</label>
                                <input type="text" id="no_deuda_gad" name="no_deuda_gad" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="copia_cedula">Copia de la cedula</label>
                                <input type="file" id="copia_cedula" name="copia_cedula" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalle</label>
                                <input type="text" id="detalle" name="detalle" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="recomendaciones">Recomendaciones</label>
                                <input type="text" id="recomendaciones" name="recomendaciones" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="id_vehiculos">Selecciona el Vehiculo:</label>
                                <select class="form-control" id="id_vehiculos" name="id_vehiculos">
                                    @foreach($datos['Vehiculo'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->tipo_vehiculo}}/{{ $dato->placa}}</option>
                                    @endforeach
                                </select>
                            </div>
                           
                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $user->__get('id');?>"required style="display: none;"readonly>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear</button>
                        </form>
                        <a href="{{route('revsion.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

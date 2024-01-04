


<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR CIRCUITOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h1>CIRCUITOS</h1>
<img class="logo_banner"src="../../img/LO1.png" alt="Image 2">
</center>
</div>

@if(session('roles')->codigo_rol>=0)
<div class="container ">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>

                        @endif

                        <form method="post" action="{{ route('vehiculos.update',$matriz['depen']->id) }}">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">

                       
                            <div class="form-group">
                                <label for="id_dependencia">Tipo Vehiculo:</label>
                                <select class="form-control" name="tipo_vehiculo" id="tipo_vehiculo" >
                                <option value="{{$matriz['depen']->tipo_vehiculo}}">{{$matriz['depen']->tipo_vehiculo}}</option>
                                <option value="Auto">Auto</option>
                                <option value="Motocicleta">Motocicleta</option>
                                <option value="Camioneta">Camioneta</option>
                               
                                </select>


                            <div class="form-group">
                                <label for="placa">Placa</label>
                                <input type="text" name="placa" id="placa" class="form-control" value="{{$matriz['depen']->placa}}" required >
                            </div>
                            
                            <div class="form-group">
                                <label for="chasis">Chasis</label>
                                <input type="text" name="chasis" id="chasis" class="form-control" value="{{$matriz['depen']->chasis}}" required >
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca</label>
                                <input type="text" name="marca" id="marca" class="form-control" value="{{$matriz['depen']->marca}}" required >
                            </div>
                            <div class="form-group">
                                <label for="modelo">Modelo</label>
                                <input type="text" name="modelo" id="modelo" class="form-control" value="{{$matriz['depen']->modelo}}"required>
                            </div>
                            <div class="form-group">
                                <label for="motor">Motor</label>
                                <input type="text" id="motor" name="motor" class="form-control" value="{{$matriz['depen']->motor}}"required>
                            </div>
                            <div class="form-group">
                                <label for="kilometraje">Kilometraje</label>
                                <input type="text" id="kilometraje" name="kilometraje" class="form-control" value="{{$matriz['depen']->kilometraje}}"required>
                            </div>
                            <div class="form-group">
                                <label for="cilindraje">Cilindraje</label>
                                <input type="text" id="cilindraje" name="cilindraje" class="form-control" value="{{$matriz['depen']->cilindraje}}"required>
                            </div>
                            <div class="form-group">
                                <label for="capacidad_carga">Capacidad Carga</label>
                                <input type="text" id="capacidad_carga" name="capacidad_carga" class="form-control" value="{{$matriz['depen']->capacidad_carga}}"required>
                            </div>
                            <div class="form-group">
                                <label for="capacidad_pasajeros">Capacidad Pasajeros</label>
                                <input type="text" id="capacidad_pasajeros" name="capacidad_pasajeros" class="form-control" value="{{$matriz['depen']->capacidad_pasajeros}}" required>
                            </div>

                            <div class="form-group">
                                <label for="id_dependencia">Selecciona un subcircuito:</label>
                                <select name="id_dependencia" id="id_dependencia" class="form-control">
                                    <option value="{{ $matriz['recoor']->id }}" selected>
                                        {{ $matriz['recoor']->Subcircuito->nombre_subcircuito}}
                                    </option>

                                    @foreach($matriz['datos'] as $dato)
                                    <option value="{{ $dato->id }}">{{ $dato->Subcircuito->nombre_subcircuito}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="{{$matriz['depen']->id_usuario}}"required style="display: none;"readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                        <a href="{{route('vehiculos.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




  </tbody>
</table>

</div>
@endif


@endsection




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

                        <form method="post" action="{{ route('personals.update',$matriz['depen']->id) }}">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">

                            <div class="form-group">
                                <label for="identificacion">Cedula o Identificacion </label>
                                <input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="" value="{{$matriz['depen']->identificacion}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="'nombre_apellido">Nombre y Apellidos </label>
                                <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control" placeholder=""  value="{{$matriz['depen']->nombre_apellido}}"required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{$matriz['depen']->fecha_nacimiento}}" placeholder="" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="tipo_sangre">Tipo de Sangre</label>
                                <select class="form-control" id="tipo_sangre" name="tipo_sangre">
                                    <option value="{{$matriz['depen']->tipo_sangre}}" selected>{{$matriz['depen']->tipo_sangre}}</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ciudad_nacimeinto">Ciudad de Nacimiento</label>
                                <input type="text" name="ciudad_nacimeinto" id="ciudad_nacimeinto"value="{{$matriz['depen']->ciudad_nacimeinto}}" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="num_telefono">Numero Telefonico</label>
                                <input type="text" id="num_telefono" name="rango" value="{{$matriz['depen']->rango}}"class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="rango">Rango</label>
                                <select class="form-control" id="rango" name="rango">
                                    <option value="{{$matriz['depen']->rango}}" selected>{{$matriz['depen']->rango}}</option>
                                    <option value="Capitán">Capitán</option>
                                    <option value="Teniente">Teniente</option>
                                    <option value="Subteniente">Subteniente</option>
                                    <option value="Sargento Primero">Sargento Primero</option>
                                    <option value="Sargento Segundo">Sargento Segundo</option>
                                    <option value="Cabo Primero">Cabo Primero</option>
                                    <option value="Cabo Segundo">Cabo Segundo</option>


                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_vehiculos">Selecciona un Vehiculo:</label>
                                <select class="form-control" id="id_vehiculos" name="id_vehiculos">
                                    @foreach ($matriz['vehiculos'] as $dato)
                                    <option value="{{ $dato->id }}"
                                        {{ $matriz['depen']->id_vehiculos== $dato->id ? 'selected' : '' }}>
                                        {{ $dato->tipo_vehiculo}}/{{ $dato->placa}}
                                    </option>
                                    @endforeach
                                </select>
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
                        <a href="{{route('personals.index')}}" class="btn btn-defaul">Regresar</a>
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

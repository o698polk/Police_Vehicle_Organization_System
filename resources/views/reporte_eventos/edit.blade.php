


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

                        <form method="post" action="{{ route('reporte_eventos.update',$matriz['depen']->id) }}">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">

                            <div class="form-group">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos"value="{{ $matriz['depen']->apellidos}}">
                            </div>
                            <div class="form-group">
                                <label for="nombres">Nombres:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres"value="{{ $matriz['depen']->nombres}}">
                            </div>
                            <div class="form-group">
                                <label for="contacto">Contactos:</label>
                                <input type="text" class="form-control" id="contacto" name="contacto" value="{{ $matriz['depen']->contacto}}">
                            </div>

                            <div class="form-group">
                                <label for="tipo">Selecciona un Tipo:</label>
                                <select class="form-control" id="tipo" name="tipo">
                                    <option value="{{ $matriz['depen']->tipo}}"selected>{{ $matriz['depen']->tipo}}</option>
                                    <option value="Reclamo">Reclamo</option>
                                    <option value="Sugerencia">Sugerencia</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalle:</label>
                                <input type="text" class="form-control" id="detalle" name="detalle"value="{{ $matriz['depen']->detalle}}">
                            </div>


                            <div class="form-group">
                                <label for="id_circuito">Selecciona un Circuito:</label>
                                <select name="id_circuito" id="id_circuito" class="form-control">
                                    @foreach ($matriz['datos']['Circuito']  as $dato)
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_circuito == $dato->id ? 'selected' : '' }}>
                                            {{ $dato->nombre_circuito }}
                                        </option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_subcircuito">Selecciona un Subcircuito:</label>
                                <select name="id_subcircuito" id="id_subcircuito" class="form-control">
                                    @foreach ($matriz['datos']['Subcircuito'] as $dato)
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_subcircuito == $dato->id ? 'selected' : '' }}>
                                            {{ $dato->nombre_subcircuito}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <?php  $user = session('user') ?>
                            <div class="form-group">

                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="{{$matriz['depen']->id_usuario}}"required style="display: none;"readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                        <a href="{{route('reporte_eventos.index')}}" class="btn btn-defaul">Regresar</a>
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

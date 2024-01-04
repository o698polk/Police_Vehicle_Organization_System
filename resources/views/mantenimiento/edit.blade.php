


<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h1>EDITAR</h1>
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

                        <form method="post" action="{{ route('mantenimiento.update',$matriz['depen']->id) }}">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">
                            <div class="form-group">
                                <label for="asunto">Asunto</label>
                                <input type="text" name="asunto" id="asunto" class="form-control"value="{{$matriz['depen']->asunto}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="detalle">Detalle</label>
                                <input type="text" name="detalle" id="detalle" class="form-control"value="{{$matriz['depen']->detalle}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="prevencion" >Prevencion</label>
                                <input type="text" name="prevencion" id="prevencion" class="form-control" value="{{$matriz['depen']->prevencion}}"required >
                            </div>

                            <div class="form-group">
                                <label for="id_solicitudmanteniminetos">Selecciona una Solicitud:</label>
                                <select name="id_solicitudmanteniminetos" id="id_solicitudmanteniminetos" class="form-control">
                                    @foreach ($matriz['datos']['Solicitudmantenimineto'] as $dato)
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_solicitudmanteniminetos == $dato->id ? 'selected' : '' }}>
                                            {{ $dato->id}}-{{ $dato->nombre_apellido}}-{{ $dato->identificacion}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_personals">Selecciona Quien Retira:</label>
                                <select name="id_personals" id="id_personals" class="form-control">
                                    @foreach ($matriz['datos']['Personal'] as $dato)
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_personals == $dato->id ? 'selected' : '' }}>
                                            {{ $dato->identificacion}}/ {{ $dato->nombre_apellido}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="id_vehiculos">Selecciona un Vehiculo:</label>
                                <select name="id_vehiculos" id="id_vehiculos" class="form-control">
                                    @foreach ($matriz['datos']['Vehiculo'] as $dato)
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_vehiculos== $dato->id ? 'selected' : '' }}>
                                            {{ $dato->tipo_vehiculo}}/ {{ $dato->placa}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_tipomantenimentos">Selecciona un Tipo de mantenimiento</label>
                                <select name="id_tipomantenimentos" id="id_tipomantenimentos" class="form-control">
                                    @foreach ($matriz['datos']['Tipomantenimento'] as $dato)
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_tipomantenimentos== $dato->id ? 'selected' : '' }}>
                                            {{ $dato->tipo_mantenineto}}
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
                        <a href="{{route('mantenimiento.index')}}" class="btn btn-defaul">Regresar</a>
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

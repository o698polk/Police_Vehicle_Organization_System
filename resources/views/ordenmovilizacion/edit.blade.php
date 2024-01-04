


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

                        <form method="post" action="{{ route('ordenmovilizacion.update',$matriz['depen']->id) }}">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">

                              <div class="form-group">
                                <label for="motivo">Motivo</label>
                                <input type="text" name="motivo" id="motivo" class="form-control" placeholder="" value="{{$matriz['depen']->motivo}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="ruta">Ruta</label>
                                <input type="text" name="ruta" id="ruta" class="form-control" placeholder="" value="{{$matriz['depen']->ruta}}">
                            </div>
                            <div class="form-group">
                                <label for="km_inicial">Kilometraje Inicial</label>
                                <input type="text" id="km_inicial" name="km_inicial" class="form-control" value="{{$matriz['depen']->km_inicial}}" required>
                            </div>
                        
                         <div class="form-group">
                                <label for="dato_ocupantes">Datos de los Ocupantes </label>
                                <input type="text" id="dato_ocupantesl" name="dato_ocupantes" class="form-control"  value="{{$matriz['depen']->dato_ocupantes}}"required>
                            </div>
                            <div class="form-group">
                                <label for="id_vehiculos">Selecciona el Vehiculo:</label>
                                <select class="form-control" id="id_vehiculos" name="id_vehiculos">
                                   
                             @foreach ($matriz['datos']['Vehiculo'] as $dato)
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_vehiculos == $dato->id ? 'selected' : '' }}>
                                            {{ $dato->id}}{{$dato->tipo_vehiculo}}-{{ $dato->placa}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_personals_conductor">Selecciona Conductor:</label>
                                <select class="form-control" id="id_personals_conductor" name="id_personals_conductor">
                                   
                          @foreach ($matriz['datos']['Personal'] as $dato)
                                         <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_personals_conductor == $dato->id ? 'selected' : '' }}>
                                            {{ $dato->id}}-{{ $dato->nombre_apellido}}-{{ $dato->identificacion}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                              <div class="form-group">
                                <label for="id_personals_solicitante">Selecciona Solicitante:</label>
                                <select class="form-control" id="id_personals_solicitante" name="id_personals_solicitante">
                                    
                              @foreach ($matriz['datos']['Personal'] as $dato)
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_personals_solicitante == $dato->id ? 'selected' : '' }}>
                                            {{ $dato->id}}-{{ $dato->nombre_apellido}}-{{ $dato->identificacion}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_dependencia">Selecciona una Dependnecia</label>
                                <select class="form-control" id="id_dependencia" name="id_dependencia">
                                    
                                  @foreach ($matriz['datos']['Dependencia'] as $dato)
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_dependencia == $dato->id ? 'selected' : '' }}>
                                            {{ $dato->id_subcircuito}}-{{ $dato->provincia}}
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
                        <a href="{{route('ordenmovilizacion.index')}}" class="btn btn-defaul">Regresar</a>
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

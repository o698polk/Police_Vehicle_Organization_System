


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

                        <form method="post" action="{{ route('depenupdate',$matriz['depen']->id) }}" id="formcontrol">
                            @method('POST')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">


                            <div class="form-group">
                                <label for="provincia">Selecciona una Provincia:</label>
                                <select class="form-control" id="provincia" name="provincia">
                                    <option value="{{ $matriz['depen']->provincia}}"selected>{{ $matriz['depen']->provincia}}</option>
                                    <option value="LOJA">LOJA</option>



                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_distrito">Selecciona un Distrito:</label>
                                <select class="form-control" id="id_distrito" name="id_distrito">
                                    @foreach ($matriz['datos']['Distrito'] as $dato)
                                    <option value="{{ $dato->id }}"
                                        {{ $matriz['depen']->id_distrito== $dato->id ? 'selected' : '' }}>
                                        {{ $dato->nombre_distrito}}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_parroquia">Selecciona una Parroquia:</label>
                                <select class="form-control" id="id_parroquia" name="id_parroquia">


                                    @foreach ($matriz['datos']['Parroquia'] as $dato)
                                    <option value="{{ $dato->id }}"
                                        {{ $matriz['depen']->id_parroquia== $dato->id ? 'selected' : '' }}>
                                        {{ $dato->nombre_parroquia}}
                                    </option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group" >
                                <label for="id_circuito">Selecciona una Circuito:</label>
                                <select class="form-control" id="id_circuito" name="id_circuito">
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
                                <select class="form-control" id="id_subcircuito" name="id_subcircuito">
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
                        <a href="{{route('dependencias.index')}}" class="btn btn-defaul">Regresar</a>
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

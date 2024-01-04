


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

                        <form method="post" action="{{ route('circuitos.update',$matriz['depen']->id) }}">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">

                            <div class="form-group">
                                <label for="nombre_circuito">Nombres de circuito</label>
                                <input type="text" name="nombre_circuito" id="nombre_circuito" class="form-control"value="{{$matriz['depen']->nombre_circuito}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="codigo_circuito">Codigo de circuito</label>
                                <input type="text" name="codigo_circuito" id="codigo_circuito" class="form-control" value="{{$matriz['depen']->codigo_circuito}}"required >
                            </div>
                            <div class="form-group">
                                <label for="numero_circuito">Numero de circuito</label>
                                <input type="text" id="numero_circuito" name="numero_circuito" class="form-control"  value="{{$matriz['depen']->numero_circuito}}" required>
                            </div>

                            <div class="form-group">
                                <label for="id_parroquia">Selecciona una Parroquia:</label>
                                <select name="id_parroquia" id="id_parroquia" class="form-control">
                                    @foreach ($matriz['datos']['Parroquia'] as $dato)
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_parroquia== $dato->id ? 'selected' : '' }}>
                                            {{ $dato->nombre_parroquia}}
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
                        <a href="{{route('circuitos.index')}}" class="btn btn-defaul">Regresar</a>
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

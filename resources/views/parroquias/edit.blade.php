


<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR PARROQUIAS')

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

                        <form method="post" action="{{ route('parroquias.update',$matriz['depen']->id) }}">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">

                            <div class="form-group">
                                <label for="nombre_parroquia">Nombres de la Parroquia </label>
                                <input type="text" name="nombre_parroquia" id="nombre_parroquia" class="form-control"value="{{$matriz['depen']->nombre_parroquia}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="id_distrito">Selecciona un Distrito:</label>
                                <select name="id_distrito" id="id_distrito" class="form-control">
                                    @foreach ($matriz['datos']['Distrito'] as $dato)
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_distrito== $dato->id ? 'selected' : '' }}>
                                            {{ $dato->nombre_distrito}}
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
                        <a href="{{route('parroquias.index')}}" class="btn btn-defaul">Regresar</a>
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




<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR ROLES')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h1>ROLES</h1>
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

                        <form method="post" action="{{ route('roles.update',$matriz['depen']->id) }}">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">

                            <div class="form-group">
                                <label for="nombre_rol">Nombres Rol</label>
                                <input type="text" name="nombre_rol" id="nombre_rol" class="form-control"  value="{{ $matriz['depen']->nombre_rol}}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="codigo_rol">Nombres Rol</label>
                                <input type="text" name="codigo_rol" id="codigo_rol" class="form-control"  value="{{ $matriz['depen']->codigo_rol}}" required autofocus>
                            </div>


                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                        <a href="{{route('roles.index')}}" class="btn btn-defaul">Regresar</a>
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

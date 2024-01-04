


<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR USUARIO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h1>USUARIOS</h1>
<img class="logo_banner"src="../../img/LO1.png" alt="Image 2">
</center>


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

                        <form method="post" action="{{ route('usuarios.update',$matriz['depen']->id) }}">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">
                            <div class="form-group">
                                <label for="nombre_apellido">Nombres y Apellidos</label>
                                <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control" value="{{$matriz['depen']->nombre_apellido }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="usuario">Nombre de Usuario</label>
                                <input type="text" name="usuario" id="usuario" class="form-control" value="{{$matriz['depen']->usuario }}">
                            </div>
                            <div class="form-group">
                                <label for="correo">Email</label>
                                <input type="email" id="correo" name="correo" class="form-control" value="{{$matriz['depen']->correo }}" required>
                            </div>

                            <div class="form-group">
                                <label for="clave">Password</label>
                                <input type="password" id="clave" name="clave" class="form-control" value="{{$matriz['depen']->clave }}" required>
                            </div>
                            @if(session('roles')->codigo_rol==3)
                            <div class="form-group">
                                <label for="id_roles">Selecciona un Rol:</label>
                                <select name="id_roles" id="id_roles" class="form-control">
                                    @foreach ($matriz['datos']['Role'] as $dato)
                                   
                                        <option value="{{ $dato->id }}"
                                            {{ $matriz['depen']->id_roles== $dato->id ? 'selected' : '' }}>
                                            {{ $dato->nombre_rol}}
                                        </option>
                                       
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                        <a href="{{route('usuarios.index')}}" class="btn btn-defaul">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




  </tbody>
</table>
</div>
</div>
@endif


@endsection

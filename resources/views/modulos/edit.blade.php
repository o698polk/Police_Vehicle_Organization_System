


<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR MODULOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h1>EDITAR MODULOS</h1>
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

                        <form method="post" action="{{ route('modulos.update',$matriz['depen']->id) }}">
                            @method('PUT')
                             @csrf

                            <input type="hidden" name="id" value="{{$matriz['depen']->id}}">


                            <div class="form-group">
                                <label for="nombre_modulos">Modulo</label>

                                <select class="form-control" name="nombre_modulos" id="nombre_modulos">

                                    <option value="{{$matriz['depen']->nombre_modulos }}">{{$matriz['depen']->nombre_modulos }}</option>
                                    <option value="USUARIOS">USUARIOS</option>
                                    <option value="DISTRITOS">DISTRITOS</option>
                                    <option value="PARROQUIAS">PARROQUIAS</option>
                                    <option value="CIRCUITOS">CIRCUITOS</option>
                                    <option value="SUBCIRCUITOS">SUBCIRCUITOS</option>
                                    <option value="DEPENDENCIAS">DEPENDENCIAS</option>
                                    <option value="REPORTES ATC">REPORTES ATC</option>
                                    <option value="VEHICULOS">VEHICULOS</option>
                                    <option value="PERSONAL POLICIAL">PERSONAL POLICIAL</option>
                                    <option value="SOLICITUD MANTENIMIENTO">SOLICITUD MANTENIMIENTO</option>
                                      <option value="ORDEN DE MOVILIZACION">ORDEN DE MOVILIZACION</option>

                                </select>
                            </div>

                            <div class="form-group"id="rutamodulo">
                                <select class="form-control" name="ruta" id="ruta">
                                    <option value="{{$matriz['depen']->ruta}}">{{$matriz['depen']->ruta}}</option>
                                </select>

                            </div>

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
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                        <a href="{{route('modulos.index')}}" class="btn btn-defaul">Regresar</a>
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

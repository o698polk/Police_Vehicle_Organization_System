<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'POLICIA NACIONAL')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="containe  page_style">
<center>
<h2>PANEL DE CONTROL</h2>
<img class="logo_banner"src="img/LO1.png" alt="Image 2">
</center>
<style>
.square-button {
  display: inline-block;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  color: #000000;
  background-color: white;
  border: 1px solid #000000;
  border-radius: 0;
  cursor: pointer;
}
</style>

<div class="container">
  <div class="row">

  <?php  $user = session('user');
         $modulos = session('modulos');

  ?>
  <?php  if (session('roles')->codigo_rol>=0)
  {?>
  @foreach($modulos as $dato)

  <div class="col-sm square-button">
    <a href="{{route($dato->ruta)}}" class="btn_modulos">{{ $dato->nombre_modulos}}</a>
    </div>


  @endforeach
  <?php }?>

  <!--


    <div class="col-sm square-button">
    <a href="{{route('usuarios.index')}}" class="btn_modulos">USUARIOS</a>
    </div>
    <div class="col-sm square-button">
    <a href="{{route('distritos.index')}}" class="btn_modulos">DISTRITOS</a>
    </div>
    <div class="col-sm square-button">
        <a href="{{route('parroquias.index')}}" class="btn_modulos">PARROQUIAS</a>
        </div>
    <div class="col-sm square-button">
    <a href="{{route('circuitos.index')}}" class="btn_modulos">CIRCUITOS</a>
    </div>
    <div class="col-sm square-button">
    <a href="{{route('subcircuitos.index')}}" class="btn_modulos">SUBCIRCUITOS </a>
    </div>
      <a href="{{route('dependencias.index')}}" class="btn_modulos">DEPENDENCIAS </a>
     </div>
     <div class="col-sm square-button">
        <a href="{{route('reporte_eventos.index')}}" class="btn_modulos">REPORTES ATC</a>
    </div>
    <div class="col-sm square-button">
        <a href="{{route('vehiculos.index')}}" class="btn_modulos">VEHICULOS </a>
    </div>
     <div class="col-sm square-button">

  <?php  if ($user->__get('rol') >= 2)
  {?>
    <div class="col-sm square-button">
    <a href="distrito" class="btn_modulos">REPORTES GENERAL</a>
    </div>
    <?php }?>
    <?php  if ($user->__get('rol') >=1)
    {?>
    <div class="col-sm square-button">
    <a href="distrito" class="btn_modulos">DOCUMENTOS</a>
    </div>
    <?php }?>
    <?php  if ($user->__get('rol') >=0)
    {?>
    <div class="col-sm square-button">
    <a href="distrito" class="btn_modulos">DOCUMENTOS</a>
    </div>
    <?php }?>-->
  </div>
</div>
</div>
@endsection




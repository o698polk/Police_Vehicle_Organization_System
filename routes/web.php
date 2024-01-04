<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DsitritoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CircuitoController;
use App\Http\Controllers\SubcircuitoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\Reportes_eventosController;
use App\Http\Controllers\ParroquiaController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\SolicitudmanteniminetoController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\RevisionController;
use App\Http\Controllers\OrdenmovilizacioneController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// RUTA GET *****************************

Route::get('/', [HomeController::class, 'Index'])->name('home');
Route::get('/register', [HomeController::class, 'Register'])->name('register');
Route::get('/login', [HomeController::class, 'Login'])->name('login');
Route::get('/dashboard', [HomeController::class, 'Dashboard'])->name('dashboard');
Route::get('/salir', [HomeController::class, 'Salir'])->name('salir');
Route::get('/reportes', [Reportes_eventosController::class, 'reportes'])->name('reportes');
Route::get('/generarreportes', [Reportes_eventosController::class, 'generarreportes'])->name('generarreportes');


// RUTAS POST
Route::post('/registrar_usuario', [UsuarioController::class, 'Registrar_usuario'])->name('registrar_usuario');
Route::post('/login', [UsuarioController::class, 'Login'])->name('loginuser');

//BUSCAR

Route::post('/buscarvehiculo', [VehiculoController::class, 'buscar'])->name('buscarvh');
Route::post('/buscarusuario', [UsuarioController::class, 'buscar'])->name('buscarus');
Route::post('/buscardistrito', [DsitritoController::class, 'buscar'])->name('buscardis');
Route::post('/buscarcircuito', [CircuitoController::class, 'buscar'])->name('buscarcir');
Route::post('/buscarsubcircuito', [SubcircuitoController::class, 'buscar'])->name('buscarsubc');
Route::post('/buscardependencia', [DependenciaController::class, 'buscar'])->name('buscardep');
Route::post('/buscarreporte_eventos', [Reportes_eventosController::class, 'buscar'])->name('buscarreport');
Route::post('/buscarrreportefe', [Reportes_eventosController::class, 'reportes'])->name('buscarrepfech');
Route::post('/buscarparroquias', [ParroquiaController::class, 'buscar'])->name('buscarparroq');
Route::post('/buscarmodulo', [ModuloController::class, 'buscar'])->name('buscarmodulo');
Route::post('/buscarroles', [RolController::class, 'buscar'])->name('buscarroles');
Route::post('/buscarsolicitudmantenimiento', [SolicitudmanteniminetoController::class, 'buscar'])->name('buscarsolicitudmantenimiento');
Route::post('/buscarmantenimiento', [MantenimientoController::class, 'buscar'])->name('buscarmantenimiento');
Route::post('/buscarpersonals', [PersonalController::class, 'buscar'])->name('buscarpersonals');

Route::post('/buscarevision', [RevisionController::class, 'buscar'])->name('buscarevision');


Route::post('buscarordenmovilizacion', [OrdenmovilizacioneController::class, 'buscar'])->name('buscarordenmovilizacion');


Route::post('/slectparroquia', [DependenciaController::class, 'slectparroquia']);
Route::post('/slectcircuito', [DependenciaController::class, 'slectcircuito']);
Route::post('/slectsupcircuito', [DependenciaController::class, 'slectsupcircuito']);
Route::post('/actualizardependecia/{id}', [DependenciaController::class, 'update'])->name('depenupdate');

//RUTAS DE FUNCIONAMIENTOS
Route::get('/ordentrabajo/{id}', [MantenimientoController::class, 'orden'])->name('ordentrabajo');
//RUTAS DE FUNCIONAMIENTOS
Route::get('/ordenmovilizacionfinalizar/{id}', [OrdenmovilizacioneController::class, 'orden'])->name('ordenmovilizacionfinalizar');

//RUTAS RESOURCE

Route::resource('/usuarios', UsuarioController::class);
Route::resource('/distritos', DsitritoController::class);
Route::resource('/parroquias',ParroquiaController::class);
Route::resource('/circuitos', CircuitoController::class);
Route::resource('/subcircuitos', SubcircuitoController::class);
Route::resource('/vehiculos', VehiculoController::class);
Route::resource('/dependencias',DependenciaController::class);
Route::resource('/reporte_eventos',Reportes_eventosController::class);
Route::resource('/modulos',ModuloController::class);
Route::resource('/roles',RolController::class);
Route::resource('/personals',PersonalController::class);
Route::resource('/solicitudmantenimiento',SolicitudmanteniminetoController::class);
Route::resource('/mantenimiento',MantenimientoController::class);
Route::resource('/revsion',RevisionController::class);
Route::resource('/ordenmovilizacion',OrdenmovilizacioneController::class);


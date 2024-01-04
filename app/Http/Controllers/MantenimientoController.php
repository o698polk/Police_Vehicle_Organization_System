<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Exception;
use App\Models\Subcircuito ;
use App\Models\Circuito;
use App\Models\Parroquia;
use App\Models\Distrito ;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use App\Models\Dependencia;
use App\Models\Vehiculo;
use App\Models\Personal;
use App\Models\Solicitudmantenimineto;
use App\Models\Tipomantenimento;
use App\Models\Mantenimiento;

class MantenimientoController extends Controller
{
    public function index()
    {

            if (session()->has('user')) {

                $datos = Mantenimiento::with('Vehiculo','Tipomantenimento','Personal','Solicitudmantenimineto','Usuario')
                ->has('Vehiculo')
                ->has('Tipomantenimento')
                ->has('Personal')
                ->has('Solicitudmantenimineto')
                ->latest()
                ->has('Usuario')->paginate(10) ;
        return view('mantenimiento.index', compact('datos'));
    }else{
        return redirect('/');
    }

    }

    public function buscar(Request $request)
    {
        try{
    $query = Mantenimiento::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('filtro_nombre')) {
        $filtro_nombre = $request->input('filtro_nombre');
        $query->where('identificacion', 'like', "%$filtro_nombre%");
    }

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('mantenimiento.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }


    public function create()
    {
        try {
            if (session()->has('user')) {
                $datos = [
                    'Vehiculo'=>Vehiculo::all(),
                    'Personal'=>Personal::all(),
                    'Tipomantenimento'=>Tipomantenimento::all(),
                    'Solicitudmantenimineto'=>Solicitudmantenimineto::all(),
                    ];
        return view('mantenimiento.create', compact('datos'));
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }


    }

    public function orden($id)
    {
       
        try {
            if (session()->has('user')) {
              
                $datos= Mantenimiento::findOrFail($id);
      $depen =Mantenimiento::with('Vehiculo','Personal','Tipomantenimento','Solicitudmantenimineto')
        ->has('Vehiculo')->has('Personal')->has('Tipomantenimento')->has('Solicitudmantenimineto')->findOrFail($id);

        $matriz = compact('depen', 'datos');
        return view('mantenimiento.orden', compact('matriz'));
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }


    }
    public function store(Request $request){
        try {
            if (session()->has('user')) {
       if( Mantenimiento::create($request->all())){
        return   redirect()->back()->with('error', 'Creado con exito');
       }

       return   redirect()->back()->with('error', 'Error al Crear');
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }
// esta funcion llama a la vista editar
    public function edit($id)
    {
        try {
            if (session()->has('user')) {
        $depen= Mantenimiento::findOrFail($id);
        $datos = [
            'Vehiculo'=>Vehiculo::all(),
            'Personal'=>Personal::all(),
            'Tipomantenimento'=>Tipomantenimento::all(),
            'Solicitudmantenimineto'=>Solicitudmantenimineto::all(),
            ];
        $matriz = compact('depen', 'datos');
        return view('mantenimiento.edit', compact('matriz'));
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

// esta funcion actualiza los datos en la base d
    public function update(Request $request, $id)
    {
        try {
            if (session()->has('user')) {
        $dato = Mantenimiento::findOrFail($id);
        if($dato->update($request->all())){
            return   redirect()->back()->with('error', 'Actualizado con exito');
        }
        return   redirect()->back()->with('error', 'Error al Actualizar');
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

// esta funcion elimina datos de la tabla
    public function destroy($id)
    {
        try {
            if (session()->has('user')) {
        $dato = Mantenimiento::findOrFail($id);
        $dato->delete();
        return redirect()->route('mantenimiento.index');
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

}

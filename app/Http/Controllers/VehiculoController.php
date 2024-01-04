<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use Exception;
use App\Models\Subcircuito ;
use App\Models\Circuito;
use App\Models\Parroquia;
use App\Models\Distrito ;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use App\Models\Dependencia;
class VehiculoController extends Controller
{
    public function index()
    {

            if (session()->has('user')) {

        $datos =DB::table('vehiculos')
        ->join('dependencias', 'vehiculos.id_dependencia', '=', 'dependencias.id')
        ->join('usuarios', 'vehiculos.id_usuario', '=', 'usuarios.id')
        ->leftJoin('subcircuitos', 'dependencias.id_subcircuito', '=', 'subcircuitos.id')
        ->select(
            'vehiculos.*',
            'dependencias.provincia as provincia',
            'usuarios.nombre_apellido as nombre_apellido',
            'usuarios.id as id',
            'subcircuitos.nombre_subcircuito as nombre_subcircuito'
        )
        ->latest()
        ->paginate(10);
        return view('vehiculos.index', compact('datos'));
    }else{
        return redirect('/');
    }

    }
    public function buscar(Request $request)
    {
        try {
   // $query = Vehiculo::query();
   if ($request->has('filtro_nombre')) {
    $filtro_nombre = $request->input('filtro_nombre');
   $query = DB::table('vehiculos')
    ->where('placa', 'like', "%$filtro_nombre%")
    ->join('dependencias', 'vehiculos.id_dependencia', '=', 'dependencias.id')
    ->join('usuarios', 'vehiculos.id_usuario', '=', 'usuarios.id')
    ->leftJoin('subcircuitos', 'dependencias.id_subcircuito', '=', 'subcircuitos.id')
    ->select(
        'vehiculos.*',
        'dependencias.provincia as provincia',
        'usuarios.nombre_apellido as nombre_apellido',
        'usuarios.id as id',
        'subcircuitos.nombre_subcircuito as nombre_subcircuito'
    );
}
    // Aplica los filtros de búsqueda si se proporcionan
   /* if ($request->has('filtro_nombre')) {
        $filtro_nombre = $request->input('filtro_nombre');
        $query->where('placa', 'like', "%$filtro_nombre%");
    }*/

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('vehiculos.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }

    public function create()
    {
        try {
            if (session()->has('user')) {
                $datos =Dependencia::with('Subcircuito')
                  ->has('Subcircuito')
                    ->latest()
                    ->paginate(10000);
        return view('vehiculos.create', compact('datos'));

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
       if( Vehiculo::create($request->all())){
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


        $depen = Vehiculo::findOrFail($id);
        $recoor =Dependencia::with('Subcircuito')
                  ->has('Subcircuito')->findOrFail($depen->id_dependencia);
        $datos =Dependencia::with('Subcircuito')
                  ->has('Subcircuito')
                    ->latest()
                    ->paginate(10000);

        $matriz = compact('depen', 'datos','recoor');
return view('vehiculos.edit', compact('matriz'));

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
        $dato = Vehiculo::findOrFail($id);
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
        $dato = Vehiculo::findOrFail($id);
        $dato->delete();
        return redirect()->route('vehiculos.index');
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

}

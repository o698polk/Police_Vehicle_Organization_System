<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
use Exception;
use App\Models\Personal ;
use App\Models\Subcircuito ;
use App\Models\Circuito;
use App\Models\Parroquia;
use App\Models\Distrito ;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use App\Models\Dependencia;
class PersonalController extends Controller
{
    public function index()
    {

            if (session()->has('user')) {

        $datos =DB::table('personals')
        ->join('dependencias', 'personals.id_dependencia', '=', 'dependencias.id')
        ->join('usuarios', 'personals.id_usuario', '=', 'usuarios.id')
        ->join('vehiculos', 'personals.id_vehiculos', '=', 'vehiculos.id')
        ->leftJoin('subcircuitos', 'dependencias.id_subcircuito', '=', 'subcircuitos.id')
        ->select(
            'personals.*',
            'dependencias.provincia as provincia',
            'usuarios.nombre_apellido as nombre_apellidou',
            'usuarios.id as id',
            'vehiculos.tipo_vehiculo as tipo_vehiculo',
            'vehiculos.placa as placa',
            'subcircuitos.nombre_subcircuito as nombre_subcircuito'
        )
        ->latest()
        ->paginate(10);
        return view('personals.index', compact('datos'));
    }else{
        return redirect('/');
    }

    }
    public function buscar(Request $request)
    {
        try {
   // $query = Personal::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('filtro_nombre')) {

        $filtro_nombre = $request->input('filtro_nombre');
        $query =DB::table('personals')
        ->where('identificacion', 'like', "%$filtro_nombre%")
        ->join('dependencias', 'personals.id_dependencia', '=', 'dependencias.id')
        ->join('usuarios', 'personals.id_usuario', '=', 'usuarios.id')
        ->join('vehiculos', 'personals.id_vehiculos', '=', 'vehiculos.id')
        ->leftJoin('subcircuitos', 'dependencias.id_subcircuito', '=', 'subcircuitos.id')
        ->select(
            'personals.*',
            'dependencias.provincia as provincia',
            'usuarios.nombre_apellido as nombre_apellidou',
            'usuarios.id as id',
            'vehiculos.tipo_vehiculo as tipo_vehiculo',
            'vehiculos.placa as placa',
            'subcircuitos.nombre_subcircuito as nombre_subcircuito'
        );
       // $query->where('identificacion', 'like', "%$filtro_nombre%");
    }

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('personals.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }

    public function create()
    {
        try {
            if (session()->has('user')) {
                $depen = Vehiculo::all();
                $datos =Dependencia::with('Subcircuito')
                  ->has('Subcircuito')
                    ->latest()
                    ->paginate(10000);

                    $matriz = compact('depen', 'datos');
                    return view('personals.create', compact('matriz'));


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
       if( Personal::create($request->all())){
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


        $depen = Personal::findOrFail($id);
        $vehiculos =Vehiculo::all();

        $recoor =Dependencia::with('Subcircuito')
                  ->has('Subcircuito')->findOrFail($depen->id_dependencia);
        $datos =Dependencia::with('Subcircuito')
                  ->has('Subcircuito')
                    ->latest()
                    ->paginate(10000);

        $matriz = compact('depen','datos','recoor','vehiculos');
return view('personals.edit', compact('matriz'));

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
        $dato = Personal::findOrFail($id);
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
        $dato = Personal::findOrFail($id);
        $dato->delete();
        return redirect()->route('personals.index');
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }
}

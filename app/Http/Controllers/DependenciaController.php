<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;
use App\Models\Circuito ;
use App\Models\Distrito ;
use App\Models\Subcircuito;
use App\Models\Usuario;
use App\Models\Parroquia;
use Illuminate\Http\Request;
use Exception;
class DependenciaController extends Controller
{

    public function index()
    {
        try {
            if (session()->has('user')) {
                $datos = Dependencia::with('Distrito','Parroquia','Circuito','Subcircuito','Usuario')
                ->has('Distrito')
                ->has('Parroquia')
                ->has('Circuito')
                ->has('Usuario')
                ->latest()
                ->has('Subcircuito')->paginate(10);
        return view('dependencias.index', compact('datos'));
    }else{
        return redirect('/');
    }
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
    }
    public function slectparroquia(Request $request){
        $id=$request->input('id_distrito');

       $comments = Parroquia::where('id_distrito', $id)->get();

       return response()->json($comments);
   }
   public function slectcircuito(Request $request){
    $id=$request->input('id_parroquia');

   $comments = Circuito::where('id_parroquia', $id)->get();

   return response()->json($comments);
}
public function slectsupcircuito(Request $request){
    $id=$request->input('id_circuito');

   $comments = Subcircuito::where('id_circuito', $id)->get();

   return response()->json($comments);
}
    public function buscar(Request $request)
    {
        try{
    $query = Dependencia::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('filtro_nombre')) {
        $filtro_nombre = $request->input('filtro_nombre');
        $query->where('id', 'like', "%$filtro_nombre%");
    }

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('dependencias.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }

    public function create()
    {
        try {
            if (session()->has('user')) {

        $datos = [
            'Distrito'=>Distrito::all(),
            'Parroquia'=>Parroquia::all(),
            'Circuito'=>Circuito::all(),
            'Subcircuito'=>Subcircuito::all(),
            ];
        return view('dependencias.create', compact('datos'));
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
       if(Dependencia::create($request->all())){
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
                $depen = Dependencia::findOrFail($id);
                $datos = [
                    'Distrito' => Distrito::all(),
                    'Parroquia'=>Parroquia::all(),
                    'Circuito' => Circuito::all(),
                    'Subcircuito' => Subcircuito::all(),
                ];
                $matriz = compact('depen', 'datos');
                return view('dependencias.edit', compact('matriz'));
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al cargar');
        }
    }
// esta funcion actualiza los datos en la base d
    public function update(Request $request, $id)
    {
        try {
            if (session()->has('user')) {
        $dato = Dependencia::findOrFail($id);
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
        $dato = Dependencia::findOrFail($id);
        $dato->delete();
        return redirect()->route('dependencias.index');
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }
}

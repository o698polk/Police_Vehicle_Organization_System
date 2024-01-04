<?php

namespace App\Http\Controllers;
use App\Models\Parroquia;
use App\Models\Distrito ;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Circuito;
use Exception;
class ParroquiaController extends Controller
{
    public function index()
    {
        try{
            if (session()->has('user')) {

        $datos = Parroquia::with('Distrito','Usuario')
        ->has('Distrito')
        ->latest()
        ->has('Usuario')->paginate(10);

        return view('parroquias.index', compact('datos'));
    }else{
        return redirect('/');
    }
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
    }


    public function selectdatos(Request $request){
         $id=$request->input('idfore');

        $comments = Circuito::where('id_parroquia', $id)->get();

        return response()->json($comments);
    }

    public function buscar(Request $request)
    {
        try{
    $query = Parroquia::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('filtro_nombre')) {
        $filtro_nombre = $request->input('filtro_nombre');
        $query->where('nombre_parroquia', 'like', "%$filtro_nombre%");
    }

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('parroquias.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }


    public function create()
    {
        try {
            if (session()->has('user')) {
                $datos = [
                    'Distrito'=>Distrito::all()
                    ];
                return view('parroquias.create', compact('datos'));
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
       if( Parroquia::create($request->all())){
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

                $depen = Parroquia::findOrFail($id);
                $datos = [
                    'Distrito' => Distrito::all(),
                ];
                $matriz = compact('depen', 'datos');
        return view('parroquias.edit', compact('matriz'));
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
        $dato = Parroquia::findOrFail($id);
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
        $dato =  Parroquia::findOrFail($id);
        $dato->delete();
        return redirect()->route('parroquias.index');
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

}

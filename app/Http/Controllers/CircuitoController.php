<?php

namespace App\Http\Controllers;
use App\Models\Circuito;
use App\Models\Parroquia;
use App\Models\Distrito ;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Exception;


class CircuitoController extends Controller
{
    public function index()
    {
        try {
            if (session()->has('user')) {

        $datos = Circuito::with('Parroquia','Usuario')
        ->has('Parroquia')
        ->latest()
        ->has('Usuario')->paginate(10);
        return view('circuitos.index', compact('datos'));
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

    public function buscar(Request $request)
    {
        try{
    $query = Circuito::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('filtro_nombre')) {
        $filtro_nombre = $request->input('filtro_nombre');
        $query->where('codigo_circuito', 'like', "%$filtro_nombre%");
    }

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('circuitos.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }


    public function create()
    {
        try {
            if (session()->has('user')) {
                $datos = [
                    'Parroquia'=>Parroquia::all()
                    ];
        return view('circuitos.create', compact('datos'));
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
       if( Circuito::create($request->all())){
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
                $depen = Circuito::findOrFail($id);
                $datos = [
                    'Parroquia' => Parroquia::all(),
                ];
                $matriz = compact('depen', 'datos');
        return view('circuitos.edit', compact('matriz'));
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
        $dato = Circuito::findOrFail($id);
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
        $dato =  Circuito::findOrFail($id);
        $dato->delete();
        return redirect()->route('circuitos.index');
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

}

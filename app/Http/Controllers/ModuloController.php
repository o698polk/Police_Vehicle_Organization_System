<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Role;
use Illuminate\Http\Request;
use Exception;

class ModuloController extends Controller
{
    public function index()
    {

        try{
            if (session()->has('user')) {
                $datos = Modulo::with('Role')
                ->has('Role')
                ->latest()
                ->paginate(10);
        return view('modulos.index', compact('datos'));
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
    $query = Modulo::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('filtro_nombre')) {
        $filtro_nombre = $request->input('filtro_nombre');
        $query->where('nombre_modulos', 'like', "%$filtro_nombre%");
    }

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('modulos.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }

    public function create()
    {
        try {
            if (session()->has('user')) {

                $datos = [
                    'Role'=> Role::all()
                    ];
        return view('modulos.create',compact('datos'));
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
       if( Modulo::create($request->all())){
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

        $depen =  Modulo::findOrFail($id);
        $datos = [
            'Role' =>  Role::all(),
        ];
        $matriz = compact('depen', 'datos');
        return view('modulos.edit', compact('matriz'));

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
        $dato = Modulo::findOrFail($id);
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
        $dato =  Modulo::findOrFail($id);
        $dato->delete();
        return redirect()->route('modulos.index');
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

}

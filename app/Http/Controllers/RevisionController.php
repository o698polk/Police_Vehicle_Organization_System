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
use App\Models\Solicitudmantenimineto;
use App\Models\Tipomantenimento;
use App\Models\Revisione ;
class RevisionController extends Controller
{
    public function index()
    {

            if (session()->has('user')) {

                $datos =Revisione::with('Vehiculo','Usuario')
                ->has('Vehiculo')
                ->latest()
                ->has('Usuario')->paginate(10);
        return view('revsion.index', compact('datos'));

    }else{
        return redirect('/');
    }

    }

    public function buscar(Request $request)
    {
        try{
    $query = Revision::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('filtro_nombre')) {
        $filtro_nombre = $request->input('filtro_nombre');
        $query->where('id_vehiculos', 'like', "%$filtro_nombre%");
    }

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('revsion.index', compact('datos'));
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
                   
                    ];
        return view('revsion.create', compact('datos'));
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
                $pago_matricula = $request->input('pago_matricula');
                $págo_rodaje = $request->input('págo_rodaje');
                $no_deuda_gad = $request->input('no_deuda_gad');
                $recomendaciones = $request->input('recomendaciones');
                $detalles = $request->input('detalles');
                $id_user = $request->input('id_usuario');
                $id_vehiculos = $request->input('id_vehiculos');

                
                $ruta ="";
                if ($request->has('copia_cedula')) {
                    $archivo=  $request->file('copia_cedula');
            
                        $nombreArchivo = uniqid() . '.' . $archivo->getClientOriginalExtension();
                        $ruta = 'public/file/'.session('user')->correo.'/'.date("Ymd").'/'.$archivo->getClientOriginalExtension().'/' . $nombreArchivo;
            
                       
                       // return $archivo->getClientOriginalExtension();
                        $archivo->storeAs('public/file/'.session('user')->correo.'/'.date("Ymd").'/'.$archivo->getClientOriginalExtension().'/', $nombreArchivo);
            
                       
                    
                }
               

                $filedata= new Revisione();
                $filedata->pago_matricula= $pago_matricula;
                $filedata->págo_rodaje= $págo_rodaje;
                $filedata->no_deuda_gad= $no_deuda_gad;
                $filedata->copia_cedula=  $ruta;
                $filedata->detalle= $detalles;
                $filedata->recomendaciones = $recomendaciones;
                $filedata->id_vehiculos= $id_user;
                $filedata->id_usuario= $id_vehiculos;
               
               if( $filedata->save()){
                return   redirect()->back()->with('error', 'Creado con exito');
               }else{
                return   redirect()->back()->with('error', 'Error al Crear');
               }



      
        
       

       
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar'.$e);
        }
    }
// esta funcion llama a la vista editar
    public function edit($id)
    {
        try {
            if (session()->has('user')) {
        $depen= Revision::findOrFail($id);
        $datos = [
            'Vehiculo'=>Vehiculo::all(),
            ];
        $matriz = compact('depen', 'datos');
        return view('revsion.edit', compact('matriz'));
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
        $dato = Revision::findOrFail($id);
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
        $dato = Revision::findOrFail($id);
        $dato->delete();
        return redirect()->route('revsion.index');
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }
}

<?php

namespace App\Http\Controllers;



use App\Models\Circuito;
use App\Models\Subcircuito;
use App\Models\Reporte;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class Reportes_eventosController extends Controller
{


    public function index()
    {

        if (session()->has('user')) {
            $datos = Reporte::with('Circuito', 'Subcircuito')
                ->has('Circuito')
                ->latest()
                ->has('Subcircuito')->paginate(10);
            return view('reporte_eventos.index', compact('datos'));
        } else {
            return redirect('/');
        }
    }


    public function reportes(Request $request)
    {
        if (session()->has('user')) {
            $fechaInicial = $request->input('fecha_inicial');
            $fechaFinal = $request->input('fecha_final');
            if (empty($fechaInicial)) {
                $fechaInicial = '2023-07-01 00:00:00';
            }
            if (empty($fechaFinal)) {
                $fechaFinal = '2023-07-31 23:59:59';
            }

            $registros = Reporte::with('Circuito', 'Subcircuito')
                ->has('Circuito')
                ->has('Subcircuito')
                ->where('created_at', '>=', $fechaInicial)
                ->where('created_at', '<=', $fechaFinal)
                ->groupBy('tipo', 'id_circuito', 'id_subcircuito')
                ->select('tipo', 'id_circuito', 'id_subcircuito', DB::raw('count(*) as total'))
                ->get();
            return view('reporte_eventos.reportes', compact('registros', 'fechaInicial', 'fechaFinal'));
        } else {
            return redirect('/');
        }
    }
    public function buscar(Request $request)
    {
        try {
            $query = Reporte::query();

            // Aplica los filtros de búsqueda si se proporcionan
            if ($request->has('filtro_nombre')) {
                $filtro_nombre = $request->input('filtro_nombre');
                $query->where('nombres', 'like', "%$filtro_nombre%");
            }

            // Continúa agregando más filtros si es necesario

            $datos = $query->latest()->paginate(10);

            return view('reporte_eventos.index', compact('datos'));
        } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }
    public function create()
    {
        try {
            if (session()->has('user')) {

                $datos = [
                    'Circuito' => Circuito::all(),
                    'Subcircuito' => Subcircuito::all(),
                ];
                return view('reporte_eventos.create', compact('datos'));
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

    public function generarreportes()
    {
        try {
            $datos = [
                'Circuito' => Circuito::all(),
                'Subcircuito' => Subcircuito::all(),
            ];
            return view('reporte_eventos.reportar', compact('datos'));
        } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }


    public function store(Request $request)
    {
        try {

            if (Reporte::create($request->all())) {
                return   redirect()->back()->with('error', 'Creado con exito');
            }

            return   redirect()->back()->with('error', 'Error al Crear');
        } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }
    // esta funcion llama a la vista editar

    public function edit($id)
    {
        try {
            if (session()->has('user')) {
                $depen = Reporte::findOrFail($id);
                $datos = [
                    'Circuito' => Circuito::all(),
                    'Subcircuito' => Subcircuito::all(),
                ];
                $matriz = compact('depen', 'datos');
                return view('reporte_eventos.edit', compact('matriz'));
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
                $dato = Reporte::findOrFail($id);
                if ($dato->update($request->all())) {
                    return   redirect()->back()->with('error', 'Actualizado con exito');
                }
                return   redirect()->back()->with('error', 'Error al Actualizar');
            } else {
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
                $dato = Reporte::findOrFail($id);
                $dato->delete();
                return redirect()->route('reporte_eventos.index');
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }
}

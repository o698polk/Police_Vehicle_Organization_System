<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use App\Models\Role;
use App\Models\Modulo;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\HelpFuntionController;
class UsuarioController extends Controller
{

    public function Index()
    {
         try {
            if (session()->has('user')) {
                $datos = Usuario::with('Role',)
                ->has('Role')
                ->latest()
                ->paginate(10);
                return view('usuarios.index', compact('datos'));

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
    $query = Usuario::query();

    // Aplica los filtros de búsqueda si se proporcionan
    if ($request->has('filtro_nombre')) {
        $filtro_nombre = $request->input('filtro_nombre');
        $query->where('nombre_apellido', 'like', "%$filtro_nombre%");
    }

    // Continúa agregando más filtros si es necesario

    $datos = $query->latest()->paginate(10);

    return view('usuarios.index', compact('datos'));
} catch (Exception $e) {
    return   redirect()->back()->with('error', 'Error al Cargar');
    }
   }
    public  function Sessionstar(){
        if (session()->has('user')) {
            return redirect('/');
        }
    }
  // Esta funcion llama a la vista crear usuarios

// esta funcion llama a la creacion de un registro nuevo desde la seccion de registrar usuarios
    public function Registrar_usuario(Request $request){
        try {

            $user = new Usuario();
            $user->nombre_apellido =$request->input('nombre_apellido');
            $user->correo =$request->input('correo');
            $user->usuario =$request->input('usuario');
            $user->id_roles =$request->input('id_roles');
            $user->clave = Hash::make($request->input('clave'));

            if ($user->save()) {
                return redirect()->back()->with('error', 'Creado con éxito');
            }

        return   redirect()->back()->with('error', 'Error al Crear');
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar '.$e);
         }
    }
    public function Login(Request $request)
    {
        try {
        $correo = $request->input('correo');
        $clave = $request->input('clave');

        // Busca el usuario en la base de datos
        $user = Usuario::where('correo', $correo)->first();

        // Verifica si se encontró un usuario y si la contraseña es correcta

       if ($user && Hash::check($clave, $user->clave)) {

          // Inicia la sesión para el usuario
session(['user' => $user]);

// Obtiene los roles del usuario y los almacena en la sesión
$roles = Role::findOrFail($user->id_roles);
session(['roles' => $roles]);

// Obtiene los módulos asociados a los roles del usuario y los almacena en la sesión
$modelos = Modulo::where('id_roles', $user->id_roles)->get();
session(['modulos' => $modelos]);

// Redirecciona a la página de inicio después del inicio de sesión exitoso
return redirect()->route('dashboard');
        }
        // Si las credenciales son inválidas, redirecciona de vuelta al formulario de inicio de sesión con un mensaje de error
        return redirect()->back()->with('error', 'Credenciales inválidas');
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
        return view('usuarios.create',compact('datos'));

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
            $user = new Usuario();
            $user->nombre_apellido =$request->input('nombre_apellido');
            $user->correo =$request->input('correo');
            $user->usuario =$request->input('usuario');
            $user->id_roles =$request->input('id_roles');
            $user->clave = Hash::make($request->input('clave'));

            if ($user->save()) {
                return redirect()->back()->with('error', 'Creado con éxito');
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


        $depen =  Usuario::findOrFail($id);
        $datos = [
            'Role' =>  Role::all(),
        ];
        $matriz = compact('depen', 'datos');
        return view('usuarios.edit', compact('matriz'));
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
        $user =Usuario::findOrFail($id);
        $user->nombre_apellido =$request->input('nombre_apellido');
        $user->correo =$request->input('correo');
        $user->usuario =$request->input('usuario');
        $user->id_roles =$request->input('id_roles');
        $clave=$request->input('clave');
        if($clave ==$user->clave){
            $user->clave = $request->input('clave');
            if($user->save()){
                return   redirect()->back()->with('error', 'Actualizado con exito, Clave no editada');
            }
        }else{
            $user->clave = Hash::make($request->input('clave'));
            if($user->save()){
                return   redirect()->back()->with('error', 'Actualizado con exito Clave editada');
            }
        }

        if($user->save()){
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
        $dato = Usuario::findOrFail($id);
        $dato->delete();
        return redirect()->route('usuarios.index');
    }else{
        return redirect('/');
    }
    } catch (Exception $e) {
        return   redirect()->back()->with('error', 'Error al Cargar');
        }
    }

    // login
// esta funcion realiza una verificacion y un login





}

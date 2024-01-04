<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Role;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //Home trabajara solo con las rutas get genenerales del sistema

    // la ruta index muestra el incio de la pagina
    public function Index(){return view('extens.home');}

    // la ruta registros muetra el formulario para registrar usuarios
    public function Register(){
        $datos = [
            'Rol'=> Role::all()
            ];
        return view('extens.register',compact('datos'));
     }
    // muestra la pagina de inicio de sesion
    public function Login()
    {
        if (!session()->has('user')) {
            return view('extens.login');
        } else {
            return redirect('home');
        }
    }
// muestra el panel de control
    public function Dashboard()
    {
        if (session()->has('user')) {
            $user = session('user');
            $modulo = session('modulos');
            $role = session('roles');
            //  return view('prueba', compact('user'));
            if ($user->__get('id_roles') >= 0) {

                $datos = Usuario::all();
                $datos = [
                    'Role'=>  $role,
                    'Modulo'=> $modulo ,
                    'Usuario'=>  $user
                    ];
                return view('extens.dashboard', compact('datos'));
            } else {
                return redirect('home');
            }
        } else {
            return redirect('login');
        }
    }

    // funcionpara salir del login inciado
    public function Salir()
    {
        session()->forget('user');
        session()->flush();
        return redirect('/');
    }
// funcion para mostrat el modulo de usuarios

// llamar al frmularios de usuarios para crear




}


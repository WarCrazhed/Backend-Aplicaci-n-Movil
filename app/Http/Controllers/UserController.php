<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {
        //dd($request);

        if($request->email == NULL || $request->password == NULL )
        {
            die('[{ "msg" : "No se admiten campos vacios" }]');
        }

        //$allUsers = Usuarios::all();
        //die($allUsers);
        $user = Usuarios::where('email', $request->email)->first();
        //die($user);

        if (!$user)
        {
            die('{ "msg" : "Correo NO Existe, Verifique e Intente de Nuevo" }');
        }

        $verify = password_verify($request->password, $user->password);
        if(!$verify)
        {
            die('{ "msg" : "Contraseña o Correo NO Validos, Verifique e Intente de Nuevo" }');
        }

        $verify = password_verify($request->password, $user->password);
        if(!$verify)
        {
            die('{ "msg" : "Contraseña o Correo NO Validos, Verifique e Intente de Nuevo" }');
        }

        if($user->confirmado == 0)
        {
            die('{ "msg" : "El usuario no existe o no esta confirmado" }');
        }

        die($user);
    }

    public function getUsers(Request $request) {
        $usuarios = Usuarios::where('nombre', 'LIKE', '%' . $request->usuario . '%')->get()->toJson();
        die($usuarios);
    }

    public function editarUsuario(Request $request)
    {
        Usuarios::where('id', $request->id)
                                ->update([
                                    'nombre' => $request->nombre,
                                    'apellido' => $request->sucursal,
                                    'email' => $request->domicilio
                                ]);

        $usuario = Usuarios::where('id', $request->id)->first()->toJson();

        die($usuario);
    }

    public function eliminarUsuario(Request $request)
    {
        Usuarios::where('id', $request->id)->delete();

        die('{ "msg" : "Usuario Eliminado" }');
    }
}

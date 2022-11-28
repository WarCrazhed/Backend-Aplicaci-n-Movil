<?php

namespace App\Http\Controllers;

use App\Models\Invitaciones;
use Illuminate\Http\Request;

class InvitacionController extends Controller
{
    public function codigo()
    {
        $codigo = $this->secure_random_string(5);

        die(strtoupper($codigo));
    }

    public static function secure_random_string(int $length): string
    {
        $random_string = '';

        for ($i = 0; $i < $length; $i++) {
            $number = random_int(0, 36);
            $character = base_convert($number, 10, 36);
            $random_string .= $character;
        }

        return $random_string;
    }

    public function invitar(Request $request)
    {
        $codigo = $this->secure_random_string(5);
        $invitar = Invitaciones::Create([
            'evento_id' => $request->evento_id,
            'usuario_id' => $request->usuario_id,
            'codacc' => (trim(strtoupper($codigo))),
            'status' => 0
        ]);

        die('[{ "msg" : "¡Invitación Registrada!" }]');
    }

    public function getInvitaciones(Request $request)
    {
        $invitaciones = Invitaciones::where('invitaciones.usuario_id', $request->id)
        ->where('invitaciones.status',0)
        ->join('usuarios','usuarios.id','=','invitaciones.usuario_id')
        ->join('eventos','eventos.id','=','invitaciones.evento_id')
        ->join('dias','dias.id','=','eventos.dia_id')
        ->join('horas','horas.id','=','eventos.hora_id')
        ->join('categorias','categorias.id','=','eventos.categoria_id')
        ->join('restaurantes','restaurantes.id','=','eventos.restaurante_id')
        ->where('eventos.nombre', 'LIKE', '%' . $request->evento . '%')
        ->select('invitaciones.id', 'eventos.nombre as evento', 'invitaciones.codacc', 'invitaciones.status','dias.nombre as dia', 'horas.hora', 'categorias.nombre as categoria', 'restaurantes.nombre as restaurant', 'restaurantes.domicilio')
        ->selectRaw("CONCAT(usuarios.nombre, ' ',usuarios.apellido) as nombre")
        ->get()->toJson();
        die($invitaciones);
        //echo ($invitaciones->count());
    }
    public function getInvitacionesAdmin(Request $request)
    {
        $invitaciones = Invitaciones::where('invitaciones.status',0)
        ->where('evento_id', $request->id)
        ->join('usuarios','usuarios.id','=','invitaciones.usuario_id')
        ->join('eventos','eventos.id','=','invitaciones.evento_id')
        ->join('dias','dias.id','=','eventos.dia_id')
        ->join('horas','horas.id','=','eventos.hora_id')
        ->join('categorias','categorias.id','=','eventos.categoria_id')
        ->join('restaurantes','restaurantes.id','=','eventos.restaurante_id')
        ->where('usuarios.nombre', 'LIKE', '%' . $request->usuario . '%')
        ->select('invitaciones.id', 'eventos.nombre as evento', 'invitaciones.codacc', 'invitaciones.status','dias.nombre as dia', 'horas.hora', 'categorias.nombre as categoria', 'restaurantes.nombre as restaurant', 'restaurantes.domicilio')
        ->selectRaw("CONCAT(usuarios.nombre, ' ',usuarios.apellido) as nombre")
        ->get()->toJson();
        die($invitaciones);
        //echo ($invitaciones->count());
    }

    public function ingresar(Request $request)
    {
        $invitaciones = Invitaciones::where('id', $request->id)
        ->first();

        if($invitaciones->codacc == trim(strtoupper($request->codacc)))
        {
            Invitaciones::where('id', $request->id)
                                ->update([
                                    'status' => 1
                                ]);
            die('{ "msg" : "¡Invitación Registrada!" }');
        } else {
            die('{ "msg" : "Error, el código no es valido" }');
        }

    }
}

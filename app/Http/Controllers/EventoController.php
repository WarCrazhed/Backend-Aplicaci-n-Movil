<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function eventos(Request $request)
    {
        $eventos = Eventos::where('eventos.nombre', 'LIKE', '%' . $request->evento . '%')
        ->join('categorias','categorias.id','=','eventos.categoria_id')
        ->join('dias','dias.id','=','eventos.dia_id')
        ->join('horas','horas.id','=','eventos.hora_id')
        ->join('restaurantes','restaurantes.id','=','eventos.restaurante_id')
        ->select('eventos.id','eventos.nombre as nombre','categorias.nombre as categoria','dias.nombre as dia','horas.hora as hora','restaurantes.nombre as restaurante', 'eventos.disponibles','eventos.descripcion')
        ->get()->toJson();
        die($eventos);
    }
}

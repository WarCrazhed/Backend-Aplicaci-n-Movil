<?php

namespace App\Http\Controllers;

use App\Models\Restaurantes;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    public function restaurantes(Request $request)
    {
        $restaurantes = Restaurantes::where('nombre', 'LIKE', '%' . $request->restaurant . '%')->get()->toJson();
        die($restaurantes);
    }

    public function editarRestaurante(Request $request)
    {

        Restaurantes::where('id', $request->id)
                                ->update([
                                    'nombre' => $request->nombre,
                                    'sucursal' => $request->sucursal,
                                    'domicilio' => $request->domicilio
                                ]);

        $restaurant = Restaurantes::where('id', $request->id)->first()->toJson();

        die($restaurant);
    }

    public function eliminarRestaurante(Request $request)
    {
        Restaurantes::where('id', $request->id)->delete();

        die('{ "msg" : "Restaurante Eliminado" }');
    }
}

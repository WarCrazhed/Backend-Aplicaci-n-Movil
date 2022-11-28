<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurantes extends Model
{
    use HasFactory;
    protected $table = 'Restaurantes';

    protected $fillable = [
        'nombre', 'sucursal', 'domicilio', 'imagen', 'tags', 'redes',
    ];
    public $timestamps = false;
}

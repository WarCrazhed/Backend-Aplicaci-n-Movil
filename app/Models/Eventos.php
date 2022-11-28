<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    use HasFactory;

    protected $table = 'Eventos';

    protected $fillable = [
        'nombre', 'descripcion', 'disponibles', 'categoria_id', 'dia_id', 'hora_id', 'restaurante_id'
    ];
    public $timestamps = false;
}

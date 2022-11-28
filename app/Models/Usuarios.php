<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = 'Usuarios';

    protected $fillable = [
        'nombre', 'apellido', 'email', 'password', 'confirmado', 'token', 'admin',
    ];
    public $timestamps = false;
}

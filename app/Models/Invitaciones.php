<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitaciones extends Model
{
    use HasFactory;

    protected $table = 'invitaciones';

    protected $fillable = [
        'id', 'evento_id', 'usuario_id', 'codacc', 'status'
    ];
    public $timestamps = false;
}

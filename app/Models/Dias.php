<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dias extends Model
{
    use HasFactory;

    protected $table = 'dias';

    protected $fillable = [
        'nombre'
    ];
    public $timestamps = false;
}

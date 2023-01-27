<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votantes extends Model
{

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'cedula',
        'imagen',
        'puesto_id',
        'lider_id'
    ];
    use HasFactory;
}

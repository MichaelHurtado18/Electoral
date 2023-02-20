<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lideres extends Model
{

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'cedula',
        'imagen',
        'puesto_id'
    ];


    public function votante()
    {
        return $this->hasMany(Votantes::class, 'lider_id');
    }
    public function puesto()
    {
        return $this->belongsTo(Puestos::class);
    }

    use HasFactory;
}

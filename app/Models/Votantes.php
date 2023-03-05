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
        'mesa',
        'lider_id',
        'img_id'
    ];


    protected $hidden = ['created_at', 'updated_at'];
    public function lider()
    {
        return $this->belongsTo(Lideres::class);
    }

    public function puesto()
    {
        return $this->belongsTo(Puestos::class);
    }



    use HasFactory;
}

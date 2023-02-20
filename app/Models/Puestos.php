<?php

namespace App\Models;

use App\Models\Lideres;
use App\Models\Votantes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Puestos extends Model
{

    protected $fillable = [
        'nombre'
    ];

    public function votantes()
    {
        return $this->hasMany(Votantes::class, 'puesto_id');
    }
    public function lideres()
    {
        return $this->hasMany(Lideres::class, 'puesto_id');
    }
    use HasFactory;
}

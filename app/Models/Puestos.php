<?php

namespace App\Models;

use App\Models\Votantes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Puestos extends Model
{


    public function votantes()
    {
        return $this->hasMany(Votantes::class, 'puesto_id');
    }
    use HasFactory;
}

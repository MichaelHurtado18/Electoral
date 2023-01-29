<?php

namespace App\Http\Controllers;

use App\Models\Puestos;
use App\Models\Votantes;
use Illuminate\Http\Request;
use App\Http\Resources\Puesto;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PuestoCollection;
use App\Http\Resources\VotantesResource;

class VotantesController extends Controller
{
    //

    public function index()
    {

        return view('votantes.index');
    }

    public function create()
    {

        return view('votantes.create');
    }
    public function edit(Votantes $votante)
    {
        return view('votantes.edit', ["votante" => $votante]);
    }
}

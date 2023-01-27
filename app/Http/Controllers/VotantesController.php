<?php

namespace App\Http\Controllers;

use App\Models\Votantes;
use Illuminate\Http\Request;

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

<?php

namespace App\Http\Controllers;

use App\Models\Puestos;
use App\Models\Votantes;
use Illuminate\Http\Request;
use App\Http\Resources\Puesto;
use App\Exports\VotantesExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
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

    public function show(Votantes $votante)
    {
        return view('votantes.show', ["votante" => $votante]);
    }
    public function edit(Votantes $votante)
    {
        return view('votantes.edit', ["votante" => $votante]);
    }

    public  function export()
    {
        return Excel::download(new VotantesExport, 'votantes.xls');
    }
}

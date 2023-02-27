<?php

namespace App\Http\Controllers;

use App\Models\Lideres;
use App\Models\Votantes;
use Illuminate\Http\Request;
use App\Exports\LideresExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VotantesLideresExport;

class LideresController extends Controller
{
    public function index()
    {
        return view('lideres.index');
    }

    public function create()
    {
        return view('lideres.create');
    }

    public function edit(Lideres $lider)
    {

        return view('lideres.edit', ['lider' => $lider]);
    }

    public function show(Lideres $lider)
    {
        return view('lideres.show', ["lider" => $lider]);
    }

    public function export(Lideres $lider)
    {
        return Excel::download(new LideresExport, 'lideres.xls');
    }
    public function showExport(Lideres $lider)
    {
        return Excel::download(new VotantesLideresExport($lider->id), 'votantes.xls');
    }
}

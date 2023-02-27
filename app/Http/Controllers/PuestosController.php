<?php

namespace App\Http\Controllers;

use App\Models\Puestos;
use Illuminate\Http\Request;
use App\Exports\PuestosExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\getCollection;
use App\Exports\VotantesPuestosExport;

class PuestosController extends Controller
{
    //

    public function index()
    {
        return view('puestos.index');
    }



    public function store(Request  $request)
    {
        Puestos::create([
            'nombre' => strtoupper($request->puesto)
        ]);
    }

    public function show(Puestos $puestos)
    {
        return view('puestos.show', ["puesto" => $puestos]);
    }

    public function export()
    {

        return Excel::download(new PuestosExport, 'puestos.xls');
    }


    public function showExport(Puestos $puestos)
    {

        return Excel::download(new VotantesPuestosExport($puestos->id), 'puestosvotantes.xls');
    }
}

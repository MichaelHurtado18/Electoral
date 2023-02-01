<?php

namespace App\Http\Controllers;

use App\Models\Puestos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\getCollection;

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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function getGrafica()
    {
        $puestos = DB::table('puestos')
            ->join('votantes', 'puestos.id', '=', 'votantes.puesto_id')
            ->select('puestos.nombre', DB::raw('COUNT(puestos.id) as total'))
            ->groupBy('puestos.id')
            ->get();

        return $puestos;
    }


    public function dashboard()
    {
        return view('dashboard');
    }
}

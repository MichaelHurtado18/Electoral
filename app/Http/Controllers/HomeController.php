<?php

namespace App\Http\Controllers;

use App\Models\Lideres;
use App\Models\Votantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function getGrafica()
    {
        $puestos = DB::table('puestos')
            ->join('votantes', 'puestos.id', '=', 'votantes.puesto_id')
            ->select('puestos.nombre', DB::raw('COUNT(puestos.id) as total'))
            ->groupBy('puestos.id', 'puestos.nombre ')
            ->get();

        return $puestos;
    }


    public function dashboard()
    {
        $totalVotantes = Votantes::all()->count();
        $totalLideres = Lideres::all()->count();
        return view('dashboard', ["totalVotantes" => $totalVotantes, "totalLideres" => $totalLideres]);
    }
}

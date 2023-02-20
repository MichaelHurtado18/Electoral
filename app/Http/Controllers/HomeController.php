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
        /*CREAMOS LA CONSULTA QUE DEVUELVE EL GRAFICO */
        $query =   DB::select("
         SELECT nombre, COUNT(puesto_id) as total FROM
          ( SELECT lideres.puesto_id as puesto_id FROM lideres  
                     UNION ALL 
         SELECT votantes.puesto_id as puesto_id FROM votantes )
          nueva_tabla INNER JOIN puestos ON nueva_tabla.puesto_id=puestos.id GROUP BY puesto.id;
          ");
        return $query;
    }


    public function dashboard()
    {
        $totalVotantes = Votantes::all()->count();
        $totalLideres = Lideres::all()->count();
        return view('dashboard', ["totalVotantes" => $totalVotantes, "totalLideres" => $totalLideres]);
    }
}

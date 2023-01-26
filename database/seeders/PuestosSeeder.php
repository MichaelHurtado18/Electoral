<?php

namespace Database\Seeders;

use App\Models\Puestos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PuestosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Puestos::create(['nombre' => 'INSTITUTO TÉCNICO COMERCIAL']);
        Puestos::create(['nombre' => 'COLISEO ROBERTO LOZANO']);
        Puestos::create(['nombre' => 'IE URBANO TENORIO']);
        Puestos::create(['nombre' => 'IE SAN RAFAEL']);
        Puestos::create(['nombre' => 'IE POLICARPA SALAVARRIETA']);
        Puestos::create(['nombre' => 'IE REPÚBLICA DE VENEZUELA']);
        Puestos::create(['nombre' => 'IE PASCUAL DE ANDAGOYA']);
        Puestos::create(['nombre' => 'IE LA ANUNCIACIÓN (IFA)']);
        Puestos::create(['nombre' => 'IE FRANCISCO JOSÉ DE CALDAS']);
        Puestos::create(['nombre' => 'IE ANAVICTORIA']);
        Puestos::create(['nombre' => 'FUND EDUC Y SOCIAL ANA VICTORIA']);
    }
}

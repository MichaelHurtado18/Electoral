<?php

namespace App\Exports;

use App\Models\Votantes;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VotantesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{


    public function headings(): array
    {
        return [

            ['Nombre Completo', 'Cedula', 'Teléfono', 'Correo', 'Puesto Votación', 'Mesa', 'Líder Asignado'],

        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            'A1'    => ['font' => ['size' => 10]],
            'B1'    => ['font' => ['size' => 10]],
            'C1'    => ['font' => ['size' => 10]],
            'D1'    => ['font' => ['size' => 10]],
            'E1'    => ['font' => ['size' => 10]],
            'F1'    => ['font' => ['size' => 10]],
            'G1'    => ['font' => ['size' => 10]],

        ];
    }
    public function collection()
    {
        return DB::table('votantes')
            ->join('lideres', 'lideres.id', '=', 'votantes.lider_id')
            ->join('puestos', 'puestos.id', '=', 'votantes.puesto_id')
            ->select(
                DB::raw('concat(votantes.nombre, " ", votantes.apellido )'),
                'votantes.cedula',
                'votantes.telefono',
                'votantes.correo',
                'puestos.nombre',
                'votantes.mesa',
                DB::raw('concat(lideres.nombre , " " ,  lideres.apellido)')
            )->get();
    }
}

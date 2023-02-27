<?php

namespace App\Exports;

use App\Models\Lideres;
use App\Models\Votantes;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VotantesLideresExport implements FromCollection, ShouldAutoSize, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $lider;

    public function __construct($lider)
    {
        $this->lider = $lider;
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

    public function headings(): array
    {
        return [

            ['Nombre Completo', 'Correo', 'Cedula', 'Teléfono', 'Puesto Votación', 'Mesa', 'Líder Asignado'],

        ];
    }
    public function collection()
    {
        return DB::table('votantes')
            ->join('lideres', 'lideres.id', '=', 'votantes.lider_id')
            ->join('puestos', 'puestos.id', '=', 'votantes.puesto_id')
            ->select(
                DB::raw('concat(votantes.nombre , " " , votantes.apellido )'),
                'votantes.correo',
                'votantes.cedula',
                'votantes.telefono',
                'puestos.nombre',
                'votantes.mesa',
                DB::raw('concat(lideres.nombre , " " , lideres.apellido )'),
            )
            ->where('lideres.id', '=', $this->lider)
            ->get();
    }
}

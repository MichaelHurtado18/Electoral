<?php

namespace App\Exports;

use App\Models\Puestos;
use App\Models\Votantes;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VotantesPuestosExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public $puesto;

    public function __construct($puesto)
    {
        $this->puesto = $puesto;
    }


    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            'A1'    => ['font' => ['size' => 20]],
            'A2'    => ['font' => ['size' => 10]],
            'B2'    => ['font' => ['size' => 10]],
            'C2'    => ['font' => ['size' => 10]],
            'D2'    => ['font' => ['size' => 10]],
            'E2'    => ['font' => ['size' => 10]],
            'F2'    => ['font' => ['size' => 10]],
            2   => ['font' => ['bold' => true]],

        ];
    }

    public function headings(): array
    {
        return [
            ['Nombre', 'Apellido', 'Correo', 'Cedula', 'Teléfono', 'Mesa'],

        ];
    }
    public function collection()
    {
        $votantes = DB::table('puestos')
            ->join('lideres', 'puestos.id', '=', 'lideres.puesto_id')
            ->select('lideres.nombre', 'lideres.apellido', 'lideres.correo', 'lideres.cedula', 'lideres.telefono', 'lideres.mesa')
            ->where('puestos.id',  $this->puesto);
        $votantes = DB::table('puestos')
            ->join('votantes', 'puestos.id', '=', 'votantes.puesto_id')
            ->select('votantes.nombre', 'votantes.apellido', 'votantes.correo', 'votantes.cedula', 'votantes.telefono', 'votantes.mesa')
            ->where('puestos.id',  $this->puesto)
            ->union($votantes)
            ->get();

        return $votantes;
    }
}

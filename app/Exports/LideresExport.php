<?php

namespace App\Exports;

use App\Models\Lideres;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LideresExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [

            ['Nombre Completo', 'Teléfono', 'Cedula', 'Correo', 'Puesto Votación', 'Mesa'],

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

        ];
    }
    public function collection()
    {
        return DB::table('lideres')
            ->join('puestos', 'puestos.id', '=', 'lideres.puesto_id')
            ->select(
                DB::raw('concat(lideres.nombre, " ", lideres.apellido )'),
                'lideres.telefono',
                'lideres.cedula',
                'lideres.correo',
                'puestos.nombre',
                'lideres.mesa',
            )->get();
    }
}

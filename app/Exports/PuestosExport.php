<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Puestos;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PuestosExport implements FromCollection,  WithHeadings, ShouldAutoSize,  WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */



    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            'A1'    => ['font' => ['size' => 10]],
            'B1'    => ['font' => ['size' => 10]],
        ];
    }
    public function headings(): array
    {
        return [

            ['Puesto Votación', 'Nro Votantes'],

        ];
    }

    public function collection()
    {
        $query = DB::select("
        SELECT nombre, COUNT(puesto_id) as total FROM
         ( SELECT lideres.puesto_id as puesto_id FROM lideres  
                    UNION ALL 
        SELECT votantes.puesto_id as puesto_id FROM votantes )
         nueva_tabla INNER JOIN puestos ON nueva_tabla.puesto_id=puestos.id GROUP BY puesto_id;
         ");

        return collect($query);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Lideres;
use App\Models\Puestos;

use Livewire\Component;
use App\Models\Votantes;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ShowVotantesPuestos extends Component
{
    use WithPagination;

    protected $listeners = ['filtrar'];
    public $puesto;
    public $termino;

    public function filtrar($termino)
    {
        $this->termino = $termino;
    }


    public function render()
    {
        if ($this->termino) {
            $votantes = DB::table('votantes')
                ->select('votantes.nombre', 'votantes.apellido', 'votantes.correo', 'votantes.cedula', 'votantes.telefono')
                ->where('puesto_id', '=', $this->puesto->id)
                ->where(function ($query) {
                    $query->where('nombre', 'LIKE', '%' . $this->termino . '%')
                        ->Orwhere('apellido', 'LIKE', '%' . $this->termino . '%')
                        ->Orwhere('correo', 'LIKE', '%' . $this->termino . '%')
                        ->orWhere('cedula', 'LIKE', '%' . $this->termino . '%')
                        ->orWhere('telefono', 'LIKE', '%' . $this->termino . '%');
                });
            $votantes = DB::table('lideres')
                ->select('lideres.nombre', 'lideres.apellido', 'lideres.correo', 'lideres.cedula', 'lideres.telefono')
                ->where('puesto_id', '=', $this->puesto->id)
                ->where(function ($query) {
                    $query->where('nombre', 'LIKE', '%' . $this->termino . '%')
                        ->Orwhere('apellido', 'LIKE', '%' . $this->termino . '%')
                        ->Orwhere('correo', 'LIKE', '%' . $this->termino . '%')
                        ->orWhere('cedula', 'LIKE', '%' . $this->termino . '%')
                        ->orWhere('telefono', 'LIKE', '%' . $this->termino . '%');
                })
                ->union($votantes)
                ->paginate(10);
        } else {

            $votantes = DB::table('puestos')
                ->join('lideres', 'puestos.id', '=', 'lideres.puesto_id')
                ->select('lideres.nombre', 'lideres.apellido', 'lideres.correo', 'lideres.cedula', 'lideres.telefono')
                ->orderByDesc('lideres.id')
                ->where('puestos.id',  $this->puesto->id);
            $votantes = DB::table('puestos')
                ->join('votantes', 'puestos.id', '=', 'votantes.puesto_id')
                ->select('votantes.nombre', 'votantes.apellido', 'votantes.correo', 'votantes.cedula', 'votantes.telefono')
                ->where('puestos.id',  $this->puesto->id)
                ->orderByDesc('votantes.id')
                ->union($votantes)
                ->paginate(10);
        }
        return view('livewire.show-votantes-puestos', ["votantes" => $votantes]);
    }
}

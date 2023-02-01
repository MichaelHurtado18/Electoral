<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\Votantes;

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
                ->where('puesto_id', '=', $this->puesto->id)
                ->where(function ($query) {
                    $query->where('nombre', 'LIKE', '%' . $this->termino . '%')
                        ->Orwhere('apellido', 'LIKE', '%' . $this->termino . '%')
                        ->Orwhere('correo', 'LIKE', '%' . $this->termino . '%')
                        ->orWhere('cedula', 'LIKE', '%' . $this->termino . '%')
                        ->orWhere('telefono', 'LIKE', '%' . $this->termino . '%');
                })->paginate(10);
        } else {
            $votantes = Votantes::where('puesto_id', '=', $this->puesto->id)->paginate(10);
        }
        return view('livewire.show-votantes-puestos', ["votantes" => $votantes]);
    }
}

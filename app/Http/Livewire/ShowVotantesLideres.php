<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Votantes;
use Illuminate\Support\Facades\DB;

class ShowVotantesLideres extends Component
{
    protected $listeners = ['filtrar'];
    public $termino;
    public $lider;

    public function filtrar($termino)
    {
        $this->termino = $termino;
    }

    public function render()
    {
        if ($this->termino) {
            $votantes = DB::table('votantes')
                ->where('lider_id', '=', $this->lider->id)
                ->where(function ($query) {
                    $query->where('nombre', 'LIKE', '%' . $this->termino . '%')
                        ->Orwhere('apellido', 'LIKE', '%' . $this->termino . '%')
                        ->Orwhere('correo', 'LIKE', '%' . $this->termino . '%')
                        ->orWhere('cedula', 'LIKE', '%' . $this->termino . '%')
                        ->orWhere('telefono', 'LIKE', '%' . $this->termino . '%');
                })
                ->orderByDesc('id')
                ->paginate(10);
        } else {
            $votantes = Votantes::where('lider_id', $this->lider->id)->paginate(10);
        }
        return view('livewire.show-votantes-lideres', ["votantes" => $votantes]);
    }
}

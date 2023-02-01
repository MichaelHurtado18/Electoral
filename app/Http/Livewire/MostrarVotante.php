<?php

namespace App\Http\Livewire;

use App\Models\Votantes;
use Livewire\Component;

class MostrarVotante extends Component
{

    public $termino;

    protected $listeners = ['filtrar'];

    public function filtrar($termino)
    {
        $this->termino = $termino;
    }
    public function render()
    {

        $votantes = Votantes::when($this->termino, function ($query) {
            $query->where('nombre', 'LIKE', '%' . $this->termino . '%');
        })
            ->Orwhere('apellido', 'LIKE', '%' . $this->termino . '%')
            ->Orwhere('correo', 'LIKE', '%' . $this->termino . '%')
            ->orWhere('cedula', 'LIKE', '%' . $this->termino . '%')
            ->orWhere('telefono', 'LIKE', '%' . $this->termino . '%')
            ->paginate(12);
        return view('livewire.mostrar-votante', ["votantes" => $votantes]);
    }
}

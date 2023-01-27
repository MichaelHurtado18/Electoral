<?php

namespace App\Http\Livewire;

use App\Models\Lideres;
use Livewire\Component;

class MostrarLideres extends Component
{

    public $termino;
    protected $listeners = ['filtrar'];
    public function filtrar($termino)
    {
        $this->termino = $termino;
    }

    public function render()
    {
        // $lideres = Lideres::latest()->paginate(12);

        $lideres = Lideres::when($this->termino, function ($query) {
            $query->where('nombre', 'LIKE', '%' . $this->termino . '%');
        })
            ->Orwhere('correo', 'LIKE', '%' . $this->termino . '%')
            ->Orwhere('apellido', 'LIKE', '%' . $this->termino . '%')
            ->orWhere('cedula', 'LIKE', '%' . $this->termino . '%')
            ->orWhere('telefono', 'LIKE', '%' . $this->termino . '%')
            ->paginate(12);
        return view('livewire.mostrar-lideres', ["lideres" => $lideres]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Lideres;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

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

        $lideres = Lideres::when($this->termino, function ($query) {
            $query->where(DB::raw('CONCAT_WS(" ",nombre, apellido) '), 'LIKE', '%' . $this->termino . '%');
        })
            ->Orwhere('correo', 'LIKE', '%' . $this->termino . '%')
            ->orWhere('cedula', 'LIKE', '%' . $this->termino . '%')
            ->orWhere('telefono', 'LIKE', '%' . $this->termino . '%')
            ->orderByDesc('id')
            ->paginate(12);

       
        return view('livewire.mostrar-lideres', ["lideres" => $lideres]);
    }
}

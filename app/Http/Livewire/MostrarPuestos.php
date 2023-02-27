<?php

namespace App\Http\Livewire;

use App\Models\Puestos;
use Livewire\Component;

class MostrarPuestos extends Component
{

    // public $puestos;
    public $termino;
    protected $listeners = ['getPuestos' => 'render', 'checkPuesto', 'eliminarPuesto', 'filtrar'];

    // public function mount()
    // {
    //     $this->puestos = Puestos::all();
    // }


    /*ESTA FUNCION VERIFICA QUE EL PUESTO QUE EL USUARIO QUIERE ELIMINAR NO TENGA VOTANTES ASIGNADO */
    public function checkPuesto($id)
    {
        if (Puestos::find($id)->votantes->count() > 0) {
            // Si el puesto no se puede eliminar
            $this->emit('errorPuesto', 'NO SE PUEDE ELIMINAR ESTE PUESTO PORQUE HAY VOTANTES ASIGNADOS A EL');
            // LLama a este metodo que esta en el  SCRIPT index de puesto
        } else {
            // Si el puesto se quiere eliminar
            $this->emit('modalEliminar', $id);
            // LLama a este metodo que esta en el  SCRIPT index de puesto
        }
    }
    /*ELIMINA UN PUESTO Y EMITE UNA FUNCION A JS */
    public function eliminarPuesto($id)
    {
        $puesto = Puestos::find($id);
        $puesto->delete();
        $this->emit('getPuestos');
    }


    public function filtrar($termino)
    {
        $this->termino = $termino;
    }
    public function render()
    {
        $puestos = Puestos::when($this->termino, function ($query) {
            $query->where('nombre', 'LIKE', '%' . $this->termino . '%');
        })->orderByDesc('id')
            ->paginate(30);

        return view('livewire.mostrar-puestos', ["puestos" => $puestos]);
    }
}

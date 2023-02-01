<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FiltrarVotantesLideres extends Component
{
    public $termino;
    public function buscar()
    {
        $this->emit('filtrar', $this->termino);
    }
    public function render()
    {
        return view('livewire.filtrar-votantes-lideres');
    }
}

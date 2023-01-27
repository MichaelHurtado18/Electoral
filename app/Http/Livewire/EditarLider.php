<?php

namespace App\Http\Livewire;

use App\Models\Lideres;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class EditarLider extends Component
{
    public $id_lider;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $cedula;


    public function mount($lider)
    {

        $this->id_lider = $lider->id;
        $this->nombre = $lider->nombre;
        $this->apellido = $lider->apellido;
        $this->email = $lider->correo;
        $this->telefono = $lider->telefono;
        $this->cedula = $lider->cedula;
    }

    public function update()
    {

        // Validamos los valores
        $this->validate([
            'nombre' => ['required'],
            'apellido' => ['required'],
            'email' => ['required', 'email',  Rule::unique('lideres', 'correo')->ignore($this->id_lider)],
            'telefono' => 'required|digits:10',
            'cedula' => ['required', 'max:12'],
        ]);
        // Actualizamos
        $lider = Lideres::find($this->id_lider);
        $lider->nombre = $this->nombre;
        $lider->apellido = $this->apellido;
        $lider->correo = $this->email;
        $lider->cedula = $this->cedula;
        $lider->telefono = $this->telefono;
        $lider->save();

        // Creamos mensaje
        session()->flash('mensaje', 'Se actualizo correctamente');

        // Redirigimos al usuario
        return redirect()->route('lideres.index');
    }

    public function render()
    {
        return view('livewire.editar-lider');
    }
}

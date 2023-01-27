<?php

namespace App\Http\Livewire;

use App\Models\Puestos;
use Livewire\Component;
use App\Models\Votantes;
use Illuminate\Validation\Rule;

class EditarVotante extends Component
{

    public $id_votante;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $cedula;
    public $puesto;


    public function mount($votante)
    {
        $this->id_votante = $votante->id;
        $this->nombre = $votante->nombre;
        $this->apellido = $votante->apellido;
        $this->email = $votante->correo;
        $this->telefono = $votante->telefono;
        $this->cedula = $votante->cedula;
        $this->puesto = $votante->puesto_id;
    }


    public function update()
    {
        // Validamos los valores
        $this->validate([
            'nombre' => ['required'],
            'apellido' => ['required'],
            'email' => ['required', 'email',  Rule::unique('votantes', 'correo')->ignore($this->id_votante)],
            'telefono' => 'required|digits:10',
            'cedula' => ['required', 'max:12'],
            'puesto' => ['required', 'exists:puestos,id'],
        ]);



        // Actualizamos
        $votante = Votantes::find($this->id_votante);
        $votante->nombre = $this->nombre;
        $votante->apellido = $this->apellido;
        $votante->correo = $this->email;
        $votante->cedula = $this->cedula;
        $votante->telefono = $this->telefono;
        $votante->puesto_id = $this->puesto;
        $votante->save();


        // Creamos mensaje
        session()->flash('mensaje', 'Se actualizo correctamente');

        // Redirigimos al usuario
        return redirect()->route('votantes.index');
    }


    public function render()
    {
        $puestos = Puestos::all();
        return view('livewire.editar-votante', ["puestos" => $puestos]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Lideres;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearLider extends Component
{
    use WithFileUploads;

    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $cedula;
    public $imagen;


    protected $rules = [
        'nombre' => ['required'],
        'apellido' => ['required'],
        'email' => ['required', 'email', 'unique:lideres,correo'],
        'telefono' => 'required|digits:10',
        'cedula' => ['required', 'max:12'],
        'imagen' => ['nullable', 'image']
    ];

    public function create()
    {
        // Validamos los campos
        $this->validate();
        // Creamos al Lider
        Lideres::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'correo' => $this->email,
            'telefono' => $this->telefono,
            'cedula' => $this->cedula,
            'imagen' => $this->imagen
        ]);

        // Creamos un mensaje de exito
        session()->flash('mensaje', 'Lider creado correctamente');

        // Limpiamos los campos y Redirigimos al usuario
        $this->nombre = '';
        $this->apellido = '';
        $this->email = '';
        $this->telefono = '';
        $this->cedula = '';
        return redirect()->route('lideres.index');
    }
    public function render()
    {
        return view('livewire.crear-lider');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Lideres;
use App\Models\Puestos;
use Livewire\Component;
use App\Models\Votantes;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CrearVotante extends Component
{
    use WithFileUploads;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $cedula;
    public $puesto;
    public $lider;
    public $imagen;

    protected $rules = [
        'nombre' => ['required'],
        'apellido' => ['required'],
        'email' => ['required', 'email', 'unique:votantes,correo'],
        'telefono' => 'required|digits:10',
        'cedula' => ['required', 'max:12'],
        'imagen' => ['nullable', 'image', 'max:1024'],
        'puesto' => ['required', 'exists:puestos,id'],
        'lider' => ['required', 'exists:lideres,id']
    ];

    public function create()
    {

        // Validamos los datos
        $this->validate();

        // 
        if ($this->imagen) {
            $imagen = $this->imagen;
            $nombreImagen = Str::uuid() . '.' . $imagen->getClientOriginalExtension();
            $this->imagen = $nombreImagen;
            $img = Image::make($imagen->getRealPath())->fit(700, 700);
            $img->stream();
            Storage::disk('local')->put("public/votantes/$nombreImagen", $img);
        }

        // Creamos el votante
        Votantes::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'correo' => $this->email,
            'telefono' => $this->telefono,
            'cedula' => $this->cedula,
            'imagen' => $this->imagen,
            'lider_id' => $this->lider,
            'puesto_id' => $this->puesto
        ]);

        // Creamos el mensaje de exito
        session()->flash('mensaje', 'Votante Creado exitosamente');
        //Redirigimos al usuario
        return redirect()->route('votantes.index');
    }
    public function render()
    {
        $puestos = Puestos::all();
        $lideres = Lideres::all();
        return view('livewire.crear-votante', [
            "puestos" => $puestos,
            "lideres" => $lideres
        ]);
    }
}

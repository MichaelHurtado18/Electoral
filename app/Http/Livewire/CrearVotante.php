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
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
    public $mesa;
    public $img_id;

    protected $rules = [
        'nombre' => ['required'],
        'apellido' => ['required'],
        'email' => ['nullable', 'email', 'unique:votantes,correo'],
        'telefono' => 'required|digits:10',
        'cedula' => ['required', 'max:12'],
        'imagen' => ['nullable', 'image', 'max:1024'],
        'puesto' => ['required', 'exists:puestos,id'],
        'lider' => ['required', 'exists:lideres,id'],
        'mesa' => ['required', 'numeric']
    ];

    public function create()
    {

        // Validamos los datos
        $this->validate();

        if ($this->imagen) {
            $imagen = $this->imagen;
            $img =  (string) Image::make($imagen->getRealPath())->fit(700, 700)->encode('data-url');
            $cloudinary =   Cloudinary::upload($img, ['folder' => 'votantes']);
            $this->imagen = $cloudinary->getSecurePath();
            $img_id = $cloudinary->getPublicId();
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
            'puesto_id' => $this->puesto,
            'mesa' => $this->mesa,
            'img_id' =>  $img_id
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

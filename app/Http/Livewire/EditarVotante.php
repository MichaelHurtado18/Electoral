<?php

namespace App\Http\Livewire;

use App\Models\Puestos;
use Livewire\Component;
use App\Models\Votantes;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class EditarVotante extends Component
{


    use WithFileUploads;

    public $id_votante;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $cedula;
    public $puesto;
    public $imagen;
    public $nueva_imagen;
    public $mesa;
    public $img_id;


    public function mount($votante)
    {
        $this->id_votante = $votante->id;
        $this->nombre = $votante->nombre;
        $this->apellido = $votante->apellido;
        $this->email = $votante->correo;
        $this->telefono = $votante->telefono;
        $this->cedula = $votante->cedula;
        $this->puesto = $votante->puesto_id;
        $this->imagen = $votante->imagen;
        $this->mesa = $votante->mesa;
        $this->img_id = $votante->img_id;
    }



    public function update()
    {
        // Validamos los valores
        $this->validate([
            'nombre' => ['required'],
            'apellido' => ['required'],
            'email' => ['nullable', 'email',  Rule::unique('votantes', 'correo')->ignore($this->id_votante)],
            'telefono' => 'required|digits:10',
            'cedula' => ['required', 'max:12'],
            'puesto' => ['required', 'exists:puestos,id'],
            'nueva_imagen' => ['nullable', 'image', 'max:1024'],
            'mesa' => ['required', 'numeric']
        ]);


        //     Validar si  esta cambiando la imagen
        if ($this->nueva_imagen) {
            $imagen = $this->nueva_imagen;
            $img  = (string) Image::make($imagen->getRealPath())->fit(700, 700)->encode('data-url'); // Recortamos la imagen
            $cloudinary =  Cloudinary::upload($img, ['folder' => 'votantes']);
            if ($this->imagen) {
                Cloudinary::destroy($this->img_id);  // Eliminamos la imagen anterior
            }
            $this->img_id =  $cloudinary->getPublicId();
            $this->imagen = $cloudinary->getSecurePath();
        }
        // Actualizamos
        $votante = Votantes::find($this->id_votante);
        $votante->nombre = $this->nombre;
        $votante->apellido = $this->apellido;
        $votante->correo = $this->email;
        $votante->cedula = $this->cedula;
        $votante->telefono = $this->telefono;
        $votante->puesto_id = $this->puesto;
        $votante->imagen = $this->imagen;
        $votante->mesa = $this->mesa;
        $votante->img_id = $this->img_id;
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

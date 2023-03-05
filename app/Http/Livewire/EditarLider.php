<?php

namespace App\Http\Livewire;

use livewire;
use App\Models\Lideres;
use App\Models\Puestos;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class EditarLider extends Component
{
    use WithFileUploads;
    public $id_lider;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $cedula;
    public $imagen;
    public $nueva_imagen;
    public $puesto;
    public $mesa;
    public $img_id;

    public function mount($lider)
    {
        $this->id_lider = $lider->id;
        $this->nombre = $lider->nombre;
        $this->apellido = $lider->apellido;
        $this->email = $lider->correo;
        $this->telefono = $lider->telefono;
        $this->cedula = $lider->cedula;
        $this->imagen = $lider->imagen;
        $this->puesto = $lider->puesto_id;
        $this->mesa = $lider->mesa;
        $this->img_id = $lider->img_id;
    }

    public function update()
    {

        // Validamos los valores
        $this->validate([
            'nombre' => ['required'],
            'apellido' => ['required'],
            'email' => ['nullable', 'email',  Rule::unique('lideres', 'correo')->ignore($this->id_lider)],
            'telefono' => 'required|digits:10',
            'cedula' => ['required', 'max:12'],
            'nueva_imagen' => ['nullable', 'image', 'max:1024'],
            'puesto' => ['required', 'exists:puestos,id'],
            'mesa' => ['required', 'numeric']
        ]);

        //     Validar si  esta cambiando la imagen
        if ($this->nueva_imagen) {
            $imagen = $this->nueva_imagen;
            $img = (string) Image::make($imagen->getRealPath())->fit(700, 700)->encode('data-url'); // Recortamos la imagen
            $cloudinary =  Cloudinary::upload($img, ['folder' => 'lideres']);

            if ($this->imagen) {
                Cloudinary::destroy($this->img_id);
            }
            $this->img_id =  $cloudinary->getPublicId();
            $this->imagen = $cloudinary->getSecurePath();
        }

        // Actualizamos
        $lider = Lideres::find($this->id_lider);
        $lider->nombre = $this->nombre;
        $lider->apellido = $this->apellido;
        $lider->correo = $this->email;
        $lider->cedula = $this->cedula;
        $lider->telefono = $this->telefono;
        $lider->imagen = $this->imagen;
        $lider->puesto_id = $this->puesto;
        $lider->mesa = $this->mesa;
        $lider->img_id = $this->img_id;
        $lider->save();

        // Creamos mensaje
        session()->flash('mensaje', 'Se actualizo correctamente');

        // Redirigimos al usuario
        return redirect()->route('lideres.index');
    }

    public function render()
    {
        $puestos = Puestos::all();
        return view('livewire.editar-lider', ["puestos" => $puestos]);
    }
}

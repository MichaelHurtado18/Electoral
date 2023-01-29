<?php

namespace App\Http\Livewire;

use App\Models\Lideres;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function mount($lider)
    {

        $this->id_lider = $lider->id;
        $this->nombre = $lider->nombre;
        $this->apellido = $lider->apellido;
        $this->email = $lider->correo;
        $this->telefono = $lider->telefono;
        $this->cedula = $lider->cedula;
        $this->imagen = $lider->imagen;
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
            'nueva_imagen' => ['nullable', 'image', 'max:1024']
        ]);

        //     Validar si  esta cambiando la imagen
        if ($this->nueva_imagen) {
            $imagen = $this->nueva_imagen;
            $nombreImagen = Str::uuid() . '.' . $imagen->getClientOriginalExtension(); // Le damos un nombre a la imagen
            $img = Image::make($imagen->getRealPath())->fit(700, 700); // Recortamos la imagen
            $img->stream();
            Storage::disk('local')->put("public/lideres/$nombreImagen", $img); // Guardamos la imagen

            if ($this->imagen) {
                Storage::delete("public/lideres/$this->imagen");    // Eliminamos la imagen anterior
            }
            $this->imagen = $nombreImagen;
        }

        // Actualizamos
        $lider = Lideres::find($this->id_lider);
        $lider->nombre = $this->nombre;
        $lider->apellido = $this->apellido;
        $lider->correo = $this->email;
        $lider->cedula = $this->cedula;
        $lider->telefono = $this->telefono;
        $lider->imagen = $this->imagen;
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

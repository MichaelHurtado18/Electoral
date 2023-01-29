<?php

namespace App\Http\Livewire;

use App\Models\Puestos;
use Livewire\Component;
use App\Models\Votantes;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

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
    }



    // public function updating()
    // {
    //     dd('Hola');
    // }

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
            'nueva_imagen' => ['nullable', 'image', 'max:1024'],
        ]);


        //     Validar si  esta cambiando la imagen
        if ($this->nueva_imagen) {
            $imagen = $this->nueva_imagen;
            $nombreImagen = Str::uuid() . '.' . $imagen->getClientOriginalExtension(); // Le damos un nombre a la image
            $img = Image::make($imagen->getRealPath())->fit(700, 700); // Recortamos la imagen
            $img->stream();
            Storage::disk('local')->put("public/votantes/$nombreImagen", $img); // Guardamos la imagen
            
            if ($this->imagen) {
                Storage::delete("public/votantes/$this->imagen");    // Eliminamos la imagen anterior
            }

            $this->imagen = $nombreImagen;
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

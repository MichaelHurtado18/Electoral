<?php

namespace App\Http\Livewire;


use App\Models\Lideres;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
        'imagen' => ['nullable', 'image', 'max:1024']
    ];




    public function create()
    {

        $this->validate();
        if ($this->imagen) {        
            $imagen = $this->imagen;
            $nombreImagen = Str::uuid() . '.' . $imagen->getClientOriginalExtension();
            $this->imagen = $nombreImagen;
            $img = Image::make($imagen->getRealPath())->fit(700, 700);
            $img->stream();
            Storage::disk('local')->put("public/lideres/$nombreImagen", $img);
        }


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

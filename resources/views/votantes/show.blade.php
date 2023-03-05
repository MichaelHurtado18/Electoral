<x-app-layout>
    <x-slot name="header">
        <div>

            <h2 class="dark:text-gray-200 font-bold text-2xl">{{ $votante->nombre . ' ' . $votante->apellido }}</h2>
            @if (session()->has('mensaje'))
                <p class="text-lg font-bold text-white text-center uppercase rounded m-5 bg-green-400 p-5">
                    {{ session('mensaje') }}</p>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-200     ">
                <div class="bg-white md:flex justify-between p-5 items-center dark:bg-gray-800">
                    <div>
                        <p class="font-bold">Nombre: <span class=" font-normal font-sm text-gray-500">
                                {{ $votante->nombre . ' ' . $votante->apellido }}</span>
                        </p>
                        <p class="font-bold">Celular: <span class="font-normal font-sm text-gray-500">
                                {{ $votante->telefono }}</span></p>
                        <p class="font-bold">Correo: <span class="font-normal font-sm text-gray-500">
                                {{ $votante->correo }}</span></p>
                        <p class="font-bold">Cedula: <span class="font-normal font-sm text-gray-500">
                                {{ $votante->cedula }}</span></p>
                        <p class="font-bold"> <a href="{{ route('lideres.show', $votante->lider) }}"> Líder Asignado:
                                <span class="font-normal font-sm text-gray-500">
                                    {{ $votante->lider->nombre . ' ' . $votante->lider->apellido }} </span> </a> </p>


                        <p class="font-bold "> Mesa: <span
                                class="font-normal font-sm text-gray-500">{{ $votante->mesa }}
                            </span> </p>
                        <p class="font-bold"> <a href="{{ route('puestos.show', $votante->puesto) }}"> Puesto
                                Votación:
                                <span class="font-normal font-sm text-gray-500"> {{ $votante->puesto->nombre }} </span>
                            </a>
                        </p>
                    </div>
                    <div class="w-40">
                        <img src="{{ $votante->imagen != '' ? $votante->imagen : asset('storage/votantes/user.png') }}"
                            alt="Imagen {{ $votante->nombre }}">
                    </div>
                    <a href="{{ route('votantes.edit', $votante) }}"
                        class="md:w-48  text-center mt-2 block bg-blue-600 hover:bg-blue-700 text-white font-bold p-2 rounded ">
                        Editar</a>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div>

            <h2 class="dark:text-gray-200 font-bold text-2xl">{{ $lider->nombre . ' ' . $lider->apellido }}</h2>
            @if (session()->has('mensaje'))
                <p class="text-lg font-bold text-white text-center uppercase rounded m-5 bg-green-400 p-5">
                    {{ session('mensaje') }}</p>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-200">
                <div class="bg-white md:flex justify-between p-5 items-center dark:bg-gray-800">
                    <div>
                        <p class="font-bold">Nombre: <span class=" font-normal font-sm text-gray-500">
                                {{ $lider->nombre . ' ' . $lider->apellido }}</span>
                        </p>
                        <p class="font-bold">Celular: <span class="font-normal font-sm text-gray-500">
                                {{ $lider->telefono }}</span></p>
                        <p class="font-bold">Correo: <span class="font-normal font-sm text-gray-500">
                                {{ $lider->correo }}</span></p>
                        <p class="font-bold">Cedula: <span class="font-normal font-sm text-gray-500">
                                {{ $lider->cedula }}</span></p>
                        <p class="font-bold">Este lider ha ingresado: <span class="font-normal font-sm text-gray-500">
                                {{ $lider->votante->count() }}</span> Votantes</p>
                        <p class="font-bold "> Mesa: <span class="font-normal font-sm text-gray-500">{{ $lider->mesa }}
                            </span> </p>
                        <p class="font-bold"> <a href="{{ route('puestos.show', $lider->puesto) }}"> Puesto
                                Votación:
                                <span class="font-normal font-sm text-gray-500"> {{ $lider->puesto->nombre }} </span>
                            </a>
                        </p>
                    </div>
                    <div class="w-40">
                        <img src="{{ $lider->imagen != '' ? $lider->imagen : asset('storage/lideres/user.png') }}"
                            alt="Imagen {{ $lider->nombre }}">
                    </div>
                    <a href="{{ route('lideres.edit', $lider) }}"
                        class="md:w-48  text-center mt-2 block bg-blue-600 hover:bg-blue-700 text-white font-bold p-2 rounded ">
                        Editar</a>

                </div>
            </div>
            <livewire:filtrar-votantes-lideres />
            <a href="{{ route('lideres.showExport', $lider) }}"
                class="bg-green-500 hover:bg-green-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto">
                Descargar Votantes</a>
            <livewire:show-votantes-lideres :lider="$lider" />


        </div>
    </div>
</x-app-layout>

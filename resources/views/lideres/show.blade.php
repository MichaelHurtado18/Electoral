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
            <div class="">
                <div class="p-6 text-gray-900 dark:text-gray-200     ">
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

                        </div>
                        <div class="w-40">
                            <img src="{{ $lider->imagen != '' ? asset("storage/lideres/$lider->imagen") : asset('storage/lideres/user.png') }}"
                                alt="Imagen {{ $lider->nombre }}">
                        </div>
                        <a href="{{ route('lideres.edit', $lider) }}"
                            class="md:w-48  text-center mt-2 block bg-blue-600 hover:bg-blue-700 text-white font-bold p-2 rounded ">
                            Editar</a>

                    </div>
                </div>


                <div class="grid md:grid-cols-4 gap-4 ">
                    @forelse($lider->votante as $votante)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                            <div>
                                <p class="font-bold text-xl"> {{ $votante->nombre . ' ' . $votante->apellido }}</p>
                                <p> <span class="font-bold"> Correo: </span> {{ $votante->correo }}</p>
                                <p> <span class="font-bold">Celular: </span>{{ $votante->telefono }}</p>
                                <p> <span class="font-bold">Cedula:</span> {{ $votante->cedula }}</p>
                            </div>
                            {{-- <a href="{{ route('lideres.show', $lider) }}"
                                class=" block bg-orange-600 hover:bg-orange-700 text-white font-bold p-2 rounded "> Ver
                                Votantes</a>
                            <a href="{{ route('lideres.edit', $lider) }}"
                                class=" mt-2 block bg-blue-600 hover:bg-blue-700 text-white font-bold p-2 rounded ">
                                Editar</a> --}}
                        </div>

                    @empty
                        <p class="font-bold text-center"> Sin Lideres Por el momento</p>
                    @endforelse
                    {{-- {{ $lider->votante()->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

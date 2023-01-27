<x-app-layout>
    <x-slot name="header">
        <div>
            <a href="{{ route('votantes.create') }}"
                class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-full">
                Agregar Nuevo Votante
            </a>
            @if (session()->has('mensaje'))
                <p class="text-lg font-bold text-white text-center uppercase rounded m-5 bg-green-400 p-5">
                    {{ session('mensaje') }}</p>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <livewire:filtrar-votantes/>
                    <livewire:mostrar-votante />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

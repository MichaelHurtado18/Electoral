<x-app-layout>
    <x-slot name="header">
        <div>
            <a href="{{ route('lideres.create') }}"
                class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-full">
                Agregar Nuevo Lider
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

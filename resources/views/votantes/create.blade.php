<x-app-layout>
    <x-slot name="header">
        <p class="text-orange-600 font-black text-5xl"> Creando un Votante... </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <livewire:crear-votante />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

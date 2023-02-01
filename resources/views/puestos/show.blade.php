<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-bold text-2xl text-orange-500"> {{ $puesto->votantes->count() }} Personas Votaran en :
                {{ $puesto->nombre }} </h2>
            <livewire:filtrar-votantes-puestos />
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center ">
                    <livewire:show-votantes-puestos :puesto="$puesto" />
                </div>
            </div>
        </div>
    </div>



</x-app-layout>

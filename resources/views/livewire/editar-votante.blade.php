<div class="md:flex justify-center">

    <form class="md:w-1/2" novalidate wire:submit.prevent="update">


        <!-- Name -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" wire:model="nombre" class="block mt-1 w-full" type="text" nombre="nombre"
                :value="old('nombre')" required autofocus />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="apellido" :value="__('Apellido')" />
            <x-text-input id="apellido" wire:model="apellido" class="block mt-1 w-full" type="text" name="apellido"
                :value="old('apellido')" required />
            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" wire:model="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Telefono')" />
            <x-text-input id="telefono" wire:model="telefono" class="block mt-1 w-full" type="text" name="telefono"
                :value="old('telefono')" required />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="cedula" :value="__('Cedula')" />
            <x-text-input id="cedula" wire:model="cedula" class="block mt-1 w-full" type="text" name="cedula"
                :value="old('cedula')" required />
            <x-input-error :messages="$errors->get('cedula')" class="mt-2" />
        </div>


        <div class="mt-4">
            <x-input-label for="puesto" :value="__('Puesto')" />
            <select name="puesto" id="puesto" wire:model="puesto"
                class=" block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option> --Seleccionar -- </option>
                @foreach ($puestos as $puesto)
                    <option value="{{ $puesto->id }}"> {{ $puesto->nombre }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('puesto')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="nueva_imagen" :value="__('Imagen')" />
            <input type="file" id="nueva_imagen" wire:model="nueva_imagen" name="nueva_imagen">
            <x-input-error :messages="$errors->get('nueva_imagen')" class="mt-2" />
            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
            <div class="md:w-40">
                {{-- @if ($nueva_imagen)
                    <img src="{{ $nueva_imagen->temporaryUrl() }}">
                @endif --}}
            </div>
        </div>
        <div wire:loading>
            Subiendo Archivo...
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>

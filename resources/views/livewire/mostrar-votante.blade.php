<div class="grid md:grid-cols-4 gap-4 ">
    @forelse($votantes as $votante)
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
            <div>
                <p class="font-bold text-xl"> {{ $votante->nombre . ' ' . $votante->apellido }}</p>
                <p> <span class="font-bold"> Correo: </span> {{ $votante->correo }}</p>
                <p> <span class="font-bold">Celular: </span>{{ $votante->telefono }}</p>
                <p> <span class="font-bold">Cedula:</span> {{ $votante->cedula }}</p>
            </div>
           
            <a href="{{ route('votantes.edit', $votante) }}"
                class=" mt-2 block bg-blue-600 hover:bg-blue-700 text-white font-bold p-2 rounded ">
                Editar</a>
        </div>

    @empty
        <p class="font-bold text-center"> Sin Votantes Por el momento</p>
    @endforelse
    {{ $votantes->links() }}
</div>

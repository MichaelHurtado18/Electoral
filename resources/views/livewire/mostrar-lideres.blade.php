<div class="grid md:grid-cols-4 gap-4 ">
    @forelse($lideres as $lider)
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
            <div>
                <p class="font-bold text-xl"> {{ $lider->nombre . ' ' . $lider->apellido }}</p>
                <p> <span class="font-bold"> Correo: </span> {{ $lider->correo }}</p>
                <p> <span class="font-bold">Celular: </span>{{ $lider->telefono }}</p>
                <p> <span class="font-bold">Cedula:</span> {{ $lider->cedula }}</p>
            </div>
            <a href="" class=" block bg-orange-600 hover:bg-orange-700 text-white font-bold p-2 rounded "> Ver
                Votantes</a>
            <a href="{{ route('lideres.edit', $lider) }}"
                class=" mt-2 block bg-blue-600 hover:bg-blue-700 text-white font-bold p-2 rounded ">
                Editar</a>
        </div>

    @empty
        <p class="font-bold text-center"> Sin Lideres Por el momento</p>
    @endforelse
    {{ $lideres->links() }}
</div>

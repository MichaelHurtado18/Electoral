<div class=" mt-6 @if ($votantes->count()) grid md:grid-cols-4 gap-4 @endif">
    @forelse($votantes as $votante)
        <div class=" relative pb-10 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
            <div>
                <img src="{{ $votante->imagen != '' ? $votante->imagen : asset('storage/votantes/user.png') }}"
                    alt="Imagen {{ $votante->nombre }}">
                <p class="font-bold text-xl"> {{ $votante->nombre . ' ' . $votante->apellido }}</p>
                {{-- <p> <span class="font-bold"> Correo: </span> {{ $votante->correo }}</p> --}}
                <p> <span class="font-bold">Celular: </span>{{ $votante->telefono }}</p>
                {{-- <p> <span class="font-bold">Cedula:</span> {{ $votante->cedula }}</p> --}}
                {{-- <p> <a href="{{ route('lideres.show', $votante->lider) }}"> <span class="font-bold">Lider:</span>
                        {{ $votante->lider->nombre . ' ' . $votante->lider->apellido }} </a>
                </p> --}}
                <p> <a href="{{ route('puestos.show', $votante->puesto) }}"> <span class="font-bold"> Puesto
                            Votación:</span>
                        {{ $votante->puesto->nombre }} </a>
                </p>
                <p> <span class="font-bold">Mesa: </span>{{ $votante->mesa }}</p>
            </div>
            <a href="{{ route('votantes.show', $votante) }}"
                class="  absolute bottom-0 w-full block bg-orange-600 hover:bg-orange-700 text-white font-bold p-2 rounded ">
                Ver Más</a>
        </div>

    @empty
        <p class="font-bold text-2xl"> NO SE HAN AGREGADO VOTANTES</p>
    @endforelse
    {{ $votantes->links() }}
</div>

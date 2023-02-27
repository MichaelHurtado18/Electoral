<div>
    <div class=" @if ($lideres->count()) grid md:grid-cols-4 gap-4 @endif ">
        @forelse($lideres as $lider)
            <div class=" relative pb-10 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div>
                    <img src="{{ $lider->imagen != '' ? asset("storage/lideres/$lider->imagen") : asset('storage/lideres/user.png') }}"
                        alt="Imagen {{ $lider->nombre }}">
                    <p class="font-bold text-lg"> {{ $lider->nombre . ' ' . $lider->apellido }}</p>
                    {{-- <p> <span class="font-bold text-sm"> Correo: </span> {{ $lider->correo }}</p> --}}
                    <p> <span class="font-bold text-sm">Celular: </span>{{ $lider->telefono }}</p>
                    {{-- <p> <span class="font-bold text-sm">Cedula:</span> {{ $lider->cedula }}</p> --}}
                    <p> <a href="{{ route('puestos.show', $lider->puesto) }}"> <span class="font-bold"> Puesto
                                Votación:</span>
                            {{ $lider->puesto->nombre }} </a>
                    </p>
                    <p> <span class="font-bold text-sm"> Mesa:</span> {{ $lider->mesa }}</p>
                    <p> <span class="font-bold text-sm"> Votantes:</span> {{ $lider->votante->count() }}</p>
                </div>
                <a href="{{ route('lideres.show', $lider) }}"
                    class=" absolute bottom-0 w-full block bg-orange-600 hover:bg-orange-700 text-white font-bold p-2 rounded ">
                    Ver
                    Votantes</a>

            </div>

        @empty
            <p class="font-bold  text-2xl"> NO SE HAN AGREGADO LIDERES</p>
        @endforelse
        {{ $lideres->links() }}
    </div>
</div>

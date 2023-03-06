<div>

    @if ($lider->votante()->count())
        <h1 class="pt-6 text-center font-bold text-3xl">VOTANTES</h1>
    @endif

    <div
        class=" @if ($lider->votante()->count()) grid md:grid-cols-4 gap-4  p-6 text-gray-900 dark:text-gray-200 @endif ">

        @forelse($votantes as $votante)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div>
                    <img src="{{ $votante->imagen != '' ? $votante->imagen: asset('storage/votantes/user.png') }}"
                        alt="Imagen {{ $votante->nombre }}">

                    <div class="p-5">
                        <p class="font-bold text-xl"> {{ $votante->nombre . ' ' . $votante->apellido }}</p>
                        {{-- <p> <span class="font-bold"> Correo: </span> {{ $votante->correo }}</p> --}}
                        <p> <span class="font-bold"> Celular: </span>{{ $votante->telefono }} </p>
                        <p> <span class="font-bold"> <a href="{{ route('puestos.show', $votante->puesto) }}"> Puesto
                                    Votación:</span> {{ $votante->puesto->nombre }}</a></p>
                        <p> <span class="font-bold">Mesa:</span> {{ $votante->mesa }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="font-bold text-center text-2xl"> ESTE LIDER NO TIENE VOTANTES</p>
        @endforelse

    </div>
    {{ $votantes->links() }}
</div>

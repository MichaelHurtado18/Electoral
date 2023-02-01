<div class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="">
            <div class="p-6 text-gray-900 dark:text-gray-100 text-center ">
                <div class="flex flex-col mt-8 ">
                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 ">
                        <div
                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full  ">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Puesto</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Cantidad Votos</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Acciones</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Eliminar</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white">
                                    @foreach ($puestos as $puesto)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="text-sm leading-5 text-gray-500"> {{ $puesto->nombre }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="text-sm leading-5 text-gray-500"> {{ $puesto->votantes->count() }}
                                                </div>
                                            </td>
                                            <td class="x-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <a href="{{ route('puestos.show', $puesto) }}"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Votantes </a>
                                            </td>
                                            <td class="x-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                <!--SI EL USUARIO DA CLICK SE LLAMA AL checkPuesto que esta definido en el componente MostrarPuestos -->
                                                <button wire:click="$emit('checkPuesto', {{ $puesto->id }})"
                                                    wire:key="puesto-{{ $puesto->id }}"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Eliminar </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $puestos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

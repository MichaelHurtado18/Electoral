<div class="flex flex-col mt-8 ">
    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 ">
        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
            <table class="min-w-full  ">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Nombre</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Correo</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Cedula</th>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Telefono</th>
                    </tr>
                </thead>
                
                <tbody class="bg-white">
                    @foreach ($votantes as $votante)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-500">
                                    {{ $votante->nombre . ' ' . $votante->apellido }}
                                </div>
                            </td>
                            <td class="x-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $votante->correo }}
                            </td>
                            <td class="x-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $votante->cedula }}
                            </td>
                            <td class="x-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $votante->telefono }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $votantes->links() }}
</div>

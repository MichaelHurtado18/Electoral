<x-app-layout>
    <x-slot name="header">
        <div>
            <a class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-full btn_agregar_puesto">
                Agregar Nuevo Puesto
            </a>
            <livewire:filtrar-puestos />
            @if (session()->has('mensaje'))
                <p class="text-lg font-bold text-white text-center uppercase rounded m-5 bg-green-400 p-5">
                    {{ session('mensaje') }}</p>
            @endif
        </div>
    </x-slot>
    <div>
        <div class="pt-6 text-gray-900 dark:text-gray-100 text-center">
            <a href="{{route('puestos.export')}}"
                class="bg-green-500 hover:bg-green-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto">
                Descargar Puestos</a>
        <livewire:mostrar-puestos />
    </div>
    @push('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            /*CON ESTE SCRITP CREAMOS UN NUEVO PUESTO*/
            const btnAgregar = document.querySelector('.btn_agregar_puesto');
            btnAgregar.addEventListener('click', async function(id) {
                console.log(id)
                window.CSRF_TOKEN = '{{ csrf_token() }}';

                const {
                    value: puesto
                } = await Swal.fire({
                    title: 'Puesto',
                    input: 'text',
                    inputLabel: 'El nombre del puesto',
                    inputPlaceholder: 'Agregar Puesto'
                })

                if (puesto) {
                    const url = 'https://electoralsoft.herokuapp.com/puestos';
                    let datos = new FormData();
                    datos.append('puesto', puesto);
                    let consulta = await fetch(url, {
                        headers: {
                            'X-CSRF-TOKEN': window.CSRF_TOKEN
                        },
                        method: 'POST',
                        body: datos
                    })
                    const response = await consulta.text();
                    Swal.fire(`Se Creo el puesto: ${puesto}`)
                    Livewire.emit('getPuestos');
                }
            })


            /*CON ESTE SCRIPT ELIMINAMOS UN PUESTO*/

            Livewire.on('modalEliminar', function(id) {

                Swal.fire({
                    title: '¿Quieres eliminar este puesto?',
                    text: "Tenga en cuenta que no puede recuperar los puestos eliminadas!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('eliminarPuesto', id);
                        Swal.fire({
                            title: 'Eliminado',
                            text: 'El puesto se elimino correctamente',
                            icon: 'success'
                        });
                    }
                });
            })


            Livewire.on('errorPuesto', function(mensaje) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: mensaje,
                });
            });
        </script>
    @endpush
</x-app-layout>

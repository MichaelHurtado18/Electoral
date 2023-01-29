<div class="bg-gray-100  dark:bg-gray-800 m-5 p-2">
    <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold dark:text-gray-100">Buscar Votantes</h2>
    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent="buscar">
            <div class="md:flex md:justify-center md:items-center mb-5">
                <div class="md:w-1/2">
                    <div>
                      
                        <input id="termino" wire:model="termino" type="text"
                            placeholder="Buscar por nombre, celular, cedula o correo"
                            class="  bg-gray-800 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full dark:text-gray-100" />
                    </div>
                    <div class="mt-2">
                        <input type="submit"
                            class="bg-orange-500 hover:bg-orange-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                            value="Buscar" />
                    </div>
                </div>
            </div>


        </form>
    </div>
</div>

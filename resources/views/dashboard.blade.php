<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <canvas id="bar-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', getPuestos);

    async function getPuestos() {
        const url = 'http://127.0.0.1:8000/api/grafica';
        let consulta = await fetch(url);
        let respuesta = await consulta.json();
        let puestos = respuesta.map(respuesta => respuesta.nombre);
        let totales = respuesta.map(respuesta => respuesta.total);

        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: puestos,
                datasets: [{
                    label: "Cantidad de votos por puesto de votacion",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                    data: totales
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Predicted world population (millions) in 2050'
                }
            }
        })
    }
</script>

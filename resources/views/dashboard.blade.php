<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-orange-500  leading-tight">
            {{ __('Pagina Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <p class="text-center font-bold text-orange-500 text-xl my-2"> Hay un total de {{ $totalLideres }}
                    Lideres y {{ $totalVotantes }} Votantes </p>
                <div class=text-gray-900 dark:text-gray-100" style="position: relative; height:80vh; width:80vw">
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
        const url = 'http://quiet-atoll-97931.herokuapp.com/api/grafica';
        let consulta = await fetch(url);
        let respuesta = await consulta.json();
        console.log(respuesta)
        
        let puestos = respuesta.map(respuesta => respuesta.nombre);
        let totales = respuesta.map(respuesta => respuesta.total);

        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: puestos,
                datasets: [{
                    label: "Cantidad de votos por puesto de votacion",
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    data: totales
                }]
            },
            options: {
                responsive: true,
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

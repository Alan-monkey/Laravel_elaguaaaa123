<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas de Garrafones</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 300px;
            height: 200px;
            margin: auto;
            margin-bottom: 60px;
        }
    </style>
</head>
<body>
    
    <h1>Gráficas de Garrafones</h1>

    <div class="chart-container">
        <h2>Garrafones por Estado</h2>
        <canvas id="garrafonesEstadoChart"></canvas>
    </div>

    <div class="chart-container">
        <h2>Garrafones por Marca</h2>
        <canvas id="garrafonesMarcaChart"></canvas>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const garrafones = @json($garrafones);

            // Función para contar ocurrencias por campo
            function contarPorCampo(data, campo) {
                const counts = {};
                data.forEach(item => {
                    const valor = item[campo];
                    counts[valor] = (counts[valor] || 0) + 1;
                });
                return counts;
            }

            // Contar por estado y por marca
            const countsEstado = contarPorCampo(garrafones, 'estado');
            const countsMarca = contarPorCampo(garrafones, 'marca');

            // Función para obtener etiquetas y valores ordenados
            function obtenerDatosOrdenados(counts) {
                const entries = Object.entries(counts).sort((a, b) => a[0].localeCompare(b[0]));
                return {
                    labels: entries.map(entry => entry[0]),
                    dataValues: entries.map(entry => entry[1])
                };
            }

            const datosEstado = obtenerDatosOrdenados(countsEstado);
            const datosMarca = obtenerDatosOrdenados(countsMarca);

            // Función para crear una gráfica
            function crearGrafica(idCanvas, etiquetas, valores, etiqueta) {
                const ctx = document.getElementById(idCanvas).getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: etiquetas,
                        datasets: [{
                            label: etiqueta,
                            data: valores,
                            backgroundColor: 'rgba(75, 192, 192, 0.5)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // Crear las gráficas
            crearGrafica('garrafonesEstadoChart', datosEstado.labels, datosEstado.dataValues, 'Garrafones por Estado');
            crearGrafica('garrafonesMarcaChart', datosMarca.labels, datosMarca.dataValues, 'Garrafones por Marca');
        });
    </script>
</body>
</html>

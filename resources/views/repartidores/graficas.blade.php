<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas de Repartidores</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 600px;
            height: 500px;
            margin: auto;
        }
    </style>
</head>
<body>
    
    <h1>Gráfica de Repartidores por Apellido Paterno</h1>
    <div class="chart-container">
        <canvas id="repartidoresChart"></canvas>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const repartidores = @json($repartidores);

            // Contar cuántos repartidores hay por apellido paterno
            const counts = {};
            repartidores.forEach(rep => {
                counts[rep.App] = (counts[rep.App] || 0) + 1;
            });

            // Ordenar por apellido
            const sortedEntries = Object.entries(counts).sort((a, b) => a[0].localeCompare(b[0]));

            // Extraer etiquetas y valores ordenados
            const labels = sortedEntries.map(entry => entry[0]);
            const dataValues = sortedEntries.map(entry => entry[1]);

            // Crear la gráfica
            const ctx = document.getElementById('repartidoresChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Repartidores por Apellido Paterno',
                        data: dataValues,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
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
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas de Repartidores</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 66px;
            background: linear-gradient(135deg,rgb(44, 45, 48), #955aff, #955aff, #ffc623, #da4c4c, #da4c4c, #313235);
            background-size: 125%;
            animation: fanimado 10s infinite;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);

        }

        @keyframes fanimado {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%;
            }
        }

       
       :root {
           --primary-color:rgb(0, 0, 0);
           --primary-dark:rgb(154, 76, 218);
           --secondary-color: #12100e;
           --male-color: #007bff;
           --female-color:rgb(165, 59, 69);
       }

      nav {
   position: fixed;
   top: 0;
   left: 0;
   width: 100%;
   background-color: black; /* O el color que prefieras */
   z-index: 1000; /* Asegura que esté por encima de otros elementos */
   padding: 0px;
   box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra opcional para destacar */
       }

       nav img{
               max-width: 6%;
               height: auto;
               border-radius: 12px;
               margin-top: 2px;
               transition: transform 0.3s ease;
               padding: 6px;
               margin-left: 80px;
               margin-right: 50px;
               
       }

       nav a {
           color:rgb(182, 182, 182);
           text-decoration: none;
           padding: 0.8rem 1.5rem;
           margin: 0 0.5rem;
           border-radius: 25px;
           transition: all 0.3s ease;
           font-weight: 500;
           display: inline-block;
           position: relative;
           background: linear-gradient(135deg,rgba(255, 196, 35, 0.53),rgba(218, 76, 76, 0.53),rgba(25, 82, 255, 0.53),rgba(25, 82, 255, 0.53));
           background-size: 125%;
       }

       nav a:hover {
          
           color: #fff;
           transform: translateY(-2px);
           box-shadow: 0px 4px 6px rgba(25, 125, 255, 0.99);
           padding: 15px;
           text-align: center;
           position: sticky;
           top: 0;
           z-index: 1000;
           background: linear-gradient(135deg,rgba(255, 196, 35, 0.83),rgba(218, 76, 76, 0.84),rgba(25, 82, 255, 0.85),rgba(25, 82, 255, 0.8));
           background-size: 125%;

       }

       nav a::after {
           
           position: absolute;
           width: 0;
           height: 2px;
           bottom: 0;
           left: 50%;
           background-color: #fff;
           transition: all 0.3s ease;
           transform: translateX(-50%);
       }

       nav a:hover::after {
           width: 70%;
           content: "💧";
       }

       .table {
           box-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
           border-radius: 8px;
           overflow: hidden;
       }

       .table thead {
           background-color: var(--primary-color);
           color: white;
       }

       .btn {
           border-radius: 20px;
           padding: 0.4rem 1rem;
           margin: 0 0.2rem;
           transition: all 0.3s ease;
       }

       .btn:hover {
           transform: translateY(-2px);
       }
       
       h2 {
           color: var(--primary-color);
           margin: 2rem 0;
           font-weight: 600;
       }

       .gender-male {
           color: var(--male-color);
           font-weight: 500;
       }

       .gender-female {
           color: var(--female-color);
           font-weight: 500;
       }

       .gender-icon {
           margin-right: 0.5rem;
       }

       .btn-primary {
           background-color: var(--primary-color);
           border-color: var(--primary-color);
       }

       .btn-primary:hover {
           background-color: var(--primary-dark);
           border-color: var(--primary-dark);
       }

       .alert {
           border-radius: 15px;
           box-shadow: 0 2px 10px rgba(0,0,0,0.1);
       }

       @media (max-width: 768px) {
           nav {
               text-align: center;
               padding: 0.5rem;
           }
           
           nav a {
               display: block;
               margin: 0.5rem auto;
               padding: 0.5rem 1rem;
           }

           .table-responsive {
               margin-bottom: 1rem;
           }
       }
       .chart-container {
            width: 600px;
            height: 500px;
            margin: auto;
        }
   </style>
</head>
<body>
    
<nav>
<img src="{{ asset('storage/capibara2.jpeg') }}" alt="Evento con postres">

    <a href="{{ route('/welcome')}}" title="Inicio">Inicio</a>
    <a href="{{ route('/consultar-apiAdm')}}" title="Ver lista de Administradores">Administradores</a>
    <a href="{{ route('/consultar-apiCli')}}" title="Ver lista de Clientes">Clientes</a>
    <a href="{{ route('/consultar-apiGar')}}" title="Ver lista de Garrafones">Garrafones</a>
    <a href="{{ route('/consultar-apiCam')}}" title="Ver lista de Camionetas">Camionetas</a>
    <a href="{{ route('/consultar-api')}}" title="Ver lista de repartidores">Repartidores</a>


</nav>
<hr><hr><hr><hr>
    
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

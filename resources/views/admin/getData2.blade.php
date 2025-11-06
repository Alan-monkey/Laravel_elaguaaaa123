<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Detalle del Registro">
    <title>Detalle del Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
    
    </style>
</head>
<body>

    <div class="container mt-5">

        <h2 class="mb-4">
            <i class="bi bi-file-earmark-text"></i> Detalle del Registro
        </h2>

        <div class="card shadow-sm">
            <div class="card-header">
                <i class="bi bi-info-circle"></i>
                <strong>Información del Registro</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr><th><i class="bi bi-person-badge"></i> ID</th><td>{{ $data['id_administrador'] }}</td></tr>
                        <tr><th><i class="bi bi-person"></i> Nombre</th><td>{{ $data['nombre'] }}</td></tr>
                        <tr><th><i class="bi bi-person"></i> Telefono</th><td>{{ $data['telefono'] }}</td></tr>
                        <tr><th><i class="bi bi-card-text"></i> Username</th><td>{{ $data['username'] }}</td></tr>
                        <tr><th><i class="bi bi-calendar"></i> Email</th><td>{{ $data['correo'] }}</td></tr>
                        <tr><th><i class="bi bi-calendar"></i> Conreaseña</th><td>{{ $data['contraseña'] }}</td></tr>


                    </tbody>
                </table>
            </div>
        </div>

        <a href="{{ url('/consultar-apiAdm') }}" class="btn btn-secondary mt-3">
            <i class="bi bi-arrow-left"></i> Regresar
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

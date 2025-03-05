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
        :root {
            --primary-color:rgb(221, 52, 89);
            --primary-dark:rgb(154, 76, 218);
            --secondary-color: #12100e;
            --male-color: #007bff;
            --female-color:rgb(165, 59, 69);
        }

        h2 {
            color: var(--primary-color);
            margin: 2rem 0;
            font-weight: 600;
            animation: fadeIn 1s ease-in-out;
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.8s ease-in-out;
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-header i {
            font-size: 1.5rem;
        }

        .table {
            margin-bottom: 0;
            animation: fadeIn 1.2s ease-in-out;
        }

        .table th {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem;
        }

        .table td {
            vertical-align: middle;
            padding: 1rem;
        }

        .btn-secondary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            animation: fadeIn 1.5s ease-in-out;
        }

        .btn-secondary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Animaciones */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Efecto hover en filas de la tabla */
        .table tbody tr {
            transition: background-color 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        /* Efecto de sombra al pasar el mouse sobre la tarjeta */
        .card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease;
        }

        /* Estilo para el ícono de género */
        .gender-icon {
            font-size: 1.2rem;
            margin-right: 0.5rem;
        }

        .gender-male {
            color: var(--male-color);
        }

        .gender-female {
            color: var(--female-color);
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
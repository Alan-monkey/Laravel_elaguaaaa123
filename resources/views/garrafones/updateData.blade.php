<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Editar Registro">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: rgb(221, 52, 89);
            --primary-dark: rgb(221, 52, 89);
            --secondary-color: #12100e;
        }

        h2 {
            color: var(--primary-color);
            margin: 2rem 0;
            font-weight: 600;
            animation: fadeIn 1s ease-in-out;
        }

        .form-group {
            margin-bottom: 1.5rem;
            animation: slideIn 0.8s ease-in-out;
        }

        .form-group label {
            font-weight: 500;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 5px rgba(43, 65, 98, 0.3);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color:rgb(68, 65, 255);
            border-color: rgb(68, 65, 255);
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: rgb(68, 65, 255);
            border-color: rgb(68, 65, 255);
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            animation: fadeIn 0.8s ease-in-out;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
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
    </style>
</head>
<body>

    <div class="container mt-5">

        <h2 class="mb-4">
            <i class="bi bi-pencil-square"></i> Editar Registro
        </h2>

        <!-- Mostrar mensajes de éxito o error -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle-fill"></i>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de actualización -->
        <form action="{{ url('/actualizar-apiGar/' . $data['id_garrafon']) }}" method="POST">
            @csrf
            @method('PUT') <!-- Esto convierte el formulario en una solicitud PUT -->
            
            <div class="form-group">
                <label for="estado"><i class="bi bi-card-text"></i> Estado</label>
                <input type="text" class="form-control" name="estado" value="{{ $data['estado'] }}">
            </div>
            
            <div class="form-group">
                <label for="peso"><i class="bi bi-person"></i> Peso</label>
                <input type="text" class="form-control" name="peso" value="{{ $data['peso'] }}">
            </div>
            
            <div class="form-group">
                <label for="marca"><i class="bi bi-person"></i> Marca</label>
                <input type="text" class="form-control" name="marca" value="{{ $data['marca'] }}">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Actualizar
            </button>
            <a href="{{ url('/consultar-apiGar') }}" class="btn btn-secondary">
                <i class="bi bi-x-circle"></i> Cancelar
            </a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
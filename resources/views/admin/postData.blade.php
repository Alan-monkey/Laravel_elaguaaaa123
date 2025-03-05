<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formulario de Registro">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color:rgb(92, 45, 202);
            --primary-dark:rgb(154, 76, 218);
            --secondary-color: #12100e;
            --male-color: #007bff;
            --female-color:rgb(165, 59, 69);
        }

        body {
            background-color: #f8f9fa;
            animation: fadeIn 1s ease-in-out;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
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
            padding: 1.5rem;
            text-align: center;
        }

        .card-title {
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .form-label {
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

        .btn-dark {
            background-color: rgb(165, 59, 69);
            border-color: #343a40;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-dark:hover {
            background-color:rgb(100, 27, 27);
            border-color: #23272b;
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

    <div class="container">

        <div class="card shadow">
            <div class="card-header">
                <h1 class="card-title">
                    <i class="bi bi-person-plus"></i> Formulario de Registro
                </h1>
            </div>
            <div class="card-body">

                <!-- Mensaje de éxito o error -->
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

                <!-- Formulario de registro -->
                <form action="{{ route('enviar.datosAdm') }}" method="POST">
                    @csrf <!-- Protección CSRF -->

                    <div class="mb-3">
                        <label for="nombre" class="form-label">
                            <i class="bi bi-card-text"></i> Nombre
                        </label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">
                            <i class="bi bi-person"></i> Telefono
                        </label>
                        <input type="text" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">
                            <i class="bi bi-person"></i> User Name
                        </label>
                        <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="correo" class="form-label">
                            <i class="bi bi-calendar"></i> Email
                        </label>
                        <input type="text" class="form-control" name="correo" id="correo" value="{{ old('correo') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="contraseña" class="form-label">
                            <i class="bi bi-calendar"></i> Password
                        </label>
                        <input type="pasword" class="form-control" name="contraseña" id="contraseña" value="{{ old('contraseña') }}" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Registrar
                        </button>
                        <a href="{{ url('/consultar-apiAdm') }}" class="btn btn-dark">
                            <i class="bi bi-x-circle++"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

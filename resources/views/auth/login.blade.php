<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #1d1d1dff;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 800px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            border-radius: 4px;
            overflow: hidden;
            background: #fff;
        }

        .left {
            flex: 1;
            background-image: url("{{ asset('Backend/assets/img/cafeteria.jpeg') }}");
            background-size: cover;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .left h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .right {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #0d4b35ff;
            color: #ffffff;
        }

        .right h2 {
            margin-bottom: 20px;
            color: #ffffffff;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            padding: 12px;
            background: #00a86b;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        button:hover {
            background: #006341;
        }

        a {
            margin-top: 10px;
            text-decoration: none;
            color: #27a87bff;
            font-size: 14px;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <h1>Bienvenido</h1>
            <p>Ingresa a tu cuenta</p>
        </div>
        <div class="right">
            <h2>Iniciar sesión</h2>
            @if($errors->any())
                <p class="error">{{ $errors->first() }}</p>
            @endif
            <form method="POST" action="/login">
                @csrf
                <label>Email</label>
                <input type="email" name="email" required>

                <label>Contraseña</label>
                <input type="password" name="password" required>

                <button type="submit">Iniciar Sesión</button>
            </form>
            <a href="/register">¿No tienes cuenta? Regístrate</a>
        </div>
    </div>
</body>
</html>

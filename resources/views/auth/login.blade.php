<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Purificadora de Agua</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center text-blue-900">Purificadora de Agua</h2>
        <p class="text-gray-600 text-center">Inicia sesión para continuar</p>
        
        <form method="POST" action="{{ route('login') }}" class="mt-6">
            @csrf
            
            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-700">Correo Electrónico</label>
                <input id="email" type="email" name="email" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            
            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input id="password" type="password" name="password" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            
            <!-- Remember Me -->
            <div class="flex items-center mt-4">
                <input id="remember_me" type="checkbox" name="remember" class="mr-2">
                <label for="remember_me" class="text-gray-600">Recuérdame</label>
            </div>
            
            <!-- Botón de Login -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Iniciar Sesión</button>
            </div>
        </form>
        

        <!-- esta parte del codigo todavia no la entiedno muy vien pero al ingrezar los codigos para crear el login por
        medio de brezeers me creo el apartado de restarurar contraseña   -->
        <!-- Enlace para recuperar contraseña
        <div class="text-center mt-4">
            <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">¿Olvidaste tu contraseña?</a>
        </div> -->
    </div>
</body>
</html>

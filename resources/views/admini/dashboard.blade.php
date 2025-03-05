<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sensores de Agua</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">

    <aside class="w-64 bg-blue-900 text-white p-5 space-y-6">
            <h2 class="text-2xl font-bold">Admin Panel</h2>
            <nav>
                <ul class="space-y-4">
                    <li><a href="#" class="block py-2 px-4 bg-blue-700 rounded">Dashboard</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-blue-700 rounded">Sensores</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-blue-700 rounded">Alertas</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-blue-700 rounded">Usuarios</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <!-- <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link> -->
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit();" class="block py-2 px-4 hover:bg-red-700 rounded">Cerrar
                                sesión</a>

                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            <h1 class="text-3xl font-bold mb-5">Dashboard - Sensores de Agua</h1>

            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white p-5 rounded shadow">
                    <h2 class="text-xl font-bold">Sensores Activos</h2>
                    <p class="text-4xl font-bold text-blue-600">15</p>
                </div>
                <div class="bg-white p-5 rounded shadow">
                    <h2 class="text-xl font-bold">Alertas Hoy</h2>
                    <p class="text-4xl font-bold text-red-600">3</p>
                </div>
                <div class="bg-white p-5 rounded shadow">
                    <h2 class="text-xl font-bold">Usuarios Registrados</h2>
                    <p class="text-4xl font-bold text-green-600">42</p>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
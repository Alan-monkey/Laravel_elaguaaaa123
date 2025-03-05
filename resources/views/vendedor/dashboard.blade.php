<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Vendedor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-green-900 text-white p-5 space-y-6">
            <h2 class="text-2xl font-bold">Panel de Vendedor</h2>
            <nav>
                <ul class="space-y-4">
                    <li><a href="#" class="block py-2 px-4 bg-green-700 rounded">Dashboard</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-green-700 rounded">Productos</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-green-700 rounded">Ventas</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-green-700 rounded">Clientes</a></li>
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
            <h1 class="text-3xl font-bold mb-5">Dashboard - Vendedor</h1>

            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white p-5 rounded shadow">
                    <h2 class="text-xl font-bold">Productos en Stock</h2>
                    <p class="text-4xl font-bold text-green-600">120</p>
                </div>
                <div class="bg-white p-5 rounded shadow">
                    <h2 class="text-xl font-bold">Ventas Hoy</h2>
                    <p class="text-4xl font-bold text-blue-600">8</p>
                </div>
                <div class="bg-white p-5 rounded shadow">
                    <h2 class="text-xl font-bold">Clientes Registrados</h2>
                    <p class="text-4xl font-bold text-yellow-600">45</p>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
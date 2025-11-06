<!-- @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif -->



<!-- 
            <img src="{{ asset('Backend/assets/img/capibara2.jpeg') }}" alt="Evento con postres"> -->


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria - Coffe store</title>
    <script type="text/javascript">
        (function (c, l, a, r, i, t, y) {
            c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments) };
            t = l.createElement(r); t.async = 1; t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0]; y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "p7eqe5aggu");
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
    <style>
        /* Estilos generales */
        

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        header {

            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 10px;
            background: linear-gradient(135deg, #000000ff);
            background-size: 125%;
            animation: fanimado 15s infinite;
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

        /* Contenido del encabezado */
        .header-content {
            margin-bottom: 15px;
        }

        header h1 {
            font-size: 3rem;
            color: #f7f7f7ff;
            font-style: italic;
            /* Morado pastel */
        }

        .header-content p {
            color: #ffffffff;
            /* Morado pastel */
        }

        .slogan {
            font-size: 1.2rem;
            color: #fff;
            font-family: 'Georgia', serif;
            /* Elegancia clásica */
            margin: 5px 0 20px 0;
            font-style: italic;
        }

        /* Navegación */
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 30px;
            /* Separación entre elementos del menú */
        }

        nav ul li {
            position: relative;
        }

        nav ul li a {
            font-family: 'Montserrat', sans-serif;
            /* Fuente moderna y legible */
            font-size: 1.1rem;
            text-decoration: none;
            color: #fff;
            /* Gris oscuro para contraste */
            padding: 10px 20px;
            border-radius: 20px;
            background-color: #000000ff;
        }

        nav ul li a:hover {
            background-color: #206148ff;
            /* Morado pastel */
            color: #ffffff;
            transform: scale(1.1);
            /* Efecto de agrandamiento */
            box-shadow: 0 4px 10px rgba(104, 46, 147, 0.4);
            /* Sombra */
        }

        /* Efectos decorativos */
        nav ul li::before {
            content: "💧";
            /* Icono decorativo de pastel */
            position: absolute;
            left: -25px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        nav ul li:hover::before {
            opacity: 1;
            transform: translateY(-50%) scale(1.3);
            /* Aparece el ícono */
        }

        /* Responsividad */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                gap: 15px;
            }
        }



        section {
            padding: 50px 20px;
            text-align: center;
        }

        .inicio {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #206148ff;

        }

        .inicio .content {
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        @media (min-width: 768px) {
            .inicio .content {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                max-width: 1200px;
                width: 300%;
            }

            .inicio .text {
                flex: 1;
                text-align: left;
                padding-right: 20px;


            }

            .inicio img {
                max-width: 22%;
                height: auto;
                border-radius: 8px;
                margin-top: 20px;
                transition: transform 0.3s ease;
            }
        }

        .inicio img:hover {
            transform: scale(1.05);
        }

        .inicio h1,
        .inicio p {
            margin: 20px 0;
        }

        .inicio button {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .inicio button:hover {
            background-color: #555;
        }

        .services {

            color: rgba(241, 241, 241, 1);
            padding: 40px;
            background: linear-gradient(135deg,  #8f6035ff, #8f6035ff, #8f6035ff);
            background-size: 125%;
            animation: fanimado 12s infinite;
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

        .services h2 {
            color: #ffffffff;
            margin-bottom: 20px;
        }

        .services p {
            margin-bottom: 40px;
        }

        .services img {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 20px;
            transition: transform 0.3s ease;
        }

        .services img:hover {
            transform: scale(1.05);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        /* Galería Dulce */
        .gallery-dulce {
            padding: 50px 20px;
            background-color: #050404;
        }

        .gallery-dulce h2 {
            color: #fff;
            margin-bottom: 20px;
        }

        .gallery-dulce p {
            margin-bottom: 40px;
            color: #fff;
        }

        .gallery-dulce img {
            max-width: 100%;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .gallery-dulce img:hover {
            transform: scale(1.05);
        }

        /* Modal personalizado */
        .modal-img {
            width: 100%;
        }

        /* Efectos de transición para las imágenes */
        .gallery-dulce img,
        .services img {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
            width: 100%;
            /* Asegura tamaños uniformes */
        }

        .gallery-dulce img:hover,
        .services img:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }


        /* Servicios centrados y uniformes */


        /* Uniformidad en Galería Dulce */
        .gallery-dulce .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .gallery-dulce {
            padding: 40px 20px;
            text-align: center;
        }

        .gallery-dulce .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            justify-items: center;
        }

        .gallery-item {
            text-align: center;
            max-width: 300px;
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            object-fit: cover;
        }

        .gallery-item img:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .gallery-description {
            margin-top: 10px;
            font-size: 1rem;
            color: #fff;
        }

        /* Ajustar espaciado general de imágenes */
        .gallery-dulce .grid,
        .services .grid {
            padding: 0 20px;
            /* Agregar padding interno a los contenedores de las imágenes */
            max-width: 1200px;
            /* Limitar el ancho máximo de la galería para que no ocupe todo el espacio */
            margin: 0 auto;
            /* Centrar la galería en la página */
        }

        /* Espaciado adicional entre las imágenes */
        .gallery-item img,
        .services img {
            margin: 50px 0;
            /* Agregar margen vertical entre imágenes */
        }

        /* Ajustar el espaciado y alinear el texto */
        .gallery-description {
            margin-top: 10px;
            text-align: center;
        }

        /* Espaciado en la sección de inicio */
        .inicio .content {
            padding: 10px;
        }

        /* Espaciado del contenido adicional */
        .additional-info {
            padding: 40px 20px;
            padding: 40px;
            background: linear-gradient(135deg,  #8f6035ff, #8f6035ff, #8f6035ff);
            background-size: 125%;
            animation: fanimado 12s infinite;
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

        /* Espaciado en las imágenes de la sección servicios */
        .services img {
            margin-bottom: 50px;
            /* Separar imágenes en la sección de servicios */
        }

        /* Responsividad para pantallas pequeñas */
        @media (max-width: 768px) {

            .gallery-dulce .grid,
            .services .grid {
                padding: 0 4px;
                /* Reducir padding en pantallas pequeñas */
            }
        }



        .additional-info h2 {
            color: #000000;
        }

        .list .list-group-item {
            color: #f8f8f8;
            background-color: #000000;
        }
    </style>

</head>

<body>
    <header>
        <div class="header-content">
            <h1>Coffe store</h1>
            <p class="slogan">"Sistema de gestión de cafeteria"</p>

        </div>
        <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" style="font-family: 'Montserrat', sans-serif;
            /* Fuente moderna y legible */
            font-size: 1.1rem;
            text-decoration: none;
            color: #fff;
            /* Gris oscuro para contraste */
            padding: 10px 20px;
            border-radius: 20px;
            background-color: #1d1a1f;">
        Cerrar sesión
    </button>
</form>
        <hr>


        <nav>

        

<ul>
    <li><a href="{{ route('/carrito')}}">Carrito de compras</a></li>
    <li><a href="{{ route('/consultar-api')}}">Repartidores</a></li>
    <li><a href="{{ route('/consultar-apiAdm')}}">Administradores</a></li>
    <li><a href="{{ route('/consultar-apiCli')}}">Clientes</a></li>
        
</ul>
</nav>


    </header>

    <section id="inicio" class="inicio">
        <div class="content">
            <div class="text">
                <h1 style="color: white;">CoffeSoft </h1>

                <p style="color: white;">CoffeSoft una herramienta tecnológica 
                que permita automatizar los procesos principales de una cafetería, centralizando 
                la información en una plataforma digital moderna, segura y fácil de usar. De esta 
                necesidad surge CaféSoft, un sistema integral de gestión que busca optimizar la 
                operación diaria y mejorar la experiencia tanto del cliente como del 
                administrador.
                </p>
                <hr>
                
                <button>Contáctanos</button>

            </div>

            <img src="{{ asset('Backend/assets/img/CoffeSoft.jpeg') }}" alt="Evento con postres">
        </div>
    </section>
    <!-- Sección Servicios (ya con cambios) -->
    <section id="services" class="services">
        <h2>Enfoque Diferencial:</h2>
        <p>Nuestra fortaleza radica en la combinación de creatividad, conocimiento técnico y pasión por la tecnología.
            Nos destacamos
            por crear soluciones adaptadas a las necesidades de nuestros clientes, utilizando las últimas tendencias en
            software y hardware.</p>
        <div class="grid">
            <div class="gallery-item">

                <img src="{{ asset('Backend/assets/img/compu2.jpeg')}}" alt="Elia's Studios">
            </div>

            <div class="gallery-item">
                <img src="{{ asset('Backend/assets/img/compu.jpeg')}}" alt="UTVT">
            </div>
    </section>
    <!-- Sección Galería Dulce (modificada) -->
    <section class="gallery-dulce">
        <h2>Estamos ubicados en:</h2>
        <iframe width="600" height="400" style="border:0; border-radius:10px;" loading="lazy" allowfullscreen
            referrerpolicy="no-referrer-when-downgrade" src="https://maps.app.goo.gl/ACMr7dTa3cCoRsBR9">
        </iframe>
    </section>



    <!-- Información adicional -->
    <section class="additional-info" style="color: black;">
        <div class="container">
            <h2>Logros y Trayectoria:</h2>

            <ul class="list">
                <li class="list-group-item">- • Participación en proyectos de alto impacto en el área de IoT y
                    aplicaciones móviles.</li>
                <li class="list-group-item">- • Desarrollo de sistemas personalizados para clientes en diversos
                    sectores.</li>
                <li class="list-group-item">- • Reconocidos como una de las principales startups emergentes en nuestra
                    región.</li>

            </ul>
        </div>
    </section>
    <!-- Contacto -->
    <section id="contact" class="contact" style="background-color: #000000; color: white; padding: 40px 20px;">
        <div class="container">
            <h2>Contacto</h2>
            <p>¿Tienes alguna duda o pregunta? ¡Contáctanos!</p>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" placeholder="Tu nombre">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" placeholder="tu@correo.com">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="message" rows="3" placeholder="Tu mensaje"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </section>
    <script>
        function changeModalImage(src, alt) {
            document.getElementById('modalImage').src = src;
            document.getElementById('modalImage').alt = alt;
            document.getElementById('imageModalLabel').innerText = alt;
            document.getElementById('modalImageAlt').innerText = alt;
        }
    </script>
</body>

</html>
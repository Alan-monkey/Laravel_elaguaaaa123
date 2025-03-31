
<div class="main-sidebar sidebar-style-2" style="  background-color: #313235;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#" style="color:rgb(199, 211, 247);">Administrador</a>
        </div>

        <ul class="sidebar-menu">


            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Tablas</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('/consultar-api')}}">Repartidores</a></li>
                    <li><a href="{{ route('/consultar-apiAdm')}}">Administradores</a></li>
                    <li><a href="{{ route('/consultar-apiCli')}}">Clientes</a></li>
                    <li><a href="{{ route('/consultar-apiGar')}}">Garrafones</a></li>
                    <li><a href="{{ route('/consultar-apiCam')}}">Camionetas</a></li>
                </ul>
            </li>

    </aside>
</div>
<nav id="nav-solicitud" class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid pe-4">
        <!-- Navbar brand -->
        <a class="navbar-brand py-2 px-5" href="/">
            <img src="{{ asset('img/vector_petrel.svg') }}" alt="Logo Petrel" width="60">
        </a>
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Comienzo contenido a la derecha -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="MenuTest" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-tools mx-2"></i> Menú test
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="MenuTest">
                        <li><a class="dropdown-item" href="/solicitud">Listado solicitudes</a></li>
                        <li><a class="dropdown-item" href="/solicitud/create">Nueva solicitud</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/registro">Registrarse</a></li>
                        <li><a class="dropdown-item disabled" href="/usuario">Listado usuarios</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="MenuUsuario" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user mx-2"></i> {{ $usuarioActivo ?? 'Menú usuario' }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="MenuUsuario">
                        <li><a class="dropdown-item" href="/perfil">Mi perfil</a></li>
                        <li><a class="dropdown-item" href="/home#pregfrecuentes">Ayuda</a></li>
                        <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- Container wrapper -->
</nav>
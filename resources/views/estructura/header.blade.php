<nav id="nav-solicitud" class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid border-bottom border-3">
        <!-- Navbar brand -->
        <a class="navbar-brand py-2 px-3 px-lg-5" href="/">
            <img src="{{ asset('img/logo_petrel.svg') }}" alt="Logo Petrel" width="60">
        </a>
        <!-- Toggle button -->
        <button class="navbar-toggler my-2 mx-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Comienzo contenido a la derecha -->
        <div class="navbar-collapse justify-content-end collapse py-2 px-5 menu-nav" id="navbarSupportedContent">
            <ul class="nav navbar-nav">
                <li class="nav-item dropdown mb-3 mb-lg-0">
                    <a class="nav-link dropdown-toggle" href="#" id="MenuUsuario" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user mx-2"></i> {{ $usuarioActivo ?? 'Menú usuario' }} {{-- AQUÍ LLEVA EL NOMBRE DEL USUARIO LOGUEADO --}}
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

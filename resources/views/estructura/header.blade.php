<nav class="navbar fixed-top navbar-expand-md navbar-light bg-light"> <!-- Inicio encabezado -->
    <div class=container-fluid> <!-- Comienzo contenedor -->

        <a href="/" class="navbar-brand"><img src="{{ asset('img/icono_petrel.ico') }}" alt="Icono Petrel" style="max-height: 30px">Petrel</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MenuSuperior" aria-controls="MenuSuperior" aria-expanded="false" aria-label="Menú superior">
            <span class="navbar-toggler-icon"></span>
        </button> <!-- Fin botón desplegable en pantallas chicas-->

        <div class="collapse navbar-collapse" id="MenuSuperior"> <!-- Comienzo contenido menú -->
            <div class="d-flex align-items-end"> <!-- Comienzo contenido a la derecha -->
                
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                @if ($message = Session::get('success'))
                    <li class="nav-item">
                    <a class="nav-link" href="#">Mi cuenta</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="\index#faq">Ayuda</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Cerrar sesión</a>
                    </li>              
                @else
                <li class="nav-item">
                    <a class="nav-link" href="\login#faq">Iniciar Sesion</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="\register#faq">Registrarse</a>
                    </li>
                @endif
                </ul>
            </div> <!-- Fin contenido a la derecha -->
        </div> <!-- Fin contenido desplegable en pantallas chicas -->

    </div> <!-- Fin contenedor -->
</nav> <!-- Fin encabezado -->

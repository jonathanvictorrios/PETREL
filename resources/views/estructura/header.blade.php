<nav class="navbar sticky-md-top navbar-expand-md navbar-light bg-light"> <!-- Inicio encabezado -->
    <div class=container-fluid> <!-- Comienzo contenedor -->

        <a href="/" class="navbar-brand">
            <div class="border rounded-3 p-3" id=logoHeader>
                <img src="{{ asset('img/icono_petrel.ico') }}" alt="Icono Petrel" style="max-height: 30px"><span class="text-light">Petrel</span>
            </div>
        </a>


        <div class="d-flex"> <!-- Comienzo contenido a la derecha -->
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item dropdown">
                @if ($message = Session::get('success'))
                    <a class="nav-link dropdown-toggle" href="#" id="MenuTest" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-tools mx-2"></i> Menú test
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="MenuTest">
                        <li><a class="dropdown-item" href="\solicitud">Listado solicitudes</a></li>
                        <li><a class="dropdown-item" href="\solicitud\create">Nueva solicitud</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="\registro">Registrarse</a></li>
                        <li><a class="dropdown-item disabled" href="\usuario">Listado usuarios</a></li>
                    </ul>
                </li>
                @endif
                @if ($message = Session::get('success'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="MenuUsuario" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user mx-2"></i> {{ $usuarioActivo ?? 'Menú usuario' }}
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="MenuUsuario">
                        <li><a class="dropdown-item" href="#">Mi cuenta</a></li>
                        <li><a class="dropdown-item" href="\index#faq">Ayuda</a></li>
                        <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                        @else
                        <li><a class="dropdown-item" href="\login#faq">Iniciar</a></li>
                        <li><a class="dropdown-item" href="\register">Registro</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div> <!-- Fin contenido a la derecha -->

    </div> <!-- Fin contenedor -->
</nav> <!-- Fin encabezado -->

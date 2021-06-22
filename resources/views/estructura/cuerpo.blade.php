<main class="container p-2 shadow-lg" id=cuerpo> <!-- Inicio main cuerpo-->
    @include('estructura.header')
    <!-- Acá van botón back y título -->
    @yield('contenido')
    @include('estructura.footer')
</main> <!-- Fin main cuerpo -->

<!doctype html>
<!--
    Aplicación Petrel
    @author
    @link https://github.com/sebamon/BestoGroupLaravel
-->

<html lang="es_AR">
<head>
    <title>{{$titulo ?? 'Petrel'}}</title>
    <!-- Etiquetas meta requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="PWA 2021">
    <!-- Icono web -->
    <link rel="shortcut icon" href="{{ asset('img/icono_petrel.ico') }}">
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <!-- Estilos propios: -->
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <!-- Iconos de Font Awesome -->
    <script src="{{ asset('js/FontAwesome.js') }}" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
</head><!-- Fin cabecera -->

<body class="container my-3">

    <main class="container p-2 shadow-lg" id=cuerpo> <!-- Inicio main cuerpo-->
        @yield('cuerpo')
    </main> <!-- Fin main cuerpo -->


@include('estructura/footer')

<!-- Carga en orden JQuery (en header), Bootstrap+Popper -->
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- Carga scripts propios -->
<script src="{{ asset('js/confirmarSalir.js') }}"></script>
<script src="{{ asset('js/volverArriba.js') }}"></script>

<button class="btn btn-secondary shadow-sm" onclick="irArriba()" id="volverArriba" title="Volver arriba"><i class="fas fa-chevron-up"></i></button>
</body>
</html>

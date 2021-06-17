<!doctype html>
<!--
    Aplicación Petrel
    @author Programación Web Dinámica 2021 - UNCo
    @link https://github.com/PETREL-PWAUNCO2021/PETREL
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

    {{-- font-family tìtulo home --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">

    <!-- Iconos de Font Awesome -->
    <script src="{{ asset('js/FontAwesome.js') }}" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
</head><!-- Fin cabecera -->

<<<<<<< HEAD
<body class="container my-3">
@include('estructura/header')
    <main class="container p-2 shadow-lg" id=cuerpo> <!-- Inicio main cuerpo-->
        @yield('cuerpo')
    </main> <!-- Fin main cuerpo -->
=======

<body class="d-flex flex-column min-vh-100">
>>>>>>> f09a10bbe7623fa4eeb328d77ee2242ebcd87d94

    @yield('cuerpo')

@include('estructura/footer')

<!-- Carga en orden JQuery (en header), Bootstrap+Popper -->
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- Carga scripts propios -->
<script src="{{ asset('js/confirmarSalir.js') }}"></script>
<script src="{{ asset('js/volverArriba.js') }}"></script>

<button class="btn btn-secondary shadow-sm" onclick="irArriba()" id="volverArriba" title="Volver arriba"><i class="fas fa-chevron-up"></i></button>
</body>
</html>

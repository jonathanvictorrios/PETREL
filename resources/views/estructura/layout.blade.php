<!doctype html>
<!--
    Aplicación Petrel
    @author Programación Web Avanzada 2021 - UNCo
    @link https://github.com/PETREL-PWAUNCO2021/PETREL
-->

<html lang="es_AR">

<head>
    <title>{{$titulo ?? 'Petrel'}}</title>
    <!-- Etiquetas meta requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="PWA 2021">
    <!-- Icono web -->
    <link rel="shortcut icon" href="{{ asset('img/icono_petrel.ico') }}">
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- font-family tìtulo home --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">

    {{-- font-family título home --}}
    <!-- Iconos de Font Awesome -->
    <script src="{{ asset('js/FontAwesome.js') }}" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
</head><!-- Fin cabecera -->


<body class="d-flex flex-column">

    @yield('cuerpo')

    @include('estructura/footer')

    <!-- Carga en orden JQuery (en header), Bootstrap+Popper -->
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- Carga scripts propios -->
    <script src="{{ asset('js/volverArriba.js') }}"></script>

    <script src="{{ asset('js/formularios/selectUnidadAcademica.js') }}"></script>
    <script src="{{ asset('js/formularios/confirmarSalir.js') }}"></script>
    <script src="{{ asset('js/formularios/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/formularios/messages_es.min.js') }}"></script>
    <script src="{{ asset('js/formularios/validaciones.js') }}"></script>
    <script src="{{ asset('js/formularios/validarClave.js') }}"></script>

    <button class="btn btn-secondary shadow-sm" onclick="irArriba()" id="volverArriba" title="Volver arriba"><i
            class="fas fa-chevron-up"></i></button>
</body>

</html>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    
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

    <title>Estado de Solicitud</title>
</head>
<body>
    <!-- <img src="{{ url('img/logo_petrel-02.png') }}" alt="Logo Petrel"> -->
    <p>¡Hola, {{ $datosMail->Nombre }}!</p>
    <p>Tu solicitud de certificación de programas ha sido registrada con éxito.
        Podés consultar el estado de la solicitud cuando lo desees a partir del siguiente <a class="nav-link" href="{{'#'}}">link</a>
    </p>

    <ul>
        <li>Número de Solicitud: {{ $datosMail->idSolicitud }}</li>
        <li>Nombre y Apellido: {{ $datosMail->Nombre }} {{ $datosMail->Apellido }}</li>
        <li>Legajo: {{ $datosMail->Legajo }}</li>
        <li>Carrera: {{ $datosMail->Carrera }}</li>
        <li>Para presentar en: {{ $datosMail->UniversidadDestino }}</li>
    </ul>

    <p>Recibirás una notificación via email cuando el trámite haya finalizado.
        Atentamente,
        
        -- Petrel --
        Secretaría Académica 
        Universidad Nacional del Comahue.
        </p>
    <p>¡Saludos!</p>

    <a class="nav-link" href="{{'#'}}">Ingresar a Petrel</a>

</body>
</html>
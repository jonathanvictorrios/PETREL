<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Estado de Solicitud</title>
</head>
<body>
    <p>¡Hola! Queríamos avisarte que ya recibimos tu solicitud de certificación del programa de tu carrera.</p>
    <p>Estos son los datos registrados:</p>
    <ul>
        <li>Número de Solicitud: {{ $datosMail->Solicitud->idSolicitud }}</li>
        <li>Nombre y Apellido: {{ $datosMail->Usuario->Nombre }} {{ $datosMail->Usuario->Apellido }}</li>
        <li>Legajo: {{ $datosMail->Solicitud->Legajo }}</li>
        <li>Carrera: {{ $datosMail->Solicitud->Carrera }}</li>
        <li>Para presentar en: {{ $datosMail->Solicitud->UniversidadDestino }}</li>
    </ul>
    <p>Vamos a estar contactándote a la brevedad para enviarte más info. </p>
    <p>¡Saludos!</p>
</body>
</html>
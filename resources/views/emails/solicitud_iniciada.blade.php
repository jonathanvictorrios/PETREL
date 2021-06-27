<!doctype html>
<html lang="es">
<head>    
    <!-- Etiquetas meta requeridas -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="PWA 2021">
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://drive.google.com/file/d/175w_Y4UKOeIxz5EIEczIN4Q5PH_ra1Ug/view?usp=sharing" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    
    {{-- font-family tìtulo home --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">

    <title>Estado de Solicitud</title>
</head>
<body>
    <p>¡Hola, {{ $datosMail->Nombre }}!</p>
    <p>Tu solicitud de certificación de programas ha sido registrada con éxito bajo el número de solicitud {{ $datosMail->idSolicitud }}.
        Podés consultar el estado de la solicitud cuando lo desees a partir del siguiente <a class="nav-link" href="{{'#'}}">link</a>
    </p>

    <p>Recibirás una notificación via email cuando el trámite haya finalizado.</p>
    <p>Atentamente,</p>
    <div class="column">
    {{--  la imagen se carga desde un servidor externo a modo de prueba para que llegue correctamente al mail  --}}
    <img src="https://i.ibb.co/WtLKTy0/icono-petrel.png" alt="logo-petrel" border="0" height="54" width="54">
    </div>
    <div class="column">
    -- Petrel -- <br>
    Secretaría Académica<br> 
    Universidad Nacional del Comahue.
    </div>

</body>
</html>
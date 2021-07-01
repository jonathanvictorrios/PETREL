<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nota Admin Central</title>

    <style>
        body {
            font-size: medium;
        }

        @page {
            margin: 190px 120px;
        }

        header {
            position: fixed;
            left: 0px;
            top: -160px;
            right: 0px;
            height: 125px;

        }

        footer {
            position: fixed;
            left: 0px;
            bottom: -170px;
            right: 0px;
            height: 125px;

        }
    </style>
</head>

<body>

    <header>

        <p style="text-align: center;">
            <img height="65px" width="100%" src="img/logoteSecretariaAcademica.png" alt="logo-unco">
        </p>
        <p style="text-align: center; font-size: 16px; font-family:Arial, Helvetica, sans-serif;">
            Dirección General de Administración Académica
        </p>
        <p style="border-bottom: 1px solid;"></p>


    </header>

    <footer style="border-top: 1px solid; font-size: 12px; font-family:Arial, Helvetica, sans-serif;">

        <div>{!! $contenido_pie !!}</div>

    </footer>

    <main>

        <div style="font-size: 16px; font-family:'Times New Roman', Times, serif;">{!! $contenido_subencabezado !!}</div>
        <div style="font-size: 16px; font-family:'Times New Roman', Times, serif; text-align: justify;border-top: 1px solid;">{!! $contenido_principal !!}</div>

    </main>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alertas Petrel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rancho&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body style="text-align: center!important; font-family: 'Roboto', sans-serif;">
    <header>
        <p class="text-center" style="text-align: center; border-bottom: 1px solid #bbbbbb;">...</p>
    </header>
    <main>
        <table style="background-color: #2b5769; color: white;border-radius: 5px; margin: 0 auto; width: 50%;">
            <tr>
                <td>
                    <h1 style="font-family: 'Rancho', cursive; font-size: 5rem; font-weight: 300;">Petrel</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-style: italic; font-size: 1rem; padding: 10px;">El sistema de certificación de
                        materias
                        de la Universidad Nacional del Comahue</p>
                </td>
            </tr>
        </table>
        <table style="text-align: center; margin: 0 auto;">
            <tr>
                <td>
                    <h3 style="font-size: 2rem;">Nueva Solicitud Lista para Firmar</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        ¡Hola, {{ $datosMail->NombreUserU }}!
                    </p>
                    <p>
                        La solicitud registrada bajo el número {{ $datosMail->idSolicitud }}
                        se encuentra lista para ser firmada.<br>
                        Podés acceder al sistema desde el botón de abajo.
                    </p>
                    <p>Atentamente,</p>
                    <div class="column">
                        {{-- la imagen se carga desde un servidor externo a modo de prueba para que llegue correctamente al mail --}}
                        <img src="https://i.ibb.co/WtLKTy0/icono-petrel.png" alt="logo-petrel" border="0" height="54"
                            width="54">
                    </div>
                    <div class="column">
                        El equipo de Petrel<br>
                        Secretaría Académica<br>
                        Universidad Nacional del Comahue.
                    </div>
                </td>
            </tr>
            <tr>
                <td><a style="  background-color: #2b5769; border: none; color: white;
                padding: 10px; text-align: center; text-decoration: none; display: inline-block;
                font-size: 14px; border-radius: 5px;" href="{{ route('solicitud.store') }}">Ver Solicitud</a></td>
            </tr>
        </table>
    </main>
    <footer style="border-top: 1px solid #bbbbbb; margin-top: 10px;">
        <p style="padding: 10px; line-height: 10px; font-size: 12px;">© 2021 Universidad Nacional del Comahue</p>
    </footer>

</body>

</html>
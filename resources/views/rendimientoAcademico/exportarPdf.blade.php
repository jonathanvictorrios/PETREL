<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rendimiento Academico</title>

    <!-- Aca sacar el "cdn" y poner ruta completa de donde este almacenado el bootstrap.min.css -->

    <!--   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <style>
        body {
            font-size: medium;
        }

        @page {

            /* margin: 125px 75px;  */
            margin-top: 135px;
            margin-bottom: 50px;
            margin-right: 75px;
            margin-left: 75px;
        }

        header {
            position: fixed;
            left: 0px;
            top: -100px;
            right: 0px;
            height: 100px;

        }

        footer {
            position: fixed;
            left: 0px;
            bottom: -110px;
            right: 0px;
            height: 100px;

        }
    </style>
</head>

<body>

    <header>
        <table>
            <tbody>
                <tr>
                    <td rowspan="2"><img width="75px" height="75px" src="img/logo-azul-unc.png" alt="logo-unco"></td>
                    <td>{{$arregloRendimiento["UA"]["Universidad"]}} <br>
                        {{$arregloRendimiento["UA"]["Facultad"]}}
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <!-- <p style="border-bottom: 1px solid;"></p> -->
    </header>

    <footer>
        <div style="border-top: 1px solid; font-size: 12px; color:gray;">
            <p> <em>Rendimiento Académico</em> </p>
        </div>
    </footer>

    <main>

        <div>
            <div style="text-align: center;font-weight: bold;border-bottom:solid 1px grey;">
                <p>RENDIMIENTO ACADEMICO</p>
            </div>
            <div style="text-align: justify;">
                <p>Certifico que {{$arregloRendimiento["Alumno"]["Apellido"]}}, {{$arregloRendimiento["Alumno"]["Nombre"]}} - {{$arregloRendimiento["Documento"]["Tipo"]}}: {{$arregloRendimiento["Documento"]["Nro"]}}
                    Legajo Nro: {{$arregloRendimiento["Alumno"]["Legajo"]}} que cursa sus
                    estudios en la carrera {{$arregloRendimiento["Carrera"]}} Plan: {{$arregloRendimiento["Plan"]["Nro"]}}/{{$arregloRendimiento["Plan"]["Anio"]}}
                    ha cuarsado y aprobado las
                    siguientes asignaturas:
                </p>
            </div>

        </div>
        <table class="table mt-2" style="width:100%">
            <thead style="border: 1px solid gray;">
                <tr>
                    <th scope="col">Materia</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Calificación</th>
                    <th scope="col">L/R/E/P</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    @php
                    $anioMateria=$arregloRendimiento["Materias"][0]["Anio"];
                    @endphp
                    <td colspan="4">
                        <h6><u>{{$anioMateria}}</u></h6>
                    </td>
                </tr>

                @foreach ($arregloRendimiento["Materias"] as $item)
                @if ($item["Anio"]!=$anioMateria)
                @php
                $anioMateria=$item["Anio"];
                @endphp

                <tr>
                    <td colspan="4">
                        <h6><u>{{$anioMateria}}</u></h6>
                    </td>
                </tr>
                @endif

                <tr>
                    <td>{{$item['Materia']}}</td>
                    <td>{{$item['Fecha']}}</td>
                    <td>{{$item['Nota']}}</td>
                    <td>{{$item['CondicionAprobacion']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="text-align: justify;">
            <p>Promedio general de las materias aprobadas: {{$arregloRendimiento["Promedio"]}}</p>
            <p>Se extiende este certificado para su presentación ante las autoridadas que corresponda, en {{$arregloRendimiento["Lugar"]}} el {{$arregloRendimiento["FechaEmision"]}}.-
                El presente certificado carece de valor sin firma de esta Unidad Académica.
            </p>
            <p>
                Fecha ingreso a la carrera: {{$arregloRendimiento["FechaIngresoCarrera"]}}
            </p>
        </div>
        <table class="table table-borderless mt-5" style="width:100%;text-align: center">
            <tbody>
                <tr>
                    <td><img width="75px" height="75px" src="img/logito-fai.png" alt="firma_viviana"></td>
                    @if($arregloRendimiento["Secretaria"])<td><img width="75px" height="75px" src="img/logito-fai.png" alt="firma_sol"></td>@endif
                </tr>
                <tr style="font-weight: bold;">
                    <td>A/C. DEPTO ALUMNOS</td>
                    @if($arregloRendimiento["Secretaria"])<td>SECRETARIA ACADEMICA</td>@endif
                </tr>
                <tr style="font-weight: bold;">
                    <td><small>VIVIANA PEDRERO</small></td>
                    @if($arregloRendimiento["Secretaria"])<td><small>SILVIA AMARO</small></td>@endif
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>
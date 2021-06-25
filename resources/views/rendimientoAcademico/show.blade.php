<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Rendimiento Academico</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

         <!-- Estilos propios -->
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">

        <style>
            body {
                font-size: medium;
            }
        </style>
    </head>
    <body>
        <div class="container">
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
    <div>
        <p>Promedio general de las materias aprobadas: {{$arregloRendimiento["Promedio"]}}</p>
        <p>Se extiende este certificado para su presentacion ante las autoridadas que corresponda
            ,en {{$arregloRendimiento["Lugar"]}} el {{$arregloRendimiento["FechaEmision"]}}.-
            El presente certificado carece de valor sin firma de esta Unidad Academica
        </p>
        <p>
            Fecha ingreso a la carrera: {{$arregloRendimiento["FechaIngresoCarrera"]}}
        </p>
    </div>
    <table class="table table-borderless mt-5" style="width:100%;text-align: center">
        <tr>
            <td><img width="75px" height="75px" src="img/logito-fai.png" alt="firma_mariela"></td>
            <td><img width="75px" height="75px" src="img/logito-fai.png" alt="firma_sol"></td>
        </tr>
        <tr style="font-weight: bold;">
            <td>A/C. DEPTO ALUMNOS</td>
            <td>SECRETARIA ACADEMICA</td>
        </tr>
        <tr style="font-weight: bold;">
            <td><small>VIVIANA PEDRERO</small></td>
            <td><small>SILVIA AMARO</small></td>
        </tr>
    </table>

</div>

<div>
    <form action="{{ route('rendimientoAcademico.store') }}" method="POST" autocomplete="off">
        @csrf
        <input type="hidden" id="idSolicitud" name="idSolicitud" value={{$idSolicitud}}>
        <input type="hidden" id="rutaArchivo" name="rutaArchivo" value="{{$rutaArchivo}}">
        <div class="row clearfix">
            <div class="col-md-12 text-center">
                <input id="btn_crear-pdf" class="btn btn-primary m-2 font-weight-bold" name="btn_crear-pdf" type="submit" value="Crear PDF">
            </div>
            <table class="table mt-2" style="width:100%">
                <thead style="border: 1px solid gray;">
                    <tr>
                        <th scope="col">Materia</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Calificacion</th>
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
            <div>
                <p>Promedio general de las materias aprobadas: {{$arregloRendimiento["Promedio"]}}</p>
                <p>Se extiende este certificado para su presentacion ante las autoridadas que corresponda
                    ,en {{$arregloRendimiento["Lugar"]}} el {{$arregloRendimiento["FechaEmision"]}}.-
                    El presente certificado carece de valor sin firma de esta Unidad Academica
                </p>
                <p>
                    Fecha ingreso a la carrera: {{$arregloRendimiento["FechaEmision"]}}
                </p>
            </div>
            <table class="table table-borderless mt-5" style="width:100%;text-align: center">
                <tr>
                    <td><img width="75px" height="75px" src="img/logito-fai.png" alt="firma_mariela"></td>
                    <td><img width="75px" height="75px" src="img/logito-fai.png" alt="firma_sol"></td>
                </tr>
                <tr style="font-weight: bold;">
                    <td>A/C. DEPTO ALUMNOS</td>
                    <td>SECRETARIA ACADEMICA</td>
                </tr>
                <tr style="font-weight: bold;">
                    <td><small>VIVIANA PEDRERO</small></td>
                    <td><small>SILVIA AMARO</small></td>
                </tr>
            </table>
            <form action="{{ route('rendimientoAcademico.store') }}" method="POST" autocomplete="off">
                @csrf
                    <input type="hidden" id="idSolicitud" name="idSolicitud" value={{$idSolicitud}}>
                    <input type="hidden" id="rutaArchivo" name="rutaArchivo" value="{{$rutaArchivo}}">
                    <input type="submit" value="Crear PDF">
            </form>
            <div class="row p-3">
                <div class= "botonFormulario">
            <a  href="{{route('buscarProgramas',$idSolicitud)}}" >Siguiente</a>
        </div>
        </div>
    </div>
    </body>
</html>

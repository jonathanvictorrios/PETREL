@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<h1>Listado de carreras {{$carpetaAnio->numero_anio}}</h1>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>
                <a href="{{ route('crearCarpetaCarrera', $carpetaAnio->id_carpeta_anio) }}">
                    Crear una nueva carpeta carrera
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carpetaAnio->carpeta_carrera as $carrera)
            <tr>
                <td>{{ $carrera->carrera->carrera }}</td>
                <td>
                    <a href="{{ route('carrera.show', $carrera->id_carpeta_carrera) }}">Editar</a>
                </td>
                <td>
                    <a href=" {{ route('verProgramas',$carrera->id_carpeta_carrera) }} ">Ver programas</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
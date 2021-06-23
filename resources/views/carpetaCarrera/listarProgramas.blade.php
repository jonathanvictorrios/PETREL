@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<h1>{{$carpetaCarrera->carrera->carrera.' '.$carpetaCarrera->carpeta_anio->numero_anio }} </h1>
<table>
    <thead>
        <tr>
            <th>Numero</th>
            <th>Nombre</th>
            <th>Descarga</th>
            <th>Drive</th>
            <th><a href="{{ route('agregarPrograma', $carpetaCarrera->id_carpeta_carrera) }}">Agregar un programa</a></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carpetaCarrera->programa_drive as $programa)
            <tr>
                <td>{{ $programa->numero_programa }}</td>
                <td>{{ $programa->nombre_programa }}</td>
                <td><a href='https://drive.google.com/uc?id={{ $programa->url_programa }}&export=download'>@</a></td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

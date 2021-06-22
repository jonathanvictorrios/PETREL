@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<h1>Listado de años</h1>
<table>
    <thead>
        <tr>
            <th>Año</th>
            <th><a href="{{ route('anio.create') }}">Nueva Carpeta</a></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($colCarpetasAnio as $carpeta)
            <tr>
                <td>{{ $carpeta->numero_anio }}</td>
                <td><a href="{{ route('buscarCarreras',$carpeta->id_carpeta_anio) }}">ver carpeta</a></td>
                <td><a href="{{ route('anio.edit',$carpeta->id_carpeta_anio) }}">Modificar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
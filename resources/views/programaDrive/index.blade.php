@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<h1>Lista de Programas</h1>
<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th><a href=" {{ route('pdf') }} ">Crear pdf</a></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($colProgramas as $programa)
            <tr>
                <td>{{ $programa->numero_programa }}</td>
                <td>{{ $programa->nombre_programa }}</td>
                <td><a href='https://drive.google.com/uc?id={{ $programa->url_programa }}&export=download'> Descargar </a></td>
                <td><a href="{{ route('programa.show', $programa->id_programa) }}">Ver</a></td>
                <td><a href=" {{ route('programa.create') }} ">Crear</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

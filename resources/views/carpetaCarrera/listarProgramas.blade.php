@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Programas - Petrel')@endphp
@include('estructura/header')

@if (session('mensaje') ) {{-- Aviso de carpeta creada (u otra notificación desde controller) --}}
<div class="alert alert-success alert-dismissible fade show d-flex align-items-center m-3 p-3">
    <i class='fas fa-check-circle mx-2'></i>{{ session('mensaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h1>{{$carpetaCarrera->carrera->carrera.' '.$carpetaCarrera->carpeta_anio->numero_anio }} </h1>
<table>
    <thead>
        <tr>
            <th>Numero</th>
            <th>Nombre</th>
            <th>Descarga</th>
            <th><a href="{{ route('agregarPrograma', $carpetaCarrera->id_carpeta_carrera) }}">Agregar un programa</a>
            </th>
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
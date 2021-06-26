@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Archivo - Petrel')@endphp
@include('estructura/header')

@if (session('mensaje') ) {{-- Aviso de carpeta creada (u otra notificación desde controller) --}}
<div class="alert alert-success alert-dismissible fade show d-flex align-items-center m-3 p-3">
  <i class='fas fa-check-circle mx-2'></i>{{ session('mensaje') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

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

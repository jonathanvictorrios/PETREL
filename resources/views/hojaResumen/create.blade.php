@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Crear hoja resumen - Petrel')@endphp
@include('estructura/header')

<main class="p-2" id="cuerpo"> {{-- Inicio main cuerpo --}}
    <form action="{{ route('hojaResumen.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <input type="number" id="idSolicitud" name="idSolicitud">
        <input type="submit" value="enviar">
    </form>
</main> {{-- Fin main cuerpo --}}

@endsection

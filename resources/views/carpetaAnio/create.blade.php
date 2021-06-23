@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('anio.store') }}" method="POST" autocomplete="off">
    @csrf
    <h1>Creando una carpeta de año</h1>
    Año de para la nueva carpeta:
    <input type="number" id="anio" name="anio" value="{{ old('anio') }}">
    <input type="submit" value="enviar">
</form>

@endsection

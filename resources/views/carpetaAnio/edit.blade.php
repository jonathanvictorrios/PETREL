@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('anio.update', $carpetaAnio->id_carpeta_anio) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <h1>Modificando una carpeta de año</h1>
    @method('put')
    Carpeta año:
    <input type="number" id="anio" name="anio" value="{{ old('anio', $carpetaAnio->numero_anio) }}">
    <input type="submit" value="enviar">
</form>

@endsection
@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('programaDrive.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <h1>{{$carpetaCarrera->carrera->carrera.' '.$carpetaCarrera->carpeta_anio->numero_anio}}</h1>
    <input type="hidden" id="idCarpetaCarrera" name="idCarpetaCarrera" value="{{ $carpetaCarrera->id_carpeta_carrera }}">
        Nombre materia:<input type="text" id="nombrePrograma" name="nombrePrograma" value="{{ old('nombrePrograma') }}">
    <br>
        Numero materia:<input type="text" id="numeroPrograma" name="numeroPrograma" value="{{ old('numeroPrograma') }}">
    <br>
        Archivo:<input type="file" id="pdfPrograma" name="pdfPrograma" value="{{ old('pdfPrograma') }}">
    <br>
    <input type="submit" value="enviar">
</form>

@endsection
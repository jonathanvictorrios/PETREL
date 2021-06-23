@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('programa.update', $programa->id_programa) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <h1>{{$programa->numero_programa."-".$programa->nombre_programa}}</h1>
    @method('put')
    <input type="hidden" id="idProgramaDrive" name="idProgramaDrive" value="{{$programa->id_programa_drive}}">
    Nombre:<input type="text" id="nombre" name="nombre" value="{{ old('nombre', $programa->nombre_programa) }}">
    <br>
    Numero:<input type="number" id="numero" name="numero" value="{{ old('numero', $programa->numero_programa) }}">
    <br>
    <input type="submit" value="enviar">
</form>

@endsection

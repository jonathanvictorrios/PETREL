@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('programaLocal.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <h1>Seleccionar programas</h1>
    <input type="hidden" id="idSolicitud" name="idSolicitud" value="{{$idSolicitud}}">
    @foreach ($colProgramas as $programa)
        <input type="checkbox" name="urls[]" value="{{$programa->url_programa}}">
        <label>{{$programa->nombre_programa}}</label>
        <br>
    @endforeach
    <input type="submit" value="enviar">
</form>

@endsection
@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('programaLocal.update', $programaLocal->id_programa_local) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <h1>{{$programaLocal->url_programas}}</h1>
    @method('put')
    URL:<input type="text" id="url_programas" name="url_programas" value="{{ old('nombre', $programaLocal->url_programas) }}">
    <br>
    <input type="submit" value="enviar">
</form>

@endsection
@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('convertirExcel') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <h1>Cargar rendimiento academico</h1>
    <input type="hidden" id="idSolicitud" name="idSolicitud" value="{{rand(0,50)}}">
    <input type="file" id="excel" name="excel" value="{{ old('excel') }}">
    <input type="submit" value="enviar">
</form>

@endsection
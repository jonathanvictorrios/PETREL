@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('carrera.store') }}" method="POST" autocomplete="off">
    @csrf
    <p>Creando una carpeta carrera en año: {{$carpetaAnio->numero_anio}}</p>
    <input type="hidden" id="idCarpetaAnio" name="idCarpetaAnio" value="{{ $carpetaAnio->id_carpeta_anio }}">
    Nombre Carrera:
    <select id="idCarrera" name="idCarrera">
        <option value="">Elegir Carrera</option>
        @foreach ($carreras as $carrera)
            <option value="{{$carrera->id_carrera}}">{{$carrera->carrera}}</option>
        @endforeach
      </select>
    <input type="submit" value="enviar">
</form>

@endsection

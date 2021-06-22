@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<h1>Carpeta Año {{ $carpetaAnio->numero_anio }}</h1>
Url Carpeta <a href='https://drive.google.com/drive/folders/{{$carpetaAnio->url_anio}}?usp=sharing' target="_blank">Ver carpeta en google drive</a>
<br>
<a href=" {{ route('anio.index') }} ">Atras</a>
<br>
<a href=" {{ route('anio.edit', $carpetaAnio->id_carpeta_anio) }} ">Editar</a>
<br>
<form action="{{ route('anio.destroy', $carpetaAnio->id_carpeta_anio) }}" method="POST">
    @csrf
    @method('delete')
    <input type="submit" value="Eliminar">
</form>

@endsection
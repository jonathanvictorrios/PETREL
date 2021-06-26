@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Programa - Petrel')@endphp
@include('estructura/header')

<h1>{{ $programaDrive->numero_materia.' '.$programaDrive->nombre_programa }}</h1>
<a href=" {{ route('programaDrive.index') }} ">Volver al inicio</a>
<br>
<a href=" {{ route('programaDrive.edit', $programaDrive->id_programa) }} ">Editar</a>
<form action="{{ route('programaDrive.destroy', $programaDrive->id_programa) }}" method="POST">
    @csrf
    @method('delete')
    <input type="submit" value="Eliminar">
</form>

@endsection

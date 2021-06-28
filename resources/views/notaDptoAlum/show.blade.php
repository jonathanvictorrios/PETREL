@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Nota - Petrel')@endphp
@include('estructura/header')

<div class="container mt-5">
    <p class="text-center">
       <h2 class="m-2"> Nota Generada - {{ $id_nota }}</h2>
        <button type="button" class="botonFormulario" onclick="location.href='/notaDA/descargar/{{ $id_nota }}';">Descargar</button>
    </p>


</div>

@endsection

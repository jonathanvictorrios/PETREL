@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<div class="container mt-5">
    <p class="text-center h2">
        Nota Generada - {{ $id_nota }} 
        <button type="button" onclick="location.href='/notaDA/descargar/{{ $id_nota }}';">Descargar</button>
    </p>
    

</div>

@endsection
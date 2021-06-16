@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Petrel - Inicio')

@include('estructura/header')

<div class="portada card bg-light p-2"> <!-- Comienzo div placeholder -->
    <h1 class="display"><i class="fas fa-briefcase mx-2"></i>Petrel</h1>
    <hr class="my-2">
    <p class="lead">
        Puedes realizar tu solicitud de certificado para presentar en otras instituciones, de manera sencilla e intuitiva.<br>
        <br>
        Consejo para Ileana: Usar un div
    </p>
</div> <!-- Fin div placeholder -->

<div class="card bg-light p-2" style="height: 100vh"> <!-- Comienzo div placeholder -->
    <h1 class="display"><i class="fas fa-eye mx-2"></i>Placeholder</h1>
    <hr class="my-2">
    <p class="lead">
        Este div tiene tamaño 100vh para que haya scroll y se visualice el botón inferior derecho de volver arriba.
    </p>
</div> <!-- Fin div placeholder -->

@endsection

@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Petrel - Nota Administracion Central')@endphp

@include('estructura/header')

<div class="container shadow-lg mt-5 mb-5 pb-3 bg-light rounded col-8">

   

    <h4>ID Solicitud: {{$solicitud->id_solicitud}} </h4>

    <form action="{{ route('hojaResumenFinal.store') }}" method="POST" autocomplete="off">
        @csrf

        <div class="row">
            <div class="col-md-12">

                <input type="hidden" id="id_solicitud" name="id_solicitud" value="{{$solicitud->id_solicitud}}">
            </div>

            <div class="col-md-12 text-center">
                <input id="btn-crear-notaC" class="btn btn-primary m-2 font-weight-bold" name="btn-crear-notaC" type="submit" value="Generar NOTA CERTIFICACIÓN">
            </div>


        </div>

    </form>


    <!-- Boton con enlace de descarga -->
    <form action="{{ route('descargar-hoja-sin-firma') }}" method="POST" autocomplete="off">
        @csrf

        <div class="row">

            <input type="hidden" id="id_solicitud" name="id_solicitud" value="{{$solicitud->id_solicitud}}">

            <div class="col-md-12 text-center">
                <input id="btn-desc-sf" class="btn btn-outline-success m-2 font-weight-bold" name="btn-desc-sf" type="submit" value="Descargar DESCARGAR HOJA CERTIFICACIÓN SIN FIRMA">
            </div>         

        </div>

    </form>

</div>


@endsection
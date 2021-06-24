@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

@if($errors->any())
<div class="alert alert-danger mt-3 container" role="alert">
    {{ $errors->first() }}
</div>
@endif
<form id="formulario_nota" action="{{ route('planEstudio.store') }}" method="POST" class="container w-75 py-3 pb-5">
    @csrf
    <h2 class="text-center">Seleccionar Plan de Estudios</h2>
    
    @isset($url_ranquel)
    <div class="alert alert-dark" role="alert">
        Se encontró como posible plan el siguiente archivo:
        <a href="{{ $url_ranquel }}" target="_blank" rel="noopener noreferrer">{{ $url_ranquel }}</a>
    </div>
    @endisset

    <div class="alert alert-secondary w-50" role="alert">
        Información académica:
        <ul>
            @isset($plan_anio)      <li>Año de Ordenanza: <strong>{{ '20'.$plan_anio }}</strong></li>       @endisset
            @isset($plan_nro)       <li>Número de Ordenanza: <strong>{{ $plan_nro }}</strong></li>          @endisset
            @isset($plan_anio_mod)  <li>Año de Ordenanza Mod: <strong>{{ $plan_anio_mod }}</strong></li>    @endisset
            @isset($plan_nro_mod)   <li>Número de Ordenanza Mod: <strong>{{ $plan_nro_mod }}</strong></li>  @endisset
        </ul>
    </div>

    <div class="form-group">
        <label for="url_ranquel"><strong>Modifica la url si no es correcta.</strong></label>
        <input type="text" name="urlRanquel" id="url_ranquel" class="form-control" value="{{ $url_ranquel }}">
        <input type="file" name="filePdf" id="filePdf"> 
        
    </div>

    <div class="form-group mt-2 d-flex">
        
        <input type="hidden" name="id_solicitud" value="{{ $id_solicitud }}">
        <input type="button" value="Limpiar" onclick="document.getElementById('url_ranquel').value = ''" class="btn btn-secondary w-25 mx-2">
        <input type="submit" value="Confirmar y continuar" class="w-100 btn btn-primary">
    </div>
</form>

@endsection
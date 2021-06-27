@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Plan de estudios - Petrel')@endphp
@include('estructura/header')

@if($errors->any())
<div class="alert alert-danger mt-3 container" role="alert">
    {{ $errors->first() }}
</div>
@endif

@if(session('success'))
    <div class="alert alert-success mt-3 container">
        {{session('success')}}
    </div>
@endif

<form name="formulario_nota" id="formulario_nota" action="{{ route('planEstudio.store') }}" method="POST" class="container w-75 py-3 pb-5" novalidate>
    @csrf
    <h2 class="text-center">Seleccionar Plan de Estudios</h2>

    @isset($url_ranquel)
    <div class="alert alert-dark" role="alert">
        Se encontraron como posibles archivos las siguientes:
        <ul>
            @foreach ($url_ranquel as $url)
                <li><a href="{{ $url }}" target="_blank" rel="noopener noreferrer">{{ $url }}</a></li>
            @endforeach
        </ul>
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
        <label><strong>Modifica la url si no es correcta.</strong></label>
        <div id="inputs_contenedor">
            <input type="text" name="urlRanquel[]" class="form-control" value="{{ end($url_ranquel) }}" placeholder="Ingresa URL de archivo en Ranquel..">
        </div>
        <a onclick="agregarInput()" id="btn_nuevo_input">+ agregar otro</a>
    </div>

    <div class="form-group mt-4 d-flex">
        <input type="hidden" name="id_solicitud" value="{{ $solicitud->id_solicitud }}">
        <input type="button" value="Limpiar" onclick="document.getElementById('url_ranquel').value = ''" class="btn btn-secondary w-25">
        <input type="submit" value="Enviar" class="mx-2 w-100 btn btn-primary">
        <a href="{{ (session('success')) ? route('notaDA.crear',$solicitud->id_solicitud) : '#' }}" class="w-25 btn {{ (session('success')) ? 'btn-success' : 'btn-secondary disabled' }}">Continuar</a>
    </div>

</form>
<script>
    var contador_url = 1;
    function agregarInput() {
        if (contador_url < 3) {
            contador_url++;

            var input = document.createElement("input");
            input.type = "text";
            input.name = "urlRanquel[]";
            input.placeholder = "Ingresa URL de archivo en Ranquel..";
            input.className = "form-control mt-2";

            document.getElementById('inputs_contenedor').appendChild(input);
        }

        if (contador_url >= 3){
            document.getElementById('btn_nuevo_input').style = 'color: #777';
        }
    }
</script>

@endsection

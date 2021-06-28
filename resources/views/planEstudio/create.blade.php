@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Plan de estudios - Petrel')@endphp
@include('estructura/header')
<div class="container shadow-lg mt-5 mb-5 pb-3 bg-light rounded col-8">
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
<<<<<<< HEAD
    <h2 class="text-center cell p-3 m-3">Seleccionar Plan de Estudios</h2>
=======
    <h2 class="text-center">Seleccionar Plan de Estudios</h2>
>>>>>>> 73ab802e41cc97eae743c2daea0400097c258195

    @isset($url_ranquel)
    <div class="col-12">   
        Se encontraron como posibles archivos las siguientes:
        </div>
        <div class="col-12 alert alert-dark mb-5 overflow-hidden" role="alert">
        <ul>
            @foreach ($url_ranquel as $url)
            
                <li><div class="col"><a href="{{ $url }}" target="_blank" rel="noopener noreferrer">{{ $url }}</a>
            </div></li>
                @endforeach
        </ul>
    </div>
    @endisset
    <div class="col-12" >   
        Información académica:
        </div>
    <div class=" col-12 alert alert-secondary mb-5" role="alert">
       
        <ul>
            @isset($plan_anio) <li>Año de Ordenanza: <strong>{{ '20'.$plan_anio }}</strong></li> @endisset
            @isset($plan_nro) <li>Número de Ordenanza: <strong>{{ $plan_nro }}</strong></li> @endisset
            @isset($plan_anio_mod) <li>Año de Ordenanza Mod: <strong>{{ $plan_anio_mod }}</strong></li> @endisset
            @isset($plan_nro_mod) <li>Número de Ordenanza Mod: <strong>{{ $plan_nro_mod }}</strong></li> @endisset
        </ul>
    </div>

    <div class="form-group">
        <label class="text-center"><strong>Modifica la url si no es correcta.</strong></label>
        <div id="inputs_contenedor" class="">
            <input type="text" name="urlRanquel[]" class="form-control" value="{{ end($url_ranquel) }}" placeholder="Ingresa URL de archivo en Ranquel.">
        </div>
        <a class="agregarOtro" onclick="agregarInput()" id="btn_nuevo_input">+ agregar otro</a>
    </div>

    <div class="form-group mt-4 d-lg-flex">
        <input type="hidden" name="id_solicitud" value="{{ $solicitud->id_solicitud }}">
        <div class="col-12 col-lg-3  p-1">
            <input type="button" value="Limpiar" onclick="document.getElementById('url_ranquel').value = ''" class="btn botonFormulario2">
        </div>
        <div class="col-12 col-lg-6  p-1">
            <input type="submit" value="Enviar" class="btn botonFormulario">
        </div>
        <div class="col-12 col-lg-3  p-1">
            <a href="{{ (session('success')) ? route('notaDA.crear',$solicitud->id_solicitud) : '#' }}" class="btn {{ (session('success')) ? 'botonFormulario2' : 'botonFormulario2 disabled' }}">Continuar</a>
        </div>
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
}
</script>
</div>
@endsection

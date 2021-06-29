@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Seleccionar Programa - Petrel')@endphp
@include('estructura/header')
<div class="container shadow-lg mt-5 mb-5 p-3 bg-light rounded col-8">
<form action="{{ route('programaLocal.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @if ($errors->any()) {{-- Valida en servidor y regresa mostrando los siguientes errores --}}
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center m-3 p-3">
        <i class='fas fa-times-circle mx-2'></i><h5>Revisa los siguientes datos e inténtalo nuevamente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h2 class="text-center cell p-3 m-3">Seleccionar programas</h2>
    <div class="container p-3">
    <input type="hidden" id="idSolicitud" name="idSolicitud" value="{{$solicitud->id_solicitud}}">
    <h4 class="">Encontrados:</h4>    
    @foreach ($colProgramasEncontrados as $programa)
    <li> <input type="checkbox" name="urls[]" value="{{$programa->url_programa}}" checked>
        <label>{{$programa->nombre_programa}}</label></li>
        
    @endforeach
    <br>
    <h4>Sugerencias:</h4>
    @foreach ($colProgramasSugerencias as $colPrograma)
    <li>  <label class="me-2">{{($colPrograma[0])->nombre_programa}}</label>
        <select class="btn btn-sm botonFormulario3" name="urls[]">
        <option value="0">Elegir Año</option>
            @foreach ($colPrograma as $programa)
                <option value="{{$programa->url_programa}}">{{$programa->carpeta_carrera->carpeta_anio->numero_anio}}</option></li>
            @endforeach
        </select>
        <br>
    @endforeach
    <br>
    <h4>No encontrados:</h4>
    <input type="hidden" id="faltaProgramas" value="{{$faltaProgramas}}">
    @foreach ($colProgramasNoEncontrados as $programa)
       <li>  <label>{{$programa['Programa'].' '. $programa['Anio'] }}</label></li> 
       @endforeach 
       <br>
    
    <div class="row clearfix">
        <div class="form-group mt-4 d-lg-flex">
            <div class="col-12 col-lg-4  p-1">
                <input id="btn_crear-pdf" class="btn botonFormulario" name="btn_crear-pdf" type="submit" value="Crear PDF">
            </div>
            <div class="col-12 col-lg-4  p-1">
                <a href="{{ url('carpeta/anio')}}" id="faltaPrograma" class="btn botonFormulario2" >Cargar faltantes</a>
            </div>
            <div class="col-12 col-lg-4  p-1">
                <a href="{{route('crearPlanEstudio',$solicitud->id_solicitud)}}" id="botonContinuar" class="btn {{ (session('success')) ? 'botonFormulario2' : 'botonFormulario2 disabled' }}">Continuar</a>
            </div>
        </div>
    </div> 
</form>
</div>
</div>
<script>
    $pararTramite = document.getElementById('faltaProgramas').value;
    if($pararTramite){
        $("#faltaPrograma").removeClass("d-none");
        $("#btn_crear-pdf").addClass("d-none");
        $('#botonContinuar').addClass("d-none");
    }
    $('#btn_crear-pdf').on('click', function () {
        $('#botonContinuar').removeClass("disabled")
        $('#botonContinuar').removeClass("btn-secondary")
        $('#botonContinuar').addClass("btn-success")
    });
</script>

@endsection
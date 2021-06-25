@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('programaLocal.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <h1>Seleccionar programas</h1>
    <input type="hidden" id="idSolicitud" name="idSolicitud" value="{{$solicitud->id_solicitud}}">
    <h3>encontrados</h3>
    @foreach ($colProgramasEncontrados as $programa)
        <input type="checkbox" name="urls[]" value="{{$programa->url_programa}}" checked>
        <label>{{$programa->nombre_programa}}</label>
        <br>
    @endforeach
    <br>
    <h3>sugerencias</h3>
    @foreach ($colProgramasSugerencias as $colPrograma)
        <label>{{($colPrograma[0])->nombre_programa}}</label>
        <select name="urls[]">
        <option value="0">Elegir Año</option>
            @foreach ($colPrograma as $programa)
                <option value="{{$programa->url_programa}}">{{$programa->carpeta_carrera->carpeta_anio->numero_anio}}</option>
            @endforeach
        </select>
        <br>
    @endforeach
    <br>
    <h3>No encontradas</h3>
    @foreach ($colProgramasNoEncontrados as $programa)
        <label>{{$programa['Programa'].' '. $programa['Anio'] }}</label>
        <br>
    @endforeach
    <div class="row clearfix">
        <div class="col-md-6 text-center">
            <input id="btn_crear-pdf" class="btn btn-primary m-2 font-weight-bold" name="btn_crear-pdf" type="submit" value="Crear PDF">
        </div> 
        <div class="col-md-6 text-center">
            <a href="{{route('crearPlanEstudio',$solicitud->id_solicitud)}}" id="botonContinuar" class="w-25 btn btn-secondary disabled" >Continuar</a>
        </div> 
    </div> 
</form>
<script>
    $('#btn_crear-pdf').on('click', function () {
        $('#botonContinuar').removeClass("disabled")
        $('#botonContinuar').removeClass("btn-secondary")
        $('#botonContinuar').addClass("btn-success")
    });
</script>
@endsection
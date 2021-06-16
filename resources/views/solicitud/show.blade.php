@extends('estructura/layout')

@section('contenido')

<div class="row">
    <div class="col col-8">
        <label class="form-label" for="">Nombre:</label>
        <input type="text"  class='form-control' value='{{$solicitud->UsuarioEstudiante}}' disabled>
    </div>
    <div class="col col-4">
        <label class="form-label" for="">Estado Actual:</label>
        <input type="text"  class='form-control' value='{{$solicitud->UltimoEstado}}' disabled>
    </div>
</div>
<div class="row">
    <div class="col col-8">
    <label class="form-label" for="">Fecha Inicio</label>
    <input type="text" class='form-control' name='fechaInicio' value='{{$solicitud->Fecha}}' disabled>
    </div>
    <div class="col col-4">
    <label class="form-label" for="">Legajo</label>
    <input type="text" class='form-control' name='legajo' value='{{$solicitud->Legajo}}' disabled>
    </div>
</div>

<div class="row">
    <div class="col-col-12">
        <label class="form-label" for="">Universidad Destino</label>
        <input class='form-control' type="text" name='universidadDestino' value="{{$solicitud->UniversidadDestino}}" disabled>
    </div>
</div>

<div class="row">
<div class="col-col-12">
        <label class="form-label" for="">Unidad Academica</label>
        <input class='form-control' type="text" name="unidadAcademica" value='{{$solicitud->UnidadAcademica}}' disabled>
    </div>
</div>

<div class="row">
<div class="col-col-12">
        <label class="form-label" for="">Carrera</label>
        <input class='form-control' type="text" name='carrera' value='{{$solicitud->Carrera}}' disabled>
    </div>
</div>

<a href="{{route('solicitud.index')}}" class='btn btn-primary'>Volver</a>

@endsection



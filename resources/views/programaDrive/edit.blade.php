@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Petrel - Modificar programa')@endphp

@include('estructura/header')
<main class="p-2" id="cuerpo"> {{-- Inicio main cuerpo --}}
    <div class="container mt-3">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>

    {{-- inicio de modificar usuario --}}
    <div class="container-fluid mb-5 p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card card-form">
                    <div class="row tittle border-bottom p-2">
                        <h2 class="col text-center fw-bold">Modificar Programa</h2>
                    </div>
                    <form class="" action="{{ route('programa.update', $programa->id_programa) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col col-sm-6 flex-column d-flex py-3">
                                <label class="form-control-label py-2">Nombres Materia</label>
                                <input class="border-0 cell" type="text" id="nombre" name="nombre" value="{{ old('nombre', $programa->nombre_programa) }}">
                            </div>
                            @method('put')
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-control-label py-2">Numero Materia</label>
                                <input class="border-0 cell" type="number" id="numero" name="numero" value="{{ old('numero', $programa->numero_programa) }}">
                            </div>
                        </div>
                     
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-12 flex-column d-flex py-3">
                                <label class="form-control-label py-2">Archivo</label>
                                <input class="border-0 cell" type="file" id="pdfPrograma" name="pdfPrograma" value="{{ old('pdfPrograma') }}">
                               
                            </div>
                        </div>
                        
                        <div class="row justify-content-center text-center py-4">
                            <div class="form-group col col-sm-6">
                                <button id="boton" name="boton" type="submit" class="botonFormulario">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main> <!-- Fin main cuerpo -->

@endsection
{{-- @extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

<form action="{{ route('programa.update', $programa->id_programa) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <h1>{{$programa->numero_programa."-".$programa->nombre_programa}}</h1>
    @method('put')
    <input type="hidden" id="idProgramaDrive" name="idProgramaDrive" value="{{$programa->id_programa_drive}}">
    Nombre:<input type="text" id="nombre" name="nombre" value="{{ old('nombre', $programa->nombre_programa) }}">
    <br>
    Numero:<input type="number" id="numero" name="numero" value="{{ old('numero', $programa->numero_programa) }}">
    <br>
    <input type="submit" value="enviar">
</form>

@endsection

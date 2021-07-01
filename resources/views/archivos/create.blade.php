@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Nuevo archivo - Petrel')@endphp
@include('estructura/header')

{{-- Inicio main cuerpo --}}
<main class="p-2" id="cuerpo">
    <div class="container mt-3">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>

    {{-- inicio formulario seleccionar archivo --}}
    <div class="container-fluid mb-5 p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card card-form">
                    <div class="row p-2">
                        <h2 class="col text-center fw-bold">Nuevo Archivo</h2>
                    </div>
                    <form name="formArchivo" id="formArchivo" class="form-card" action="{{ route('archivos.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any()) {{-- Valida en servidor y regresa mostrando los siguientes errores --}}
                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center m-3 p-3">
                            <i class='fas fa-times-circle mx-2'></i>
                            <h5>Revisa los siguientes datos e inténtalo nuevamente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{-- seleccionar archivo --}}
                        <div class="row justify-content-between text-left">
                            {{-- <div class="form-group col col-12 flex-column d-flex pt-3">
                                <h6 class="col text-center fw-bold">Documento Firmado</h6>
                            </div> --}}
                        </div>
                        <div class="form-group col col col-12 flex-column d-flex py-3">
                            <input type="hidden" value="{{Request::get('dato')}}" name=" idSolicitud">
                            <input type="file" class="form-control" id="archivo" name="archivo">
                        </div>
                        <div class="row justify-content-center text-center py-4">
                            <div class="form-group col col-sm-6">
                                <button id="boton" name="boton" type="submit" class="botonFormulario">Guardar archivo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> {{-- fin formulario seleccionar archivo --}}
</main> {{-- Fin main cuerpo --}}

@endsection
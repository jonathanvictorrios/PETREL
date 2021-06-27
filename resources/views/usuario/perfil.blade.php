@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Mi perfil - Petrel')@endphp

@include('estructura/header')
<main class=p-2 id=cuerpo> {{-- Inicio main cuerpo --}}
    <div class="container">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>

{{-- inicio mostrar perfil --}}
<div class="container-fluid p-1 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11">

            <div class="card card-form bg-light">
                <div class="tittle card-header p-2 bg-light">
                    <h2 class="text-center fw-bold">Mi perfil</h2>
                </div>
                {{-- nombres y apellidos --}}
                <div class="row justify-content-between text-left cell">
                    <div class="form-group col-sm-6 flex-column d-flex py-3">
                        <label class="form-control-label py-2">Nombres</label>
                        <input type="text" name="nombre" id="nombre" class="form-control-plaintext border-0" value="{{ $usuario->nombre ?? 'Nombre' }}" readonly>
                    </div>
                    <div class="form-group col-sm-6 flex-column d-flex py-3">
                        <label class="form-control-label py-2">Apellidos</label>
                        <input type="text" name="apellido" id="apellido" class="form-control-plaintext border-0" value="{{ $usuario->apellido ?? 'Apellido' }}" readonly>
                    </div>
                </div>
                <div class="row justify-content-between text-left cell">
                    {{-- dni --}}
                    <div class="form-group col-sm-6 flex-column d-flex py-3">
                        <label class="form-control-label py-2">DNI</label>
                        <input type="number" name='dni' id="dni" class="form-control-plaintext border-0" value="{{ $usuario->dni ?? '11222333' }}" readonly>
                    </div>
                    {{-- email --}}
                    <div class="form-group col-sm-6 flex-column d-flex py-3">
                        <label class="form-control-label py-2">Correo electrónico</label>
                        <input type="text" name='email' id="email" class="form-control-plaintext border-0" value="{{ $usuario->email ?? 'ejemplo@example.com' }}" readonly>
                    </div>
                </div>
                <div class="row justify-content-center text-center py-4">
                    {{-- botón modificar --}}
                    <div class="form-group col-sm-6">
                        <a href="/perfil/modificar" id="botonPrimario" class="btn-block w-100 p-1 rounded-2">Modificar datos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- fin mostrar perfil --}}
</main> {{-- Fin main cuerpo --}}

@endsection

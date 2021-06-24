@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Registro de usuario - Petrel')@endphp

@include('estructura/header')
<main class="p-2" id="cuerpo"> {{-- Inicio main cuerpo --}}
    <div class="container mt-3">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>

        @if (session('mensaje') ) {{-- Mensaje final luego de submit --}}
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center m-3 p-3">
            <i class='fas fa-check-circle mx-2'></i>{{ session('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    {{-- inicio de registro de usuario --}}
    <div class="container-fluid mb-5 p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card card-form">
                    <div class="row tittle border-bottom p-2">
                        <h2 class="col text-center fw-bold">Registro de Usuario</h2>
                    </div>
                    <form name=formRegistro id=formRegistro action="" method=POST>
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
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col col-sm-6 flex-column d-flex py-3">
                                <label class="form-control py-2">Nombres</label>
                                <input class="border-0 cell" type="text" id="nombre" name="nombre" placeholder="Ingrese todos sus nombres" required>
                            </div>
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-control py-2">Apellidos</label>
                                <input class="border-0 cell" type="text" id="apellido" name="apellido" placeholder="Ingrese todos sus apellidos" required>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-control py-2">Email</label>
                                <input class="border-0 cell" type="text" id="email" name="email" placeholder="Ingrese su dirección de email" required>
                            </div>
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-control py-2">Número de Documento</label>
                                <input class="border-0 cell" type="number" id="dni" name="dni" placeholder="Ingrese su numero de DNI" required>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-control py-2">Contraseña</label>
                                <input class="border-0 cell" type="text" id="email" name="email" placeholder="Ingrese su dirección de email" required>
                            </div>
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-control py-2">Verificar Contraseña</label>
                                <input class="border-0 cell" type="text" id="dni" name="dni" placeholder="Ingrese su numero de DNI" required>
                            </div>
                        </div>

                        <div class="row justify-content-center text-center py-4">
                            <div class="form-group col col-sm-6">
                                <button id="boton" name="boton" type="submit" class="botonFormulario">Registrarse</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main> <!-- Fin main cuerpo -->

@endsection

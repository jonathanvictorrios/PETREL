@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Crear usuario - Petrel')@endphp

@include('estructura/header')
<main class="p-2" id="cuerpo"> {{-- Inicio main cuerpo --}}
    <div class="container mt-3">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>

    {{-- inicio de Crear usuario --}}
    <div class="container-fluid mb-5 p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card card-form">
                    <div class="row border-bottom p-2">
                        <h2 class="col text-center fw-bold">Nuevo Usuario</h2>
                    </div>
                    <form name=formRegistro id=formRegistro class=validarClave action="" method=POST novalidate>
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
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col col-sm-6 flex-column d-flex py-3">
                                <label class="form-label py-2">Nombres</label>
                                <input class="border-0 cell" type="text" id="nombre" name="nombre"
                                    placeholder="Ingrese todos los nombres">
                            </div>
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-label py-2">Apellidos</label>
                                <input class="border-0 cell" type="text" id="apellido" name="apellido"
                                    placeholder="Ingrese todos los apellidos">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-label py-2">Número de Documento</label>
                                <input class="border-0 cell" type="number" id="dni" name="dni" placeholder="Ingrese el numero de DNI" value="{{old('dni')}}">
                            </div>
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-label py-2">Rol</label>
                                <select class="form-select border-0 rounded-0 cell" aria-label="Default select example" id="rol" name="rol" value="{{old('rol')}}">
                                    {{-- @foreach($roles as $rol)
                                <option value="{{$rol->id_rol}}">{{$rol->rol}}</option>
                                    @endforeach
                                    --}}
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-12 flex-column d-flex py-3">
                                <label class="form-label py-2">Email</label>
                                <input class="border-0 cell" type="text" id="email" name="email" placeholder="Ingrese el dirección de email" value="{{old('email')}}">
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
</main> {{-- Fin main cuerpo --}}

@endsection
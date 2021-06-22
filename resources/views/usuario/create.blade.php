@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Petrel - Crear usuario')@endphp

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
                    <div class="row tittle border-bottom p-2">
                        <h2 class="col text-center fw-bold">Nuevo Usuario</h2>
                    </div>
                    <form class="">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col col-sm-6 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Nombres</label>
                                <input class="border-0 cell" type="text" id="nombre" name="nombre" placeholder="Ingrese todos los nombres">
                            </div>
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Apellidos</label>
                                <input class="border-0 cell" type="text" id="apellido" name="apellido" placeholder="Ingrese todos los apellidos">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Número de Documento</label>
                                <input class="border-0 cell" type="text" id="dni" name="dni" placeholder="Ingrese el numero de DNI">
                            </div>
                            <div class="form-group col col-sm-6 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Rol</label>
                                <select class="form-select border-0 rounded-0 cell" aria-label="Default select example" id="rol" name="rol">
                                    {{-- @foreach($roles as $rol)
                                <option value="{{$rol->id_rol}}">{{$rol->rol}}</option>
                                    @endforeach
                                    --}}
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col col-12 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Email</label>
                                <input class="border-0 cell" type="text" id="email" name="email" placeholder="Ingrese el dirección de email">
                            </div>
                            
                        </div>

                        <div class="row justify-content-center text-center py-4">
                            <div class="form-group col col-sm-6">
                                <button id="boton" name="boton" type="submit" class="btn-block w-100 p-1 rounded-2">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main> <!-- Fin main cuerpo -->

@endsection
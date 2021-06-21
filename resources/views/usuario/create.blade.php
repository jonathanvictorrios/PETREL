@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Petrel - Registro de usuario')

@include('estructura/header')
<main class=p-2 id=cuerpo> {{-- Inicio main cuerpo --}}
    <div class="container">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>

{{-- inicio de registro de usuario --}}
    <div class="container-fluid p-1 mx-auto">
        <div class="col d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11">
                <div class="card card-form bg-light">
                    <div class="tittle card-header p-2 bg-light">
                        <h2 class="text-center fw-bold">Registro de Usuario</h2>
                    </div>
                    <form class="">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Nombres</label>
                                <input class="border-0 cell" type="text" id="nombre" name="nombre" placeholder="Ingrese todos sus nombres">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Apellidos</label>
                                <input class="border-0 cell" type="text" id="apellido" name="apellido" placeholder="Ingrese todos sus apellidos">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Email</label>
                                <input class="border-0 cell" type="text" id="email" name="email" placeholder="Ingrese su dirección de email">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Numero de Documento</label>
                                <input class="border-0 cell" type="text" id="dni" name="dni" placeholder="Ingrese su numero de DNI" >
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Contraseña</label>
                                <input class="border-0 cell" type="text" id="email" name="email" placeholder="Ingrese su dirección de email">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Verificar Contraseña</label>
                                <input class="border-0 cell" type="text" id="dni" name="dni" placeholder="Ingrese su numero de DNI" >
                            </div>
                        </div>

                        <div class="row justify-content-center text-center py-4">
                            <div class="form-group col-sm-6">
                                <button id="boton" name="boton" type="submit" class="btn-block w-100 p-1 rounded-2">Registrarse</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{-- inicio de registro de usuario --}}
{{-- formulario de login
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11">
                <div class="card card-form">
                    <form class="">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Email</label>
                                <input class="border-0 cell" type="text" id="email" name="email" placeholder="Ingrese su email">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Contraseña</label>
                                <input class="border-0 cell" type="text" id="password" name="password" placeholder="Ingrese su contraseña">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <p><a href="">¿Olvido su contraseña?</a></p>
                        </div>
                        <div class="row justify-content-center text-center py-4">
                            <div class="form-group col-sm-6">
                                <button id="boton" name="boton" type="submit" class="btn-block w-100 p-1 rounded-2">Ingresar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</main> <!-- Fin main cuerpo -->

@endsection

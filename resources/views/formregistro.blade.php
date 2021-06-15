@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Petrel - Inicio')

@include('estructura/header')
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11">
                <div class="card">
                    {{-- <h5 class="text-center mb-1">Registro de Usuario</h5> --}}
                    <form class="form-card">
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
    
    @endsection
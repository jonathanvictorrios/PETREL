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
                                <label class="form-control-label px-3 py-2">Legajo</label>
                                <input class="border-0 cell" type="text" id="legajo" name="legajo" placeholder="Ingrese su legajo sin guion"> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Unidad Académica</label>
                                <select class="form-select border-0 rounded-0 cell" aria-label="Default select example">
                                    <option selected>Elija la Unidad Academica</option>
                                    <option value="1">Informática</option>
                                    <option value="2">Ciencias del Ambiente y la salud</option>
                                    <option value="3">Ingenieria</option>
                                  </select>
                                {{-- <input class="border-0 cell" type="text" id="email" name="email" placeholder="Ingrese su dirección de email">  --}}
                            </div>
                        </div>  
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex py-3">
                                <label class="form-control-label px-3 py-2">Carrera</label>
                                <select class="form-select border-0 rounded-0 cell" aria-label="Default select example">
                                    <option selected>Elija la carrera</option>
                                    <option value="1">Tecnicatura Universitaria en Desarrollo Web</option>
                                    <option value="2">Licenciatura en Ciencias de la Computación</option>
                                    <option value="3">Profesorado en Informática</option>
                                  </select>
                                {{-- <input class="border-0 cell" type="text" id="email" name="email" placeholder="Ingrese su dirección de email">  --}}
                            </div>
                        </div>   
                        <div class="row justify-content-between text-left ">
                            <div class="form-group col-12 flex-column d-flex py-3 ">
                                <label class="form-control-label px-3 py-2">Unidad de Destino</label>
                                <input class="border-0 cell" type="text" id="destino" name="destino" placeholder="Ingrese la universidad de destino"> 
                            </div>
                        </div>                    
                        
                        <div class="row justify-content-center text-center py-4">
                            <div class="form-group col-sm-6">
                                <button id="boton" name="boton" type="submit" class="btn-block w-100 p-1 rounded-2">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @endsection
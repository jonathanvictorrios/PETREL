@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Borrar usuario - Petrel')@endphp

@include('estructura/header')
<main class=p-2 id=cuerpo> <!-- Inicio main cuerpo -->
    <div class=container>
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>
{{-- inicion borrar usuario --}}
<div class="container-fluid p-1 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-12 col-12">

            <div class="card card-form bg-light">
                <div class="row tittle card-header p-2 bg-light">
                    <h2 class="col text-center fw-bold">Borrar Usuario</h2>
                </div>
                {{-- fecha y estado --}}
                <div class="row justify-content-between text-left cell">
                    <div class="form-group col col-sm-6 flex-column d-flex py-3">
                            <label class="form-control py-2">Fecha de Creación</label>
                            <input type="text" id="fecha" class="fecha border-0" value="" disabled>
                    </div>
                    <div class="form-group col col-sm-6 flex-column d-flex py-3">
                            <label class="form-control py-2">Estado</label>
                            <input type="text" id="estado" class="estado border-0" value='' disabled>
                    </div>
                </div>
                {{-- id, nombres y apellidos --}}
                <div class="row justify-content-between text-left cell">
                    <div class="form-group col col-sm-6 flex-column d-flex py-3">
                            <label class="form-control py-2">ID Usuario</label>
                            <input type="text" id="idusuario" class="border-0" value="" disabled>
                    </div>
                    <div class="form-group col col-sm-6 flex-column d-flex py-3">
                            <label class="form-control py-2">Nombres y apellidos</label>
                            <input type="text" id="nombre y apellido" class="border-0" value='' disabled>
                    </div>
                </div>
                 {{-- documento y rol  --}}
                <div class="row justify-content-between text-left cell">
                    <div class="form-group col col-sm-6 flex-column d-flex py-3">
                            <label class="form-control py-2">Documento de identidad</label>
                            <input type="number" id="dni" class="border-0" value="" disabled>
                    </div>
                    <div class="form-group col col-sm-6 flex-column d-flex py-3">
                            <label class="form-control py-2">Rol</label>
                            <input type="text" id="rol" class="border-0" value='' disabled>
                    </div>
                </div>
                {{-- email --}}
                <div class="row justify-content-between text-center cell">
                    <div class="form-group col col-12 flex-column d-flex py-3">
                            <label class="form-control py-2">Email</label>
                            <input type="text" id="email" class="border-0" value="" disabled>
                    </div>

                </div>
                <div class="row justify-content-center text-center py-4">
                    <div class="form-group col col-sm-6">
                        <button id="boton" name="boton" type="submit" class="botonFormulario">Borrar</button>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
{{-- fin mostrar usuario --}}

</main> <!-- Fin main cuerpo -->

@endsection

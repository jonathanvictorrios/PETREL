@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show User</h2>
        </div>
       <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('usuario.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
@extends('estructura/layout')

@section('cuerpo')
@php($titulo = 'Ver detalles usuario - Petrel')@endphp

@include('estructura/header')
<main class="p-2" id="cuerpo"> {{-- Inicio main cuerpo --}}
    <div class="container">
        <a href="{{url()->previous()}}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
    </div>
    {{-- inicion mostrar usuario --}}
    <div class="container-fluid p-1 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card card-form bg-light">
                    <div class="row card-header p-2 bg-light">
                        <h2 class="col text-center fw-bold">Detalles de Usuario</h2>
                    </div>
                    {{-- fecha y estado --}}
                    <div class="row justify-content-between text-left cell">
                        <div class="form-group col col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Fecha de Creación</label>
                            <input type="text" id="fecha" class="fecha border-0" value="" disabled>
                        </div>
                        <div class="form-group col col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Estado</label>
                            <input type="text" id="estado" class="estado border-0" value="" disabled>
                        </div>
                    </div>
                    {{-- id, nombres y apellidos --}}
                    <div class="row justify-content-between text-left cell">
                        <div class="form-group col col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">ID Usuario</label>
                            <input type="text" id="idusuario" class="border-0" value="" disabled>
                        </div>
                        <div class="form-group col col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Nombres y apellidos</label>
                            <input type="text" id="nombre y apellido" class="border-0" value="" disabled>
                        </div>
                    </div>
                    {{-- documento y rol  --}}
                    <div class="row justify-content-between text-left cell">
                        <div class="form-group col col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Documento de identidad</label>
                            <input type="number" id="dni" class="border-0" value="" disabled>
                        </div>
                        <div class="form-group col col-sm-6 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Rol</label>
                            <input type="text" id="rol" class="border-0" value="" disabled>
                        </div>
                    </div>
                    {{-- email --}}
                    <div class="row justify-content-between text-center cell">
                        <div class="form-group col col-12 flex-column d-flex py-3">
                            <label class="form-control-label px-3 py-2">Email</label>
                            <input type="text" id="email" class="border-0" value="" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- fin mostrar usuario --}}

</main> {{-- Fin main cuerpo --}}

@endsection
@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Nuevo archivo - Petrel')@endphp
@include('estructura/header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nuevo archivo</div>
                <div class="card-body">
                    <form action="{{ route('archivos.store') }}" method="post" enctype="multipart/form-data">
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
                        Image/File:
                        <br>
                        <input type="file" name="archivo" id="" required>
                        <br><br>
                        <input type="hidden" value="{{ Request::get('dato')}} " name=" idSolicitud">
                        <input type="submit" value="Guardar archivo" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

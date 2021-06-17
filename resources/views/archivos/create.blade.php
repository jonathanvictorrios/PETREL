@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Petrel')

@include('estructura/header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nuevo archivo</div>
                <div class="card-body">
                    <form action="{{ route('archivos.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        Image/File:
                        <br>
                        <input type="file" name="archivo" id="">
                        <br><br>
                        <input type="hidden" value="3" name="idSolicitud">
                        <input type="submit" value="Guardar archivo" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
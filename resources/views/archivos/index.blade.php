@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Petrel')

@include('estructura/header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('archivos.create') }}" class="btn btn-primary">Agregar nuevo archivo</a>
                    <br> <br>
                    <table class="table">
                        <tr>
                            <h4> Listado de solicitudes pendientes para firmar</h4>
                        </tr>
                        @forelse ($lista as $solicitud)
                        <tr>
                            <td>
                                <div>
                                </div>
                                Solicitud N°<b>{{ $solicitud->nombre }}</b>
                            </td>
                            <td class="d-flex align-items-center justify-content-center">
                                <a href="{{ route('archivos.download', $solicitud->id_solicitud) }}"><button
                                        class="btn btn-primary" target="_blank">DESCARGAR</button></a>
                                <a href="{{ route('archivos.show', $solicitud->id_solicitud) }}"><button
                                        class="btn btn-primary" target="_blank">VER ONLINE</button></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>No hay archivos</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
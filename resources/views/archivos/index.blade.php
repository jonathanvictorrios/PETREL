@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Archivo - Petrel')@endphp
@include('estructura/header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary disabled" href="{{ route('archivos.download',0) }}"
                        id="href-download">Descargar</a>
                    <a class="btn btn-primary disabled" href="{{ route('archivos.create', 'dato=0') }}"
                        id="href-carga-archivo">Adjuntar firmado</a>
                    <a class="btn btn-primary disabled" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        id="href-comentar">
                        Devolver a Dpto. Alumnos
                    </a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('archivos.cargarComentario',0) }}" method="get" id="formComentario">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Agregue un comentario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input class="border-0 cell" type="text" id="" name="comentarioSolicitud">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Comentar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br> <br>
                    <table class="table">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Nro Solicitud</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha de Inicio</th>
                            <th scope="col">Fecha ultima modificacion</th>
                            <th scope="col">Solicitante</th>
                        </tr>
                        @forelse ($lista as $solicitud)
                        <tr>
                            <td>
                                <input type="radio" name="seleccion" value="{{ $solicitud->id_solicitud }}"
                                    id="selectorSolicitud">
                            </td>
                            <td>
                                {{ $solicitud->id_solicitud}}
                            </td>
                            <td>
                                {{ "falta firma Santiago" }}
                            </td>
                            <td>
                                {{ $solicitud->descripcion }}
                            </td>
                            <td>
                                {{ $solicitud->updated_at }}
                            </td>
                            <td>
                                {{ $solicitud->nombre }} {{ $solicitud->apellido }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>No hay solicitudes</td>
                        </tr>
                        @endforelse
                    </table>
                    @if (session('mensaje') )
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center m-3 p-3">
                        <i class='fas fa-check-circle mx-2'></i>{{ session('mensaje') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

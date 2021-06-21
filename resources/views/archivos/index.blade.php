@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Petrel')

@include('estructura/header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary disabled" href="{{ route('archivos.show',0) }}" id="href-show">Ver mas</a>
                    <a class="btn btn-primary disabled" href="{{ route('archivos.create', 'dato=0') }}"
                        id="href-carga-archivo">Cargar
                        archivo</a>
                    <a class="btn btn-primary disabled" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        id="href-comentar">
                        Comentar
                    </a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('archivos.cargarComentario',0) }}" method="get" id="formComentario">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Agregar un comentario</h5>
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
                                {{ obtenerDescripcionEstado($solicitud->id_estado_descripcion) }}
                            </td>
                            <td>
                                03/03/2021
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
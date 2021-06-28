@extends('estructura/layout')
@section('cuerpo')
    @php($titulo = 'Ver detalles solicitud - Petrel')@endphp
    @include('estructura/header')

    <main class=p-2 id=cuerpo>
        {{-- Inicio main cuerpo --}}
        {{-- ---------------- ESTE ES EL SHOW DE ESTUDIANTE -------------------------------------- --}}
        <div class=container>
            <a href="{{ url()->previous() }}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
        </div>
        {{-- inicion mostrar solicitud --}}
        <div class="container-fluid p-1 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-12">
                    <div class="card card-form bg-light">
                        <div class="tittle card-header p-1 bg-light cell mb-3">
                            <h2 class="text-center fw-bold">Detalles de Solicitud {{ $solicitud->idSolicitud }}</h2>
                        </div>
                        {{-- fecha --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary fs-5">Fecha de Inicio: </span>
                                {{ $solicitud->FechaUltimoEstado }}
                            </p>
                        </div>
                        {{-- estado --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary fs-5">Estado: </span> en
                                progreso{{-- ACÀ DEBE IR ESTADO DE ESTUDIANTE{{$solicitud->UltimoEstado}}</p> --}}
                        </div>

                        {{-- nombres y apellidos --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary fs-5">Solicitante: </span>
                                {{ $solicitud->UsuarioEstudiante }}
                            </p>
                        </div>
                        {{-- legajo --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary fs-5">Legajo: </span> {{ $solicitud->Legajo }}</p>
                        </div>
                        {{-- unidad academica --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary fs-5">Unidad Académica: </span>
                                {{ $solicitud->UnidadAcademica }}
                            </p>
                        </div>
                        {{-- carrera --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary fs-5">Carrera: </span> {{ $solicitud->Carrera }}</p>
                        </div>
                        {{-- universidad de destino --}}
                        <div class="row justify-content-center text-left">
                            <p class=" "><span class="text-secondary fs-5">Institución Educativa de Destino: </span>
                                {{ $solicitud->UniversidadDestino }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        {{-- ---------------- ESTE ES EL SHOW DE ADMINISTRATIVO DEPTO ALUMNOS -------------------------------------- --}}
        <div class=container>
            <a href="{{ url()->previous() }}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
        </div>
        {{-- inicion mostrar solicitud --}}
        <div class="container-fluid p-1 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-12">
                    <div class="card card-form bg-light">
                        <div class="tittle card-header p-1 bg-light cell mb-3">
                            <h2 class="text-center fw-bold">Detalles de Solicitud {{ $solicitud->idSolicitud }}</h2>
                        </div>
                        {{-- fecha --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary fs-5">Fecha de Inicio: </span>
                                {{ $solicitud->FechaUltimoEstado }}
                            </p>
                        </div>
                        {{-- estado --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary fs-5">Estado: </span> Iniciado
                                {{-- ACÀ DEBE IR ESTADO DE SOLICITUD NO ASIGNACIÒN{{$solicitud->UltimoEstado}}
                        </p> --}}
                        </div>

                        {{-- nombres y apellidos --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary fs-5">Solicitante: </span>
                                {{ $solicitud->UsuarioEstudiante }}
                            </p>
                        </div>
                        {{-- legajo --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary fs-5">Legajo: </span> {{ $solicitud->Legajo }}</p>
                        </div>
                        {{-- unidad academica --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary fs-5">Unidad Académica: </span>
                                {{ $solicitud->UnidadAcademica }}
                            </p>
                        </div>
                        {{-- carrera --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary fs-5">Carrera: </span> {{ $solicitud->Carrera }}</p>
                        </div>
                        {{-- universidad de destino --}}
                        <div class="row justify-content-center text-left">
                            <p class=" "><span class="text-secondary fs-5">Institución Educativa de Destino: </span>
                                {{ $solicitud->UniversidadDestino }}
                            </p>
                        </div>
                        {{-- asignado a --}}
                        <div class="row justify-content-center text-left">
                            <div class="col-6">
                                <p class=" "><span class="text-secondary fs-5">Asignado a: </span> Viviana Pedrero
                                    {{-- ACÀ DEBE TOMAR EL NOMBRE DE PERSONA ASIGNADA --}}
                                </p>
                            </div>
                            <div class="col-6">
                                <button class=" botonFormulario">cambiar asignación </button>
                                {{-- ACÀ abre pag de asignaciòn o lo convertimos en un form con un select de admin? --}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid p-1 mx-auto"> {{-- Comienzo div Actividad (mostrar como acordeón) --}}
            <div class="tittle cp-1 cell my-3">
                <h2 class="text-center fw-bold">Actividad</h2>
            </div>
            <div id="tabla-estados">
                <table class="table table-borderless">
                    <thead class="border-bottom">
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Detalle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitud->Estados as $estado)
                            <tr>
                                <td>{{ $estado->created_at }}</td>
                                <td>{{ $estado->usuario->nombre }} {{ $estado->usuario->apellido }}</td>
                                <td>{{ $estado->estado_descripcion->descripcion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tittle cp-1 cell my-3">
                <h2 class="text-center fw-bold">Mensajes</h2>
            </div>
            <div id="tabla-comentarios">
                <table class="table table-borderless">
                    <thead class="border-bottom">
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Mensaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solicitud->comentarios as $comentario)
                            <tr>
                                <td>{{ $comentario->created_at }}</td>
                                <td>{{ $comentario->usuario->nombre }} {{ $comentario->usuario->apellido }}</td>
                                <td>{{ $comentario->descripcion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="#" class="botonFormulario" data-bs-toggle="modal" data-bs-target="#modalMensaje">
                    Nuevo mensaje
                </a>
                <!-- Modal -->
                <div class="modal fade" id="modalMensaje" tabindex="-1" aria-labelledby="modalMensajeLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLoginLabel">Nuevo Mensaje</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid px-1 py-5 mx-auto">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col">
                                            <div class="card card-form">
                                                <form class="" method="POST" action="{{ route('comentario.store') }}">
                                                    @csrf
                                                    <div class="row justify-content-between text-left">
                                                        <div class="form-group col-12 flex-column d-flex py-3">
                                                            <input class="border-0 cell" type="text" id="mensaje"
                                                                name="mensaje" placeholder="Ingrese el mensaje">
                                                            <input type="text" hidden id="idUsuario" name="idUsuario"
                                                                value="{{ $estado->usuario->id_usuario }}">
                                                            <input type="text" hidden id="idSolicitud" name="idSolicitud"
                                                                value="{{ $estado->id_solicitud }}">
                                                        </div>
                                                        <div class="row justify-content-center text-center py-4">
                                                            <div class="form-group col-sm-6">
                                                                <button id="boton" name="boton" type="submit"
                                                                    class="botonFormulario">Enviar mensaje</button>
                                                            </div>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- fin modal --}}
            <div class="row justify-content-center ">
                <div class="col-6 p-2 m-2">
                    {{-- ESTE FORM/BOTÒN DEBERIA SER VISIBLE SÒLO SI EL USUARIO ASIGNADO ES EL USUARIO LOGUEADO --}}
                    <form action="{{ route('hojaResumen.store') }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- aca voy a recibir el $idSolicitud , por ahora utilizo un input , luego este $idSolicitud estara en un campo oculto --}}
                        <input type="hidden" id="idSolicitud" name="idSolicitud" value="{{ $solicitud->idSolicitud }}">
                        <input type="submit" class="botonFormulario" value="comenzar trámite">
                    </form>
                </div>
            </div>
        </div> {{-- Fin div Actividad --}}
    </main> {{-- Fin main cuerpo --}}
@endsection

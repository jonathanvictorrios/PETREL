@extends('estructura/layout')
@section('cuerpo')
    @php($titulo = 'Ver detalles solicitud - Petrel')@endphp
    @include('estructura/header')

    <main class="p-2" id="cuerpo">
        {{-- Inicio main cuerpo --}}
        {{-- ---------------- ESTE ES EL SHOW DE ESTUDIANTE -------------------------------------- --}}
        {{-- <div class="container">
                    <a href="{{ route('solicitud.index' }}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
                </div>
                {{-- inicion mostrar solicitud --}}
        {{-- <div class="container-fluid p-1 mx-auto">
                    <div class="row d-flex justify-content-center  ">
                        <div class="col-md-8 col-12 ">
                            <div class="card card-form bg-light">
                                <div class="card-header p-1 bg-light cell mb-3 ">
                                    <h2 class="text-center fw-bold">Detalles de Solicitud {{ $solicitud->id_solicitud }}</h2>
                                </div>
                                {{-- fecha --}}
        {{-- <div class="row justify-content-between text-left ">
                                    <p class=" "><span class="text-secondary ">Fecha de Inicio: </span>
                                        {{ $solicitud->estados->first()->created_at }}
                                    </p>
                                </div> --}}
        {{-- estado --}}
        {{-- <div class="row justify-content-between text-left ">
                                    <p class=" "><span class="text-secondary ">Estado: </span>
                                        {{ $solicitud->estados->last()->estado_descripcion->descripcion }}
                                    </p>
                                </div> --}}

        {{-- nombres y apellidos --}}
        {{-- <div class="row justify-content-between text-left">
                                    <p class=" "><span class="text-secondary ">Solicitante: </span>
                                        {{ $solicitud->usuarioEstudiante->apellido }},
                                        {{ $solicitud->usuarioEstudiante->nombre }}
                                    </p>
                                </div> --}}
        {{-- legajo --}}
        {{-- <div class="row justify-content-between text-left ">
                                    <p class=" "><span class="text-secondary ">Legajo: </span> {{ $solicitud->legajo }}</p>
                                </div> --}}
        {{-- unidad academica --}}
        {{-- <div class="row justify-content-between text-left">
                                    <p class=" "><span class="text-secondary">Unidad Académica: </span>
                                        {{ $solicitud->carrera->unidad_academica->unidad_academica }}
                                    </p>
                                </div> --}}
        {{-- carrera --}}
        {{-- <div class="row justify-content-between text-left ">
                                    <p class=" "><span class="text-secondary">Carrera: </span> {{ $solicitud->carrera->carrera }}
                                    </p>
                                </div> --}}
        {{-- universidad de destino --}}
        {{-- <div class="row justify-content-center text-left">
                                    <p class=" "><span class="text-secondary">Institución Educativa de Destino: </span>
                                        {{ $solicitud->universidad_destino }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
        {{-- </div> --}}
        @if ($solicitud->estados->last()->estado_descripcion->descripcion == 'Iniciado' || $solicitud->estados->last()->estado_descripcion->descripcion == 'Aguarda Firma Departamento Alumnos' || $solicitud->estados->last()->estado_descripcion->descripcion == 'Asignado')
            {{-- ---------------- ESTE ES EL SHOW DE ADMINISTRATIVO DEPTO ALUMNOS -------------------------------------- --}}
            <div class="container">
                <a href="{{ url()->previous() }}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
            </div>
            {{-- inicion mostrar solicitud --}}
            <div class="container-fluid p-1 mx-auto">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 col-12">
                        <div class="card card-form bg-light">
                            <div class="card-header p-1 bg-light cell mb-3">
                                <h2 class="text-center fw-bold">Detalles de Solicitud {{ $solicitud->id_solicitud }}</h2>
                            </div>
                            {{-- fecha --}}
                            <div class="row justify-content-between text-left">
                                <p class=" "><span class="text-secondary">Fecha de Inicio: </span>
                                    {{ $solicitud->estados->first()->created_at }}
                                </p>
                            </div>
                            {{-- estado --}}
                            <div class="row justify-content-between text-left">
                                <p class=" "><span class="text-secondary">Estado: </span>
                                    {{ $solicitud->estados->last()->estado_descripcion->descripcion }}
                                </p>
                            </div>
                        {{-- nombres y apellidos --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary ">Solicitante: </span>
                                {{ $solicitud->usuarioEstudiante->apellido }},
                                {{ $solicitud->usuarioEstudiante->nombre }}
                            </p>
                        </div>
                        {{-- legajo --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Legajo: </span> {{ $solicitud->legajo }}</p>
                        </div>
                        {{-- unidad academica --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Unidad Académica: </span>
                                {{ $solicitud->carrera->unidad_academica->unidad_academica }}
                            </p>
                        </div>
                        {{-- carrera --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Carrera: </span> {{ $solicitud->carrera->carrera }}
                            </p>
                        </div>
                        {{-- universidad de destino --}}
                        <div class="row justify-content-center text-left">
                            <p class=" "><span class="text-secondary">Institución Educativa de Destino: </span>
                                {{ $solicitud->universidad_destino }}
                            </p>
                        </div>
                        {{-- asignado a --}}
                        <div class="row justify-content-center text-left">
                            <div class="col-12">
                                <p class=" "><span class="text-secondary">Solicitud asignada a: </span>
                                    {{ $solicitud->usuarioAdministrativo->apellido ?? '' }}
                                    {{ $solicitud->usuarioAdministrativo->nombre ?? '' }}</p>

                            </div>
                            {{-- fecha --}}
                            <div class="row justify-content-between text-left">
                                <p class=" "><span class="text-secondary">Fecha de Inicio: </span>
                                    {{ $solicitud->estados->first()->created_at }}
                                </p>
                            </div>
                            {{-- estado --}}
                            <div class="row justify-content-between text-left">
                                <p class=" "><span class="text-secondary">Estado: </span>
                                    {{ $solicitud->estados->last()->estado_descripcion->descripcion }}
                                </p>
                            </div>
                            {{-- nombres y apellidos --}}
                            <div class="row justify-content-between text-left">
                                <p class=" "><span class="text-secondary ">Solicitante: </span>
                                    {{ $solicitud->usuarioEstudiante->apellido }},
                                    {{ $solicitud->usuarioEstudiante->nombre }}
                                </p>
                            </div>
                            {{-- legajo --}}
                            <div class="row justify-content-between text-left ">
                                <p class=" "><span class="text-secondary">Legajo: </span> {{ $solicitud->legajo }}</p>
                            </div>
                            {{-- unidad academica --}}
                            <div class="row justify-content-between text-left ">
                                <p class=" "><span class="text-secondary">Unidad Académica: </span>
                                    {{ $solicitud->carrera->unidad_academica->unidad_academica }}
                                </p>
                            </div>
                            {{-- carrera --}}
                            <div class="row justify-content-between text-left ">
                                <p class=" "><span class="text-secondary">Carrera: </span>
                                    {{ $solicitud->carrera->carrera }}
                                </p>
                            </div>
                            {{-- universidad de destino --}}
                            <div class="row justify-content-center text-left">
                                <p class=" "><span class="text-secondary">Institución Educativa de Destino: </span>
                                    {{ $solicitud->universidad_destino }}
                                </p>
                            </div>
                            {{-- asignado a --}}
                            <div class="row justify-content-center text-left">
                                <div class="col-12">
                                    <p class=" "><span class="text-secondary">Solicitud Asignada a: </span>
                                        {{ $solicitud->usuarioAdministrativo->apellido ?? '' }}
                                        {{ $solicitud->usuarioAdministrativo->nombre ?? '' }}</p>
                                </div>
                                {{-- ACÀ DEBE TOMAR EL NOMBRE DE PERSONA ASIGNADA mostrarlo y guardarlo en base de datos --}}
                                {{-- dejo este select como muestra visual,
                                    hay que eliminarlo al hacer el real de arriba --}}

                                <form action="{{ route('solicitud.asignar', [$solicitud->id_solicitud]) }}" method="">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <select class="form-select botonFormulario3 " style="height:35px;"
                                                name="usuarioAdministrativo">
                                                <option value="0">Elegir Persona</option>
                                                <option value="1">Mario Domini</option>
                                                <option value="2">Rosa Piper</option>
                                                <option value="3">Catalina Blum</option>
                                                <option value="4">Ricardo Ford</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-12 pt-2 pt-lg-0">
                                            {{-- botòn que guarda en la base --}}
                                            <button type="submit" class="btn botonFormulario2">Asignar/Cambiar Asignación
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- Comienzo div Actividad (mostrar como acordeón) --}}
                            <div class="row d-flex justify-content-center">
                                <div class="col-12  p-2">
                                    <div class="accordion" id="acordeonComentarios">
                                        <div class="accordion-item mt-4">
                                            <button
                                                class="accordion-button collapsed justify-content-center botonAcordeonComentarios"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                <h2 class="text-center" id="headingOne"> Actividad </h2>
                                            </button>
                                            <div id="collapseOne" class="accordion-collapse collapse justify-content-center"
                                                aria-labelledby="headingOne" data-bs-parent="#acordeonComentarios">
                                                <div
                                                    class="accordion-body  d-flex justify-content-center acordeonComentarios">
                                                    <div class="table-responsive col-12 mx-3">
                                                        <h4 class="text-center fw-bold cell">Historial de Estados de la
                                                            Solicitud</h4>
                                                            <table
                                                            class="table table-striped table-hover align-middle table-borderless">
                                                            <thead class="border-bottom">
                                                                <tr>
                                                                    <th scope="col" class="p-2">Usuario</th>
                                                                    <th scope="col" class="p-2">Estado</th>
                                                                    <th scope="col" class="p-2">Fecha</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($solicitud->estados as $estado)
                                                                    <tr>
                                                                        <td class="p-2">
                                                                            {{ $estado->usuario->nombre ?? '' }}
                                                                            {{ $estado->usuario->apellido ?? '' }}</td>
                                                                        <td class="p-2">
                                                                            {{ $estado->estado_descripcion->descripcion }}
                                                                        </td>
                                                                        <td class="p-2">{{ $estado->created_at }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <h4 class="text-center fw-bold cell">Mensajes</h4>
                                                        <table
                                                            class="table table-striped table-hover align-middle table-borderless">
                                                            <thead class="border-bottom">
                                                                <tr>
                                                                    <th scope="col" class="p-2">Usuario</th>
                                                                    <th scope="col" class="p-2">Detalle</th>
                                                                    <th scope="col" class="p-2">Fecha</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($solicitud->comentarios as $comentario)
                                                                    <tr>
                                                                        <td class="p-2">
                                                                            {{ $comentario->usuario->nombre }}
                                                                            {{ $comentario->usuario->apellido }}</td>
                                                                        <td class="p-2">{{ $comentario->descripcion }}
                                                                        </td>
                                                                        <td class="p-2">{{ $comentario->created_at }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <a href="#" class="btn botonFormulario2" data-bs-toggle="modal"
                                                            data-bs-target="#modalMensaje">
                                                            Nuevo Mensaje
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalMensaje" tabindex="-1"
                                                            aria-labelledby="modalMensajeLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalLoginLabel">Nuevo
                                                                            Mensaje</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid px-1 py-5 mx-auto">
                                                                            <div class="row d-flex justify-content-center">
                                                                                <div class="col">
                                                                                    <div class="card card-form">
                                                                                        <form class="" method="POST"
                                                                                            action="{{ route('comentario.store') }}">
                                                                                            @csrf
                                                                                            <div
                                                                                                class="row justify-content-between text-left">
                                                                                                <div
                                                                                                    class="form-group col-12 flex-column d-flex py-3">
                                                                                                    <input
                                                                                                        class="border-0 cell"
                                                                                                        type="text"
                                                                                                        id="mensaje"
                                                                                                        name="mensaje"
                                                                                                        placeholder="Ingrese el mensaje">
                                                                                                    <input type="text"
                                                                                                        hidden
                                                                                                        id="idUsuario"
                                                                                                        name="idUsuario"
                                                                                                        value="{{ $solicitud->estados->last()->id_usuario ?? '' }}">
                                                                                                    <input type="text"
                                                                                                        hidden
                                                                                                        id="idSolicitud"
                                                                                                        name="idSolicitud"
                                                                                                        value="{{ $solicitud->id_solicitud }}">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="row justify-content-center text-center py-4">
                                                                                                    <div
                                                                                                        class="form-group col-sm-6">
                                                                                                        <button id="boton"
                                                                                                            name="boton"
                                                                                                            type="submit"
                                                                                                            class="botonFormulario">Enviar
                                                                                                            mensaje</button>
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
                                                        {{-- fin modal --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> {{-- Fin div Actividad --}}
                                <div class="row justify-content-center">
                                    <div class="col-12 mt-2 p-2 ">
                                        {{-- ESTE FORM/BOTÒN DEBERIA SER VISIBLE SÒLO SI EL USUARIO ASIGNADO ES EL USUARIO LOGUEADO --}}
                                        @if ($iniciarTramite == -1)
                                            <form action="{{ route('hojaResumen.store') }}" method="POST"
                                                autocomplete="off">
                                                @csrf
                                                {{-- aca voy a recibir el $idSolicitud , por ahora utilizo un input , luego este $idSolicitud estara en un campo oculto --}}
                                                <input type="hidden" id="idSolicitud" name="idSolicitud"
                                                    value="{{ $solicitud->id_solicitud }}">
                                                <input type="submit" class="botonFormulario" value="Comenzar Trámite">
                                            </form>
                                        @elseif($iniciarTramite==0)
                                            <form action="{{ route('continuarTramite') }}" method="POST"
                                                autocomplete="off">
                                                @csrf
                                                {{-- aca voy a recibir el $idSolicitud , por ahora utilizo un input , luego este $idSolicitud estara en un campo oculto --}}
                                                <input type="hidden" id="idSolicitud" name="idSolicitud"
                                                    value="{{ $solicitud->id_solicitud }}">
                                                <input type="submit" class="botonFormulario" value="Continuar Trámite">
                                            </form>
                                        @else
                                            <button type="button" class="botonFormulario">Trámite Finalizado</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ---------------- ESTE ES EL SHOW DE SECRETARIA -------------------------------------- --}}
        @elseif($solicitud->estados->last()->estado_descripcion->descripcion=='Aguarda Firma Secretaría Académica')
            <div class="container">
                <a href="{{ url()->previous() }}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
            </div>
            {{-- inicion mostrar solicitud --}}
            <div class="container-fluid p-1 mx-auto my-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 col-12">
                        <div class="card card-form bg-light">
                            <div class="card-header p-1 bg-light cell mb-3">
                                <h2 class="text-center fw-bold">Detalles de Solicitud {{ $solicitud->id_solicitud }}</h2>
                            </div>
                            {{-- fecha --}}
                            <div class="row justify-content-between text-left ">
                                <p class=" "><span class="text-secondary">Fecha de Inicio: </span>
                                    {{ $solicitud->estados->first()->created_at }}
                                </p>
                            </div>
                            {{-- estado --}}
                            <div class="row justify-content-between text-left ">
                                <p class=" "><span class="text-secondary">Estado: </span>
                                    {{ $solicitud->estados->last()->estado_descripcion->descripcion }}
                                </p>
                            </div>
                            {{-- nombres y apellidos --}}
                            <div class="row justify-content-between text-left">
                                <p class=" "><span class="text-secondary">Solicitante: </span>
                                    {{ $solicitud->usuarioEstudiante->apellido }},
                                    {{ $solicitud->usuarioEstudiante->nombre }}
                                </p>
                            </div>
                            {{-- legajo --}}
                            <div class="row justify-content-between text-left ">
                                <p class=" "><span class="text-secondary">Legajo: </span> {{ $solicitud->legajo }}</p>
                            </div>
                            {{-- unidad academica --}}
                            <div class="row justify-content-between text-left">
                                <p class=" "><span class="text-secondary">Unidad Académica: </span>
                                    {{ $solicitud->carrera->unidad_academica->unidad_academica }}
                                </p>
                            </div>
                            {{-- carrera --}}
                            <div class="row justify-content-between text-left ">
                                <p class=" "><span class="text-secondary">Carrera: </span>
                                    {{ $solicitud->carrera->carrera }}
                                </p>
                            </div>
                            {{-- universidad de destino --}}
                            <div class="row justify-content-center text-left">
                                <p class=" "><span class="text-secondary">Institución Educativa de Destino: </span>
                                    {{ $solicitud->universidad_destino }}
                                </p>
                            </div>
                            {{-- Comienzo div Actividad (mostrar como acordeón) --}}
                            <div class="row d-flex justify-content-center">
                                <div class="col-12  p-2">
                                    <div class="accordion" id="acordeonComentarios">
                                        <div class="accordion-item mt-4">
                                            <button
                                                class="accordion-button collapsed justify-content-center botonAcordeonComentarios"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                <h2 class="text-center" id="headingOne"> Actividad </h2>
                                            </button>
                                            <div id="collapseOne" class="accordion-collapse collapse justify-content-center"
                                                aria-labelledby="headingOne" data-bs-parent="#acordeonComentarios">
                                                <div
                                                    class="accordion-body  d-flex justify-content-center acordeonComentarios">
                                                <div class="table-responsive col-12 mx-3">
                                                    <h4 class="text-center fw-bold cell">Historial de Estados de la
                                                        Solicitud</h4>
                                                    <table
                                                        class="table table-striped table-hover align-middle table-borderless">
                                                        <thead class="border-bottom">
                                                            <tr>
                                                                <th scope="col" class="p-2 text-center">Fecha</th>
                                                                <th scope="col" class="p-2 text-center">Usuario</th>
                                                                <th scope="col" class="p-2 text-center">Estado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($solicitud->estados as $estado)
                                                            <tr>
                                                                <td class="p-2">{{ $estado->created_at }}</td>
                                                                <td class="p-2">{{ $estado->usuario->nombre ?? ''}} {{ $estado->usuario->apellido ?? ''}}</td>
                                                                <td class="p-2">{{ $estado->estado_descripcion->descripcion }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <h4 class="text-center fw-bold cell">Mensajes</h4>
                                                    <div class="table-responsive col-12 mx-3">
                                                        <h4 class="text-center fw-bold cell">Historial de Estados de la
                                                            Solicitud</h4>
                                                            <table
                                                            class="table table-striped table-hover align-middle table-borderless">
                                                            <thead class="border-bottom">
                                                                <tr>
                                                                    <th scope="col" class="p-2">Usuario</th>
                                                                    <th scope="col" class="p-2">Estado</th>
                                                                    <th scope="col" class="p-2">Fecha</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($solicitud->estados as $estado)
                                                                    <tr>
                                                                        <td class="p-2">
                                                                            {{ $estado->usuario->nombre ?? '' }}
                                                                            {{ $estado->usuario->apellido ?? '' }}</td>
                                                                        <td class="p-2">
                                                                            {{ $estado->estado_descripcion->descripcion }}
                                                                        </td>
                                                                        <td class="p-2">{{ $estado->created_at }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <h4 class="text-center fw-bold cell">Mensajes</h4>
                                                        <table
                                                            class="table table-striped table-hover align-middle table-borderless">
                                                            <thead class="border-bottom">
                                                                <tr>
                                                                    <th scope="col" class="p-2">Usuario</th>
                                                                    <th scope="col" class="p-2">Detalle</th>
                                                                    <th scope="col" class="p-2">Fecha</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($solicitud->comentarios as $comentario)
                                                                    <tr>
                                                                        <td class="p-2">
                                                                            {{ $comentario->usuario->nombre }}
                                                                            {{ $comentario->usuario->apellido }}</td>
                                                                        <td class="p-2">{{ $comentario->descripcion }}
                                                                        </td>
                                                                        <td class="p-2">{{ $comentario->created_at }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <a href="#" class="btn botonFormulario2" data-bs-toggle="modal"
                                                            data-bs-target="#modalMensaje">
                                                            Nuevo Mensaje
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalMensaje" tabindex="-1"
                                                            aria-labelledby="modalMensajeLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalLoginLabel">Nuevo
                                                                            Mensaje</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid px-1 py-5 mx-auto">
                                                                            <div class="row d-flex justify-content-center">
                                                                                <div class="col">
                                                                                    <div class="card card-form">
                                                                                        <form class="" method="POST"
                                                                                            action="{{ route('comentario.store') }}">
                                                                                            @csrf
                                                                                            <div
                                                                                                class="row justify-content-between text-left">
                                                                                                <div
                                                                                                    class="form-group col-12 flex-column d-flex py-3">
                                                                                                    <input
                                                                                                        class="border-0 cell"
                                                                                                        type="text"
                                                                                                        id="mensaje"
                                                                                                        name="mensaje"
                                                                                                        placeholder="Ingrese el mensaje">
                                                                                                    <input type="text"
                                                                                                        hidden
                                                                                                        id="idUsuario"
                                                                                                        name="idUsuario"
                                                                                                        value="{{ $solicitud->estados->last()->id_usuario ?? '' }}">
                                                                                                    <input type="text"
                                                                                                        hidden
                                                                                                        id="idSolicitud"
                                                                                                        name="idSolicitud"
                                                                                                        value="{{ $solicitud->id_solicitud }}">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="row justify-content-center text-center py-4">
                                                                                                    <div
                                                                                                        class="form-group col-sm-6">
                                                                                                        <button id="boton"
                                                                                                            name="boton"
                                                                                                            type="submit"
                                                                                                            class="botonFormulario">Enviar
                                                                                                            mensaje</button>
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
                                                        {{-- fin modal --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> {{-- Fin div Actividad --}}
                                <div class="row clearfix">
                                    <div class="form-group mt-4 d-lg-flex">
                                        {{-- un boton para descargar --}}
                                        <div class="col-12 col-lg-4  p-1">
                                            <a type="button"
                                                href="{{ route('verHojaResumen', $solicitud->id_solicitud) }}"
                                                class="btn botonFormulario">Descargar
                                                Preliminar</a>
                                        </div>
                                        {{-- un boton para cargar archivo(firma secretaria -imagen) --}}
                                        <div class="col-12 col-lg-4  p-1">
                                            <button id="boton" name="boton" class="botonFormulario2" data-bs-toggle="modal"
                                                data-bs-target="#login_check1">Aplicar
                                                Firma
                                            </button>
                                            <!-- Modal autenticar contraseña -->
                                            {{-- <form action="{{ route('archivos.confirmarContrasenia', $solicitud->id_solicitud) }}"> --}}
                                            <form action="{{ route('firmaSecretaria') }}" method="POST"
                                                autocomplete="off" enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" id="idSolicitud" name="idSolicitud"
                                                    value="{{ $solicitud->id_solicitud }}">

                                                <div class="modal fade" id="login_check1" tabindex="-1"
                                                    aria-labelledby="login_check1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="login_check_h">
                                                                    ¿Esta
                                                                    seguro
                                                                    que
                                                                    desea aprobar la
                                                                    solicitud?
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="input_contrasenia">Contraseña</label>
                                                                    <input type="password" name="password"
                                                                        id="input_contrasenia" class="form-control">
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            </form>
                                        </div>
                                        {{-- un botòn para decargar --}}
                                        <div class="col-12 col-lg-4  p-1">
                                            <a type="button"
                                                href="{{ route('verHojaResumen', $solicitud->id_solicitud) }}"
                                                class="btn botonFormulario">Descargar
                                                Preliminar
                                                Firmado</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($solicitud->estados->last()->estado_descripcion->descripcion=='Aguarda Firma Dir. Académica Central' || $solicitud->estados->last()->estado_descripcion->descripcion=='Terminado')
            {{-- ---------------- ESTE ES EL SHOW DE SANTIAGO -------------------------------------- --}}
            <div class="container">
                <a href="{{ url()->previous() }}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
            </div>
            @if (session('mensaje') ) {{-- Mensaje final luego de submit --}}
                <div class="container-fluid p-1 mx-auto">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 col-12">
                            <div class="alert alert-success alert-dismissible fade show align-items-center mt-3 p-3">
                                <i class='fas fa-check-circle mx-2'></i>{{ session('mensaje') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
            {{-- inicion mostrar solicitud --}}
            <div class="container-fluid p-1 mx-auto my-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 col-12">
                        <div class="card card-form bg-light">
                            <div class="card-header p-1 bg-light cell mb-3">
                                <h2 class="text-center fw-bold">Detalles de Solicitud
                                    {{ $solicitud->id_solicitud }}</h2>
                            </div>
                            {{-- fecha --}}
                            <div class="row justify-content-between text-left ">
                                <p class=" "><span class="text-secondary">Fecha de Inicio: </span>
                                    {{ $solicitud->estados->first()->created_at }}
                                </p>
                            </div>
                            {{-- estado --}}
                            <div class="row justify-content-between text-left ">
                                <p class=" "><span class="text-secondary">Estado: </span>
                                    {{ $solicitud->estados->last()->estado_descripcion->descripcion }}
                                </p>
                            </div>
                            {{-- nombres y apellidos --}}
                            <div class="row justify-content-between text-left">
                                <p class=" "><span class="text-secondary">Solicitante: </span>
                                    {{ $solicitud->usuarioEstudiante->apellido }},
                                    {{ $solicitud->usuarioEstudiante->nombre }}
                                </p>
                            </div>
                            {{-- legajo --}}
                            <div class="row justify-content-between text-left ">
                                <p class=" "><span class="text-secondary">Legajo: </span>
                                    {{ $solicitud->legajo }}</p>
                            </div>
                            {{-- unidad academica --}}
                            <div class="row justify-content-between text-left">
                                <p class=" "><span class="text-secondary">Unidad Académica: </span>
                                    {{ $solicitud->carrera->unidad_academica->unidad_academica }}
                                </p>
                            </div>
                            {{-- carrera --}}
                            <div class="row justify-content-between text-left ">
                                <p class=" "><span class="text-secondary">Carrera: </span>
                                    {{ $solicitud->carrera->carrera }}</p>
                            </div>
                            {{-- universidad de destino --}}
                            <div class="row justify-content-center text-left">
                                <p class=" "><span class="text-secondary">Institución Educativa de
                                        Destino: </span>
                                    {{ $solicitud->universidad_destino }}
                                </p>
                            </div>
                            {{-- Comienzo div Actividad (mostrar como acordeón) --}}
                            <div class="row d-flex justify-content-center">
                                <div class="col-12  p-2">
                                    <div class="accordion" id="acordeonComentarios">
                                        <div class="accordion-item mt-4">
                                            <button
                                                class="accordion-button collapsed justify-content-center botonAcordeonComentarios"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                <h2 class="text-center" id="headingOne"> Actividad </h2>
                                            </button>
                                            <div id="collapseOne" class="accordion-collapse collapse justify-content-center"
                                                aria-labelledby="headingOne" data-bs-parent="#acordeonComentarios">
                                                <div
                                                    class="accordion-body  d-flex justify-content-center acordeonComentarios">
                                                <div class="table-responsive col-12 mx-3">
                                                    <h4 class="text-center fw-bold cell">Historial de Estados de la
                                                        Solicitud</h4>
                                                    <table
                                                        class="table table-striped table-hover align-middle table-borderless">
                                                        <thead class="border-bottom">
                                                            <tr>
                                                                <th scope="col" class="p-2 text-center">Fecha</th>
                                                                <th scope="col" class="p-2 text-center">Usuario</th>
                                                                <th scope="col" class="p-2 text-center">Estado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($solicitud->estados as $estado)
                                                            <tr>
                                                                <td class="p-2">{{ $estado->created_at }}</td>
                                                                <td class="p-2">{{ $estado->usuario->nombre ?? ''}} {{ $estado->usuario->apellido ?? ''}}</td>
                                                                <td class="p-2">{{ $estado->estado_descripcion->descripcion }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <h4 class="text-center fw-bold cell">Mensajes</h4>

                                                    <div class="table-responsive col-12 mx-3">
                                                        <h4 class="text-center fw-bold cell">Historial de Estados de la
                                                            Solicitud</h4>
                                                        <table
                                                            class="table table-striped table-hover align-middle table-borderless">
                                                            <thead class="border-bottom">
                                                                <tr>
                                                                    <th scope="col" class="p-2">Usuario</th>
                                                                    <th scope="col" class="p-2">Estado</th>
                                                                    <th scope="col" class="p-2">Fecha</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($solicitud->estados as $estado)
                                                                    <tr>
                                                                        <td class="p-2">
                                                                            {{ $estado->usuario->nombre ?? '' }}
                                                                            {{ $estado->usuario->apellido ?? '' }}</td>
                                                                        <td class="p-2">
                                                                            {{ $estado->estado_descripcion->descripcion }}
                                                                        </td>
                                                                        <td class="p-2">{{ $estado->created_at }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <h4 class="text-center fw-bold cell">Mensajes</h4>
                                                        <table
                                                            class="table table-striped table-hover align-middle table-borderless">
                                                            <thead class="border-bottom">
                                                                <tr>
                                                                    <th scope="col" class="p-2">Usuario</th>
                                                                    <th scope="col" class="p-2">Detalle</th>
                                                                    <th scope="col" class="p-2">Fecha</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($solicitud->comentarios as $comentario)
                                                                    <tr>
                                                                        <td class="p-2">
                                                                            {{ $comentario->usuario->nombre }}
                                                                            {{ $comentario->usuario->apellido }}</td>
                                                                        <td class="p-2">{{ $comentario->descripcion }}
                                                                        </td>
                                                                        <td class="p-2">{{ $comentario->created_at }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <a href="#" class="btn botonFormulario2" data-bs-toggle="modal"
                                                            data-bs-target="#modalMensaje">
                                                            Nuevo Mensaje
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalMensaje" tabindex="-1"
                                                            aria-labelledby="modalMensajeLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalLoginLabel">Nuevo
                                                                            Mensaje</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid px-1 py-5 mx-auto">
                                                                            <div class="row d-flex justify-content-center">
                                                                                <div class="col">
                                                                                    <div class="card card-form">
                                                                                        <form class="" method="POST"
                                                                                            action="{{ route('comentario.store') }}">
                                                                                            @csrf
                                                                                            <div
                                                                                                class="row justify-content-between text-left">
                                                                                                <div
                                                                                                    class="form-group col-12 flex-column d-flex py-3">
                                                                                                    <input
                                                                                                        class="border-0 cell"
                                                                                                        type="text"
                                                                                                        id="mensaje"
                                                                                                        name="mensaje"
                                                                                                        placeholder="Ingrese el mensaje">
                                                                                                    <input type="text"
                                                                                                        hidden
                                                                                                        id="idUsuario"
                                                                                                        name="idUsuario"
                                                                                                        value="{{ $solicitud->estados->last()->id_usuario ?? '' }}">
                                                                                                    <input type="text"
                                                                                                        hidden
                                                                                                        id="idSolicitud"
                                                                                                        name="idSolicitud"
                                                                                                        value="{{ $solicitud->id_solicitud }}">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="row justify-content-center text-center py-4">
                                                                                                    <div
                                                                                                        class="form-group col-sm-6">
                                                                                                        <button id="boton"
                                                                                                            name="boton"
                                                                                                            type="submit"
                                                                                                            class="botonFormulario">Enviar
                                                                                                            mensaje</button>
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
                                                        {{-- fin modal --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> {{-- Fin div Actividad --}}
                                <div class="row clearfix">
                                    <div class="form-group mt-4 d-lg-flex">
                                        {{-- un botòn para gestionar nota administraciòn central --}}
                                        <div class="col-12 col-lg-6 px-0 pe-lg-1 py-1">
                                            {{-- <input type="button" id="" class="btn botonFormulario2" name="" value="Ver hoja Resumen"> --}}
                                            <a type="button"
                                                href="{{ route('verHojaResumen', $solicitud->id_solicitud) }}"
                                                class="btn botonFormulario2">Ver hoja Resumen</a>
                                        </div>
                                        <div class="col-12 col-lg-6 px-0 pe-lg-1 py-1">
                                            <form action="{{ route('crearNotaAdminCentral') }}" method="POST"
                                                autocomplete="off">
                                                @csrf
                                                <input type="hidden" id="idSolicitud" name="idSolicitud"
                                                    value="{{ $solicitud->id_solicitud }}">
                                                <input type="submit" class="btn botonFormulario2"
                                                    value="Generar nota administración">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="form-group d-lg-flex">
                                        {{-- un boton para descargar --}}
                                        <div class="col-12 col-lg-4  px-0 pe-lg-1 py-1">
                                            <a href="{{ route('archivos.downloadSinFirma', $solicitud->id_solicitud) }}"
                                                class="btn botonFormulario">Descargar doc. sin firmar</a>
                                        </div>
                                        {{-- Este if esta previsto para todos los demas casos donde todavia no existe una hoja resumen (a la espera de roles) --}}
                                        @if ($solicitud->hojaResumen != null)
                                            @if ($solicitud->hojaResumen->hoja_resumen_final == null)
                                                {{-- un boton para cargar archivo(firma secretaria -imagen) --}}
                                                <div class="col-12 col-lg-4  px-0 pe-lg-1 py-1">
                                                    <a href="#" class="btn botonFormulario2 form-control disabled">Adjuntar
                                                        doc.
                                                        Firmado</a>
                                                </div>
                                                {{-- un botòn para decargar --}}
                                                <div class="col-12 col-lg-4  px-0 pe-lg-1 py-1">
                                                    <a href="#" class="btn botonFormulario disabled">Descargar doc.
                                                        Firmado</a>
                                                </div>
                                            @else
                                                <div class="col-12 col-lg-4  px-0 pe-lg-1 py-1">
                                                    <a href="{{ route('archivos.create', 'dato=' . $solicitud->id_solicitud) }}"
                                                        class="btn botonFormulario2 form-control">Adjuntar doc.
                                                        Firmado</a>
                                                </div>
                                                <div class="col-12 col-lg-4  px-0 pe-lg-1 py-1">
                                                    <a href="{{ route('archivos.downloadFirmado', $solicitud->id_solicitud) }}"
                                                        class="btn botonFormulario">Descargar doc. Firmado</a>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="form-group mt-4 d-lg-flex">
                                        <div class="col-12 px-0">
                                            @if ($solicitud->hojaResumen != null)
                                                @if ($solicitud->hojaResumen->hoja_resumen_final == null)
                                                    <button id="boton" name="boton" class="botonFormulario"
                                                        data-bs-toggle="modal" data-bs-target="#">Aprobar y
                                                        notificar
                                                    </button>
                                                @else
                                                    <button id="boton" name="boton" class="botonFormulario"
                                                        data-bs-toggle="modal" data-bs-target="#login_check">Aprobar y
                                                        notificar
                                                    </button>
                                                @endif
                                            @endif
                                            <!-- Modal autenticar contraseña -->
                                            <form
                                                action="{{ route('archivos.confirmarContrasenia', $solicitud->id_solicitud) }}">
                                                @csrf
                                                <div class="modal fade" id="login_check" tabindex="-1"
                                                    aria-labelledby="login_check" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="login_check_h">¿Esta seguro que
                                                                    desea aprobar la solicitud?</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="input_contrasenia">Contraseña</label>
                                                                    <input type="password" name="password"
                                                                        id="input_contrasenia" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn botonFormulario"
                                                                    id="modal_sesion_submit">Confirmar</button>
                                                            </div>
                                                        </div>
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
        @endif
    </main> {{-- Fin main cuerpo --}}
@endsection

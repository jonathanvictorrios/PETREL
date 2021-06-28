@extends('estructura/layout')
@section('cuerpo')
    @php($titulo = 'Ver detalles solicitud - Petrel')@endphp
    @include('estructura/header')

    <main class="p-2" id="cuerpo">
        {{-- Inicio main cuerpo --}}
        {{-- ---------------- ESTE ES EL SHOW DE ESTUDIANTE -------------------------------------- --}}
        <div class="container">
            <a href="{{ url()->previous() }}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
        </div>
        {{-- inicion mostrar solicitud --}}
        <div class="container-fluid p-1 mx-auto">
            <div class="row d-flex justify-content-center  ">
                <div class="col-md-8 col-12 ">
                    <div class="card card-form bg-light">
                        <div class="card-header p-1 bg-light cell mb-3 ">
                            <h2 class="text-center fw-bold">Detalles de Solicitud {{ $solicitud->idSolicitud }}</h2>
                        </div>
                        {{-- fecha --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary ">Fecha de Inicio: </span>
                                {{ $solicitud->FechaUltimoEstado }}
                            </p>
                        </div>
                        {{-- estado --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary ">Estado: </span> {{ $solicitud->UltimoEstado }}
                            </p>
                        </div>

                        {{-- nombres y apellidos --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary ">Solicitante: </span>
                                {{ $solicitud->UsuarioEstudiante }}
                            </p>
                        </div>
                        {{-- legajo --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary ">Legajo: </span> {{ $solicitud->Legajo }}</p>
                        </div>
                        {{-- unidad academica --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary">Unidad Académica: </span>
                                {{ $solicitud->UnidadAcademica }}
                            </p>
                        </div>
                        {{-- carrera --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Carrera: </span> {{ $solicitud->Carrera }}</p>
                        </div>
                        {{-- universidad de destino --}}
                        <div class="row justify-content-center text-left">
                            <p class=" "><span class="text-secondary">Institución Educativa de Destino: </span>
                                {{ $solicitud->UniversidadDestino }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>




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
                            <h2 class="text-center fw-bold">Detalles de Solicitud {{ $solicitud->idSolicitud }}</h2>
                        </div>
                        {{-- fecha --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary">Fecha de Inicio: </span>
                                {{ $solicitud->FechaUltimoEstado }}
                            </p>
                        </div>
                        {{-- estado --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary">Estado: </span> {{ $solicitud->UltimoEstado }}
                            </p>
                        </div>

                        {{-- nombres y apellidos --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary ">Solicitante: </span>
                                {{ $solicitud->UsuarioEstudiante }}
                            </p>
                        </div>
                        {{-- legajo --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Legajo: </span> {{ $solicitud->Legajo }}</p>
                        </div>
                        {{-- unidad academica --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Unidad Académica: </span>
                                {{ $solicitud->UnidadAcademica }}
                            </p>
                        </div>
                        {{-- carrera --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Carrera: </span> {{ $solicitud->Carrera }}</p>
                        </div>
                        {{-- universidad de destino --}}
                        <div class="row justify-content-center text-left">
                            <p class=" "><span class="text-secondary">Institución Educativa de Destino: </span>
                                {{ $solicitud->UniversidadDestino }}
                            </p>
                        </div>
                        {{-- asignado a --}}
                        <div class="row justify-content-center text-left">
                            <div class="col-12">
                                <p class=" "><span class="text-secondary">Solicitud asignada a: </span></p>
                            </div>
                            {{-- ACÀ DEBE TOMAR EL NOMBRE DE PERSONA ASIGNADA mostrarlo y guardarlo en base de datos --}}
                            {{-- dejo este select como muestra visual, 
                        hay que eliminarlo al hacer el real de arriba --}}
                            <form action="" method="">
                                <div class="col-12">
                                    <select class="btn botonFormulario3 w-100 " name="">
                                        <option value="0">Elegir Persona</option>
                                        <option value="1">Mario Domini</option>
                                        <option value="2">Rosa Piper</option>
                                        <option value="3">Catalina Blum</option>
                                        <option value="4">Ricardo Ford</option>
                                    </select>
                                    <br>
                                </div>
                                <div class="col-12 mt-2">
                                    <button type="submit" class=" botonFormulario2">Asignar/cambiar asignación </button>
                                    {{-- botòn que guarda en la base --}}</p>
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
                                           
                                            <div class="accordion-body  d-flex justify-content-center acordeonComentarios">
                                                
                                                <div class="table-responsive col-12 mx-3">
                                                    <h4 class="text-center fw-bold cell">Historial de Estados de la Solicitud</h4>
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
                                                            <tr>
                                                                <td class="p-2">12/05/2021</td>
                                                                <td class="p-2">Viviana Pedrero</td>
                                                                <td class="p-2">asignado a Raquel
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="p-2">17/05/2021</td>
                                                                <td class="p-2">Viviana Pedrero</td>
                                                                <td class="p-2">asignado a Ricardo Ford
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="p-2">12/05/2021</td>
                                                                <td class="p-2">Viviana Pedrero</td>
                                                                <td class="p-2">espera firma Secretaria
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <h4 class="text-center fw-bold cell">Mensajes</h4>
                                                    <div class="table-responsive col-12 mx-3">
                                                        <table
                                                            class="table table-striped table-hover align-middle table-borderless">
                                                            <thead class="border-bottom">
                                                                <tr>
                                                                    <th scope="col" class="p-2 text-center">Fecha</th>
                                                                    <th scope="col" class="p-2 text-center">Usuario</th>
                                                                    <th scope="col" class="p-2 text-center">Detalle</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="p-2">12/05/2021</td>
                                                                    <td class="p-2">Viviana Pedrero</td>
                                                                    <td class="p-2">asignado a Raquel sdhakshaksdas
                                                                        dbahsbdhamsbdasbdjasbdajsdbaksdhakhs
                                                                        dbahmsdbahmsdbahmsbdamsbdamhsbdahsbfkhasbfhasfbmahsfbamsfbamhsbfmhasfaf
                                                                    </td>
                                                                </tr>
    
                                                                <tr>
                                                                    <td class="p-2">12/05/2021</td>
                                                                    <td class="p-2">Viviana Pedrero</td>
                                                                    <td class="p-2">asignado a Raquel sdhakshaksdas
                                                                        dbahsbdhamsbdasbdjasbdajsdbaksdhakhs
                                                                        dbahmsdbahmsdbahmsbdamsbdamhsbdahsbfkhasbfhasfbmahsfbamsfbamhsbfmhasfaf
                                                                    </td>
                                                                </tr>
    
                                                                <tr>
                                                                    <td class="p-2">12/05/2021</td>
                                                                    <td class="p-2">Viviana Pedrero</td>
                                                                    <td class="p-2">asignado a Raquel sdhakshaksdas
                                                                        dbahsbdhamsbdasbdjasbdajsdbaksdhakhs
                                                                        dbahmsdbahmsdbahmsbdamsbdamhsbdahsbfkhasbfhasfbmahsfbamsfbamhsbfmhasfaf
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    {{-- boton de agregar comentario --}}
                                                    <div class="row justify-content-center">
                                                        <div class="col-12 mt-2 p-2 ">
                                                           
                                                            <form action="" method="POST" autocomplete="off"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                {{-- aca voy a recibir el $idSolicitud --}}
                                                                <input type="hidden" id="idSolicitud" name="idSolicitud"
                                                                    value="{{ $solicitud->idSolicitud }}">
                                                                <input type="submit" class="botonFormulario2" value="Agregar Mensaje">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> {{-- Fin div Actividad --}}
                        <div class="row justify-content-center">
                            <div class="col-12 mt-2 p-2 ">
                                {{-- ESTE FORM/BOTÒN DEBERIA SER VISIBLE SÒLO SI EL USUARIO ASIGNADO ES EL USUARIO LOGUEADO --}}
                                <form action="{{ route('hojaResumen.store') }}" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- aca voy a recibir el $idSolicitud , por ahora utilizo un input , luego este $idSolicitud estara en un campo oculto --}}
                                    <input type="hidden" id="idSolicitud" name="idSolicitud"
                                        value="{{ $solicitud->idSolicitud }}">
                                    <input type="submit" class="botonFormulario" value="comenzar trámite">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        {{-- ---------------- ESTE ES EL SHOW DE SECRETARIA -------------------------------------- --}}
        <div class="container">
            <a href="{{ url()->previous() }}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
        </div>
        {{-- inicion mostrar solicitud --}}
        <div class="container-fluid p-1 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-12">
                    <div class="card card-form bg-light">
                        <div class="card-header p-1 bg-light cell mb-3">
                            <h2 class="text-center fw-bold">Detalles de Solicitud {{ $solicitud->idSolicitud }}</h2>
                        </div>
                        {{-- fecha --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Fecha de Inicio: </span>
                                {{ $solicitud->FechaUltimoEstado }}
                            </p>
                        </div>
                        {{-- estado --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Estado: </span> {{ $solicitud->UltimoEstado }}
                            </p>
                        </div>

                        {{-- nombres y apellidos --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary">Solicitante: </span>
                                {{ $solicitud->UsuarioEstudiante }}
                            </p>
                        </div>
                        {{-- legajo --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Legajo: </span> {{ $solicitud->Legajo }}</p>
                        </div>
                        {{-- unidad academica --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary">Unidad Académica: </span>
                                {{ $solicitud->UnidadAcademica }}
                            </p>
                        </div>
                        {{-- carrera --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Carrera: </span> {{ $solicitud->Carrera }}</p>
                        </div>
                        {{-- universidad de destino --}}
                        <div class="row justify-content-center text-left">
                            <p class=" "><span class="text-secondary">Institución Educativa de Destino: </span>
                                {{ $solicitud->UniversidadDestino }}
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
                    <h2 class="align-self-center" id="headingOne"> Actividad </h2>
                </button>

                <div id="collapseOne" class="accordion-collapse collapse justify-content-center"
                    aria-labelledby="headingOne" data-bs-parent="#acordeonComentarios">
                   
                    <div class="accordion-body  d-flex justify-content-center acordeonComentarios">
                        
                        <div class="table-responsive col-12 mx-3">
                            <h4 class="text-center fw-bold cell">Historial de Estados de la Solicitud</h4>
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
                                    <tr>
                                        <td class="p-2">12/05/2021</td>
                                        <td class="p-2">Viviana Pedrero</td>
                                        <td class="p-2">asignado a Raquel
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="p-2">17/05/2021</td>
                                        <td class="p-2">Viviana Pedrero</td>
                                        <td class="p-2">asignado a Ricardo Ford
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="p-2">12/05/2021</td>
                                        <td class="p-2">Viviana Pedrero</td>
                                        <td class="p-2">espera firma Secretaria
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h4 class="text-center fw-bold cell">Mensajes</h4>
                            <div class="table-responsive col-12 mx-3">
                                <table
                                    class="table table-striped table-hover align-middle table-borderless">
                                    <thead class="border-bottom">
                                        <tr>
                                            <th scope="col" class="p-2 text-center">Fecha</th>
                                            <th scope="col" class="p-2 text-center">Usuario</th>
                                            <th scope="col" class="p-2 text-center">Detalle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="p-2">12/05/2021</td>
                                            <td class="p-2">Viviana Pedrero</td>
                                            <td class="p-2">asignado a Raquel sdhakshaksdas
                                                dbahsbdhamsbdasbdjasbdajsdbaksdhakhs
                                                dbahmsdbahmsdbahmsbdamsbdamhsbdahsbfkhasbfhasfbmahsfbamsfbamhsbfmhasfaf
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="p-2">12/05/2021</td>
                                            <td class="p-2">Viviana Pedrero</td>
                                            <td class="p-2">asignado a Raquel sdhakshaksdas
                                                dbahsbdhamsbdasbdjasbdajsdbaksdhakhs
                                                dbahmsdbahmsdbahmsbdamsbdamhsbdahsbfkhasbfhasfbmahsfbamsfbamhsbfmhasfaf
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="p-2">12/05/2021</td>
                                            <td class="p-2">Viviana Pedrero</td>
                                            <td class="p-2">asignado a Raquel sdhakshaksdas
                                                dbahsbdhamsbdasbdjasbdajsdbaksdhakhs
                                                dbahmsdbahmsdbahmsbdamsbdamhsbdahsbfkhasbfhasfbmahsfbamsfbamhsbfmhasfaf
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            {{-- boton de agregar comentario --}}
                            <div class="row justify-content-center">
                                <div class="col-12 mt-2 p-2 ">
                                   
                                    <form action="" method="POST" autocomplete="off"
                                        enctype="multipart/form-data">
                                        @csrf
                                        {{-- aca voy a recibir el $idSolicitud --}}
                                        <input type="hidden" id="idSolicitud" name="idSolicitud"
                                            value="{{ $solicitud->idSolicitud }}">
                                        <input type="submit" class="botonFormulario2" value="Agregar Mensaje">
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                    <input type="button" id="" class="btn botonFormulario" name=""
                                        value="Descargar Preliminar">
                                </div>
                                {{-- un boton para cargar archivo(firma secretaria -imagen) --}}
                                <div class="col-12 col-lg-4  p-1">
                                    <input type="button" class="btn botonFormulario2 form-control" id="" name=""
                                        value="Aplicar Firma">
                                </div>
                                {{-- un botòn para decargar --}}
                                <div class="col-12 col-lg-4  p-1">
                                    <input type="button" id="" class="btn botonFormulario" name=""
                                        value="Descargar Preliminar Firmado">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>


        {{-- ---------------- ESTE ES EL SHOW DE SANTIAGO -------------------------------------- --}}
        <div class="container">
            <a href="{{ url()->previous() }}" class="lead"><i class="fas fa-chevron-left me-2"></i>Atrás</a>
        </div>
        {{-- inicion mostrar solicitud --}}
        <div class="container-fluid p-1 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-12">
                    <div class="card card-form bg-light">
                        <div class="card-header p-1 bg-light cell mb-3">
                            <h2 class="text-center fw-bold">Detalles de Solicitud {{ $solicitud->idSolicitud }}</h2>
                        </div>
                        {{-- fecha --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Fecha de Inicio: </span>
                                {{ $solicitud->FechaUltimoEstado }}
                            </p>
                        </div>
                        {{-- estado --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Estado: </span> {{ $solicitud->UltimoEstado }}
                            </p>
                        </div>

                        {{-- nombres y apellidos --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary">Solicitante: </span>
                                {{ $solicitud->UsuarioEstudiante }}
                            </p>
                        </div>
                        {{-- legajo --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Legajo: </span> {{ $solicitud->Legajo }}</p>
                        </div>
                        {{-- unidad academica --}}
                        <div class="row justify-content-between text-left">
                            <p class=" "><span class="text-secondary">Unidad Académica: </span>
                                {{ $solicitud->UnidadAcademica }}
                            </p>
                        </div>
                        {{-- carrera --}}
                        <div class="row justify-content-between text-left ">
                            <p class=" "><span class="text-secondary">Carrera: </span> {{ $solicitud->Carrera }}</p>
                        </div>
                        {{-- universidad de destino --}}
                        <div class="row justify-content-center text-left">
                            <p class=" "><span class="text-secondary">Institución Educativa de Destino: </span>
                                {{ $solicitud->UniversidadDestino }}
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
                    <h2 class="align-self-center" id="headingOne"> Actividad </h2>
                </button>

                <div id="collapseOne" class="accordion-collapse collapse justify-content-center"
                    aria-labelledby="headingOne" data-bs-parent="#acordeonComentarios">
                   
                    <div class="accordion-body  d-flex justify-content-center acordeonComentarios">
                        
                        <div class="table-responsive col-12 mx-3">
                            <h4 class="text-center fw-bold cell">Historial de Estados de la Solicitud</h4>
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
                                    <tr>
                                        <td class="p-2">12/05/2021</td>
                                        <td class="p-2">Viviana Pedrero</td>
                                        <td class="p-2">asignado a Raquel
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="p-2">17/05/2021</td>
                                        <td class="p-2">Viviana Pedrero</td>
                                        <td class="p-2">asignado a Ricardo Ford
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="p-2">12/05/2021</td>
                                        <td class="p-2">Viviana Pedrero</td>
                                        <td class="p-2">espera firma Secretaria
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h4 class="text-center fw-bold cell">Mensajes</h4>
                            <div class="table-responsive col-12 mx-3">
                                <table
                                    class="table table-striped table-hover align-middle table-borderless">
                                    <thead class="border-bottom">
                                        <tr>
                                            <th scope="col" class="p-2 text-center">Fecha</th>
                                            <th scope="col" class="p-2 text-center">Usuario</th>
                                            <th scope="col" class="p-2 text-center">Detalle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="p-2">12/05/2021</td>
                                            <td class="p-2">Viviana Pedrero</td>
                                            <td class="p-2">asignado a Raquel sdhakshaksdas
                                                dbahsbdhamsbdasbdjasbdajsdbaksdhakhs
                                                dbahmsdbahmsdbahmsbdamsbdamhsbdahsbfkhasbfhasfbmahsfbamsfbamhsbfmhasfaf
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="p-2">12/05/2021</td>
                                            <td class="p-2">Viviana Pedrero</td>
                                            <td class="p-2">asignado a Raquel sdhakshaksdas
                                                dbahsbdhamsbdasbdjasbdajsdbaksdhakhs
                                                dbahmsdbahmsdbahmsbdamsbdamhsbdahsbfkhasbfhasfbmahsfbamsfbamhsbfmhasfaf
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="p-2">12/05/2021</td>
                                            <td class="p-2">Viviana Pedrero</td>
                                            <td class="p-2">asignado a Raquel sdhakshaksdas
                                                dbahsbdhamsbdasbdjasbdajsdbaksdhakhs
                                                dbahmsdbahmsdbahmsbdamsbdamhsbdahsbfkhasbfhasfbmahsfbamsfbamhsbfmhasfaf
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            {{-- boton de agregar comentario --}}
                            <div class="row justify-content-center">
                                <div class="col-12 mt-2 p-2 ">
                                   
                                    <form action="" method="POST" autocomplete="off"
                                        enctype="multipart/form-data">
                                        @csrf
                                        {{-- aca voy a recibir el $idSolicitud --}}
                                        <input type="hidden" id="idSolicitud" name="idSolicitud"
                                            value="{{ $solicitud->idSolicitud }}">
                                        <input type="submit" class="botonFormulario2" value="Agregar Mensaje">
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                    <input type="button" id="" class="btn botonFormulario" name=""
                                        value="Descargar doc. sin firmar">
                                </div>
                                {{-- un boton para cargar archivo(firma secretaria -imagen) --}}
                                <div class="col-12 col-lg-4  p-1">
                                    <input type="button" class="btn botonFormulario2 form-control" id="" name=""
                                        value="Adjuntar doc. Firmado">
                                </div>
                                {{-- un botòn para decargar --}}
                                <div class="col-12 col-lg-4  p-1">
                                    <input type="button" id="" class="btn botonFormulario" name=""
                                        value="Descargar doc. Firmado">
                                </div>
                            </div>
                            <div class="form-group mt-4 d-lg-flex">
                                {{-- un botòn para gestion central --}}
                                <div class="col-12 col-lg-6  p-1">
                                    <input type="button" id="" class="btn botonFormulario" name="" value="Gestion">
                                </div>
                        
                        <div class="col-12 col-lg-6  p-1">
                            <form name="" id="" action="" method="POST" autocomplete="off" enctype="multipart/form-data"
                                novalidate>
                                @csrf
                                <button id="boton" name="boton" type="submit" class="botonFormulario">Aprobar y
                                notificar</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main> {{-- Fin main cuerpo --}}


@endsection

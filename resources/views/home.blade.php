@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Petrel - Inicio')

<nav class="navbar fixed-top navbar-expand-md navbar-light "> <!-- Inicio encabezado -->
    <div class="container-fluid pb-5"> <!-- Comienzo contenedor -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MenuSuperior" aria-controls="MenuSuperior" aria-expanded="false" aria-label="Menú superior">
            <span class="navbar-toggler-icon"></span>
        </button> <!-- Fin botón desplegable en pantallas chicas-->

        <div class="collapse navbar-collapse" id="MenuSuperior"> <!-- Comienzo contenido menú -->
            <div class="d-flex align-items-end"> <!-- Comienzo contenido a la derecha -->
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                    <a class="nav-link" href="#pregfrecuentes">Preguntas frecuentes</a>
                    </li>
                    <li class="nav-item">
                    <!-- trigger modal -->  
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrarse</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Acceder</a>
                    </li>
                </ul>
            </div> <!-- Fin contenido a la derecha -->
        </div> <!-- Fin contenido desplegable en pantallas chicas -->

    </div> <!-- Fin contenedor -->
</nav> <!-- Fin encabezado -->
{{-- comienzo 1era.fila con tres columnas  --}}
<div id="home" class= "row mt-5">
    <div class= "col-6 ">
        <img src="{{ asset('img/icono_petrel.ico') }}" alt="Icono Petrel" style="min-height: 400px">
    </div>
    <div class="col-2  mt-5">
        <h1 class="titulohome">Petrel</h1>
    </div>
    <div class="col-4  ">    
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>
        {{-- fin modal --}}
    </div>
</div> <!-- Fin primera fila -->
{{-- segunda fila titulo preguntas --}}
<div class="row">
    <h5 class=" text-center">Preguntas Frecuentes</h5>
</div>
{{-- tercera fila muestra pregunta frecuentes --}}
<div class="row">
    <a class="nav-link vermas text-center" href="#pregfrecuentes"><i class="fas fa-angle-down"></i></a>
</div>
{{-- tercera fila muestra pregunta frecuentes --}}
<div class="row pregfrecuentes">
    <a name="pregfrecuentes"></a>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
        Aperiam natus voluptate suscipit soluta perferendis est quos molestias 
        repudiandae dolores cum eligendi ab fuga, quam totam tempore dolore 
        libero velit. Sapiente.Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
        Aperiam natus voluptate suscipit soluta perferendis est quos molestias 
        repudiandae dolores cum eligendi ab fuga, quam totam tempore dolore 
        libero velit. Sapiente.Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
        Aperiam natus voluptate suscipit soluta perferendis est quos molestias 
        repudiandae dolores cum eligendi ab fuga, quam totam tempore dolore 
        libero velit. Sapiente.</p>
</div>

@endsection

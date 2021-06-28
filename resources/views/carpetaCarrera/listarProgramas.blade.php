@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Programas - Petrel')@endphp
@include('estructura/header')
<div class="container shadow-lg mt-5 mb-5 p-3 bg-light rounded col-8">
@if (session('mensaje') ) {{-- Aviso de carpeta creada (u otra notificación desde controller) --}}
<div class="alert alert-success alert-dismissible fade show d-flex align-items-center m-3 p-3">
  <i class='fas fa-check-circle mx-2'></i>{{ session('mensaje') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h2 class="text-center cell p-3 m-3">{{$carpetaCarrera->carrera->carrera.' '.$carpetaCarrera->carpeta_anio->numero_anio }} </h2>
<table   class="table table-striped table-hover align-middle table-borderless">
    <thead class="border-bottom">
        <tr>
            <th>Numero</th>
            <th>Nombre</th>
            <th>Descarga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carpetaCarrera->programa_drive as $programa)
            <tr>
                <td>{{ $programa->numero_programa }}</td>
                <td>{{ $programa->nombre_programa }}</td>
                <td><a href='https://drive.google.com/uc?id={{ $programa->url_programa }}&export=download'>@</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="col-12 col-lg-4  p-1 d-flex justify-content-center"> 
<a href="{{ route('agregarPrograma', $carpetaCarrera->id_carpeta_carrera) }}"class="btn botonFormulario2">Agregar un programa</a>
</div>
</div>
@endsection

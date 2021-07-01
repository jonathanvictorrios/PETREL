@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Carreras - Petrel')@endphp
@include('estructura/header')
<main class="p-2" id="cuerpo">
    <div class="container shadow-lg mt-5 mb-5 p-3 bg-light rounded col-8">
        @if (session('mensaje') ) {{-- Aviso de carpeta creada (u otra notificación desde controller) --}}
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center m-3 p-3">
          <i class='fas fa-check-circle mx-2'></i>{{ session('mensaje') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        
        <h2 class="text-center cell p-3 m-3">Listado de carreras {{$carpetaAnio->numero_anio}}</h2>
        <table   class="table table-striped table-hover align-middle table-borderless">
            <thead class="border-bottom">
                <tr>
                    <th>Nombre</th>
                    <th>
                        <a href="{{ route('crearCarpetaCarrera', $carpetaAnio->id_carpeta_anio) }}">
                            Crear una nueva carpeta carrera
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carpetaAnio->carpeta_carrera as $carrera)
                <tr>
                    <td>{{ $carrera->carrera->carrera }}</td>
                    <td>
                        <a href=" {{ route('verProgramas',$carrera->id_carpeta_carrera) }} ">Ver programas</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
</main>
@endsection

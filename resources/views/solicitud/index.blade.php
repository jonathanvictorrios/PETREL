@extends('layout/main')

@section('contenido')
<a href="{{route('solicitud.create')}}" class='btn btn-primary'>+</a>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nro Solicitud</th>
      <th scope="col">Nombre y Apellido</th>
      <th scope="col">Legajo</th>
      <th scope="col">Carrera</th>
      <th scope="col">Unidad Academica</th>
    </tr>
  </thead>
  <tbody>
  @foreach($solicitudes as $solicitud)
    <tr>
      <th scope="row">{{$solicitud->id_solicitud}}</th>
      <td>{{$solicitud->usuarioEstudiante->apellido}} {{$solicitud->usuarioEstudiante->nombre}}</td>
      <td>{{$solicitud->legajo}}</td>
      <td>{{$solicitud->carrera->carrera}}</td>
      <td>{{$solicitud->unidadAcademica->unidad_academica}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
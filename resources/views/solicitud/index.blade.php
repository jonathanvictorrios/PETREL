@extends('estructura/layout')

@section('contenido')
{{$Mostrar}}
<a href="{{route('solicitud.create')}}" class='btn btn-primary'>+</a>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nro Solicitud</th>
      <th scope="col">Fecha</th>
      <th scope="col">Nombre y Apellido</th>
      <th scope="col">Legajo</th>
      <th scope="col">Carrera</th>
      <th scope="col">Unidad Academica</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($Mostrar as $solicitud)
    <tr>
      <th scope="row">{{$solicitud->idSolicitud}}</th>
      <td>{{$solicitud->Fecha}}</td>
      <td>{{$solicitud->usuarioEstudiante->apellido}} {{$solicitud->usuarioEstudiante->nombre}}</td>
      <td>{{$solicitud->legajo}}</td>
      <td>{{$solicitud->carrera->carrera}}</td>
      <td>{{$solicitud->carrera->unidad_academica}}</td>
      <td><a href="{{route('solicitud.show',$solicitud->id_solicitud)}}">Ver</a></td>
    </tr>
     
    @endforeach 
  </tbody>
</table>
@endsection

{{--
@foreach($Mostrar as $solicitud)
    <tr>
     <th scope="row">{{$solicitud->id_solicitud}}</th>
     {{-- <td>{{$solicitud->ultimoEstado}}</td>--}}
      <td>{{$solicitud->usuarioEstudiante->apellido}} {{$solicitud->usuarioEstudiante->nombre}}</td>
      <td>{{$solicitud->legajo}}</td>
      <td>{{$solicitud->carrera->carrera}}</td>
      <td>{{$solicitud->carrera->unidad_academica}}</td>
      <td><a href="{{route('solicitud.show',$solicitud->id_solicitud)}}">Ver</a></td>
    </tr>
    @endforeach --}}
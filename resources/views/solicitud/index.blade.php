@extends('estructura/layout')
<<<<<<< HEAD
=======

@section('cuerpo')
@php($titulo = 'Petrel - Listado solicitudes')

@include('estructura/header')
>>>>>>> 0e93fd442ac3c2eba9a5755f6f1b8f7cb951e251

<a href="{{route('solicitud.create')}}" class='btn btn-primary'>+</a>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nro Solicitud</th>
      <th scope="col">Fecha</th>
      <th scope="col">Apellido y nombre</th>
      <th scope="col">Legajo</th>
      <th scope="col">Carrera</th>
      <th scope="col">Unidad Academica</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($Lista as $solicitud)
    <tr>
      <th scope="row">{{$solicitud->idSolicitud}}</th>
      <td>{{$solicitud->Fecha}}</td>
      <td>{{$solicitud->UsuarioEstudiante}}</td>
      <td>{{$solicitud->Legajo}}</td>
      <td>{{$solicitud->Carrera}}</td>
      <td>{{$solicitud->UnidadAcademica}}</td>
      <td><a href="{{route('solicitud.show',$solicitud->idSolicitud)}}">Ver</a></td>
    </tr>
     
    @endforeach 
  </tbody>
</table>
<<<<<<< HEAD
@endsection 
=======

@endsection
>>>>>>> 0e93fd442ac3c2eba9a5755f6f1b8f7cb951e251

@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Petrel - Nota Admin Central') @endphp


<div class="container shadow-lg mt-5 mb-5 pb-3 bg-light rounded col-8">
    @php
    $arregloRendimiento = json_decode(file_get_contents($rutaArchivo),true);
    @endphp

    <form action="{{ route('crear-nota-central') }}" method="POST" autocomplete="off">
        @csrf

        <div class="alert alert-info text-center m-1" role="alert">
            Encabezado.
        </div>
        <header>
            <p style="text-align: center;">
                <img height="80px" width="100%" src="img/logoteSecretariaAcademica.png" alt="logo-unco">
            </p>
            <p style="text-align: center;">
                Dirección General de Administración Académica
            </p>
            <p style="border-bottom: 1px solid;"></p>
        </header>

        <main>
            <div class="alert alert-info text-center m-1" role="alert">
                Puedes editar el contenido del sub encabezado si es requerido.
            </div>

            <textarea id="subencabezado" class="ckeditor form-control" name="contenido_subencabezado">

              <p style="text-align: center;"> <strong>Certificado de Legalización de Documentos – Certificación de Programas</strong> </p>
              <p> <strong>Número:{{$solicitud->id_solicitud}}-{{$arregloFecha["anio"] }}</strong> </p>
              <p style="text-align: right;"> <strong>Ciudad de Neuquén Capital</strong> </p>
              <p style="text-align: right;"><strong>{{$arregloFecha["dia"] }} de {{$arregloFecha["mes"] }} de {{$arregloFecha["anio"] }}</strong> </p>

            </textarea>

            <div class="alert alert-info text-center m-1" role="alert">
                Puedes editar el contenido principal si es requerido.
            </div>

            <textarea id="principal" class="ckeditor form-control" name="contenido_principal">

              <p> <strong> Referencia: </strong>{{$arregloRendimiento["UA"]["Facultad"]}} </p>
              <hr>        

              <p style="text-align: justify;">
                La DIRECCIÓN GENERAL DE ADMINISTRACIÓN ACADÉMICA certifica que la firma que exhibe el documento embebido ACTUACION a nombre de {{$arregloRendimiento["Alumno"]["Apellido"]}}, {{$arregloRendimiento["Alumno"]["Nombre"]}} - {{$arregloRendimiento["Documento"]["Tipo"]}}: {{$arregloRendimiento["Documento"]["Nro"]}}, y dice VIVIANA PEDRERO A/C DEL DEPARTAMENTO DE ALUMNOS y SILVIA AMARO SECRETARIA ACADEMICA guardan similitud con las obrantes en el Registro de Firmas de la Universidad Nacional del Comahue.
                 </p>
        
            </textarea>

        </main>

        <div class="alert alert-info text-center m-1" role="alert">
            Puedes editar el pie de página si es requerido.
        </div>

        <footer>

            <textarea  style="font-size: 10;" id="pie" class="ckeditor form-control" name="contenido_pie">

                <p> <em>Buenos Aires 1400 (8300) Neuquén Capital. TE: 0299-4490395</em> <br> 
                <em>santiago.briceno@central.uncoma.edu.ar </em> <br>
                <em>CUIT N.º: 30-58676219-9</em> <br>
                <em>Ley de creación de la Universidad Nacional del Comahue N.º 19117 del 15 de julio de 1971</em></p>
               
            </textarea>

        </footer>

        <input type="hidden" id="id_solicitud" name="id_solicitud" value="{{$solicitud->id_solicitud}}">

        <div class="row">
            <div class="col-md-12 text-center">
                <input id="btn_crear-pdf" class="btn btn-primary m-2 font-weight-bold" name="btn_crear-pdf" type="submit" value="Guardar Nota">
            </div>
        </div>
    </form>
</div>


<!-- ckeditor_4.16.1_full -->
<script src="https://cdn.ckeditor.com/4.16.1/full-all/ckeditor.js"></script>
{{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> --}}

<script>
    CKEDITOR.replace('.ckeditor');
</script>

@endsection
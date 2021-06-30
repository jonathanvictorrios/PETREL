@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Petrel - Nota Admin Central') @endphp
@include('estructura/header')

<div class="container shadow-lg mt-5 mb-5 pb-3 bg-light rounded col-8">
    @php
    $arregloRendimiento = json_decode(file_get_contents($rutaArchivo),true);
    @endphp
 <h2 class="text-center cell p-3 m-3">Crear nota Administración Central</h2>

    <form action="{{ route('crear-nota-central') }}" method="POST" autocomplete="off" class="container w-80 py-2">
        @csrf

        <header>
            <p style="text-align: center;">
                <img height="80px" width="100%" src={{ asset('img/portada_nota.svg') }} alt="logo-unco">
            </p>
            <p style="text-align: center;">
                Dirección General de Administración Académica
            </p>
            <p style="border-bottom: 1px solid;"></p>
        </header>

        <main>
        <div class="form-group m-1">
                <a id="answer1" class="btn botonFormulario2" data-bs-toggle="collapse" href="#footer_editor1" role="button" aria-expanded="false" aria-controls="footer_editor1">
                    Editar sub-encabezado <i class="fas fa-angle-down" aria-hidden="true" id="answer11"></i>
                </a>
            
          <div class="collapse m-1" id="footer_editor1">
            <textarea id="subencabezado" class="ckeditor form-control" name="contenido_subencabezado">

              <p style="text-align: center;"> <strong>Certificado de Legalización de Documentos – Certificación de Programas</strong> </p>
              <p> <strong>Número:{{$solicitud->id_solicitud}}-{{$arregloFecha["anio"] }}</strong> </p>
              <p style="text-align: right;"> <strong>Ciudad de Neuquén Capital</strong> </p>
              <p style="text-align: right;"><strong>{{$arregloFecha["dia"] }} de {{$arregloFecha["mes"] }} de {{$arregloFecha["anio"] }}</strong> </p>
              <p></p>
              <p> <strong> Referencia: </strong>{{$arregloRendimiento["UA"]["Facultad"]}} </p>
            </textarea>
        </div>
    </div>    
      <div class="form-group m-1">
                <a id="answer2" class="btn botonFormulario2" data-bs-toggle="collapse" href="#footer_editor2" role="button" aria-expanded="false" aria-controls="footer_editor2">
                    Editar econtenido principal  <i class="fas fa-angle-up" aria-hidden="true" id="answer22"></i>
                </a>
            
          <div class="collapse show m-1" id="footer_editor2">
            <textarea id="principal" class="ckeditor form-control" name="contenido_principal">

              
                      

              <p style="text-align: justify;">
                La DIRECCIÓN GENERAL DE ADMINISTRACIÓN ACADÉMICA certifica que la firma que exhibe el documento embebido ACTUACION a nombre de {{$arregloRendimiento["Alumno"]["Apellido"]}}, {{$arregloRendimiento["Alumno"]["Nombre"]}} - {{$arregloRendimiento["Documento"]["Tipo"]}}: {{$arregloRendimiento["Documento"]["Nro"]}}, y dice VIVIANA PEDRERO A/C DEL DEPARTAMENTO DE ALUMNOS y SILVIA AMARO SECRETARIA ACADEMICA guardan similitud con las obrantes en el Registro de Firmas de la Universidad Nacional del Comahue.
                 </p>
        
            </textarea>
        </div>
    </div>
        </main>

        <div class="form-group m-1">
            <a id="answer3" class="btn botonFormulario2" data-bs-toggle="collapse" href="#footer_editor3" role="button" aria-expanded="false" aria-controls="footer_editor3">
                Editar pie de página  <i class="fas fa-angle-down" aria-hidden="true" id="answer33"></i>
            </a>
        </div>
        <div class="collapse m-1" id="footer_editor3">
            <footer>

                <textarea  style="font-size: 10;" id="pie" class="ckeditor form-control" name="contenido_pie">

                    <p> <em>Buenos Aires 1400 (8300) Neuquén Capital. TE: 0299-4490395</em> <br> 
                    <em>santiago.briceno@central.uncoma.edu.ar </em> <br>
                    <em>CUIT N.º: 30-58676219-9</em> <br>
                    <em>Ley de creación de la Universidad Nacional del Comahue N.º 19117 del 15 de julio de 1971</em></p>
                
                </textarea>

            </footer>
        </div>
        <input type="hidden" id="idSolicitud" name="idSolicitud" value="{{$solicitud->id_solicitud}}">

        <div class="row">
            <div class="col-md-12 text-center mt-4">
                <input id="btn_crear-pdf" class="btn botonFormulario" name="btn_crear-pdf" type="submit" value="Guardar Nota">
            </div>
        </div>
    </form>



<!-- ckeditor_4.16.1_full -->
<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
{{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> --}}

<script>
    CKEDITOR.replace('.ckeditor');
</script>
{{-- para que las flechitas de los botones cambien al expandir el acordeòn --}}
<script>
    $("#answer1, #answer11").click(function() {
        $("#answer11").toggleClass("fas fa-angle-down fas fa-angle-up");
    });
    $("#answer2, #answer22").click(function() {
        $("#answer22").toggleClass("fas fa-angle-up fas fa-angle-down");
    });
    $("#answer3, #answer33").click(function() {
        $("#answer33").toggleClass("fas fa-angle-down fas fa-angle-up");
        
    });
   
</script>
</div>
@endsection
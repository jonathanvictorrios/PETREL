@extends('estructura/layout')
@section('cuerpo')
@php($titulo = 'Crear Nota - Petrel')@endphp
@include('estructura/header')
<div class="container shadow-lg mt-5 mb-5 pb-3 bg-light rounded col-8">
@php
$directorio =
storage_path('app/id-solicitud-'.$solicitud->id_solicitud.'/rendimientoAcademico'.$solicitud->id_solicitud.'.json');
$arregloRendimiento = json_decode(file_get_contents($directorio),true);
$fecha = date('d') . ' de ' . date('M') . ' del ' . date('Y');
@endphp

@if($errors->any())
<div class="alert alert-danger mt-3 container" role="alert">
    {{ $errors->first() }}
</div>
@endif

@if(session('success'))
<div class="alert alert-success mt-3 container">
    {{session('success')}}
</div>
@endif
<h2 class="text-center cell p-3 m-3">Crear nota Departamento de Alumnos</h2>

<form name="formulario_nota" id="formulario_nota" action="{{ route('notaDA.store') }}" method="POST" class="container w-80 py-2" novalidate>
    @csrf
   
    <div class="alert alert-success" role="alert">
        Puedes editar el contenido a necesidad, y agregar por ejemplo:
        <ul>
            <li>Sanciones disciplinarias</li>
            <li>Cambiar fechas, localidades</li>
        </ul>
    </div>

    <div class="form-group mb-2">
        <textarea class="ckeditor form-control" name="contenido">
            <p>
                El Departamento de Alumnos del Centro Universitario Regional Zona Atlántica de la Universidad Nacional
                del Comahue certifica que: <b>{{ $arregloRendimiento['Alumno']['Apellido'] }}, {{ $arregloRendimiento['Alumno']['Nombre'] }}</b> —
                {{ $arregloRendimiento['Documento']['Tipo'] }}: <b>{{ $arregloRendimiento['Documento']['Nro'] }}</b> Legajo Nro. <b>{{ $arregloRendimiento['Alumno']['Legajo'] }}</b>,
                estudiante de la carrera <b>{{ $arregloRendimiento['Carrera'] }}</b>, ha cursado y aprobado las asignaturas correspondientes al
                Plan de Estudios Ordenanza (CS) N.º <b>{{ $arregloRendimiento['Plan']['Nro'] }}/{{ $arregloRendimiento['Plan']['Anio'] }}</b>.
            </p>
            <p>
                Se adjunta el Rendimiento Académico, el Plan de Estudios, y los programas de las asignaturas aprobadas con examen final
                o promoción, que son copia fiel de los originales que obran en dependencia del Centro Regional.
            </p>
            <p>
                La escala de calificación que rige en esta Universidad según Reglamentación General de Administración Académica de carreras de Grado,
                Ordenanza (CS) N.º 273/18 es la siguiente:
            </p>
            <ul>
                <li>
                    Sobresaliente: diez (10); Distinguido: nueve (9); Muy Bueno: ocho (8); Bueno siete (7); seis (6); Suficiente: cinco (5); cuatro (4); Insuficiente: tres (3); dos (2); uno (1).
                </li>
            </ul>
            <p>
                A pedido del/la estudiante, y para ser presentado ante las autoridades que lo requieran, se extiende
                el presente en la Ciudad de {{ $arregloRendimiento['Lugar'] }}, para {{ $fecha }}.
            </p>
        </textarea>
    </div>

    <!-- EDITAR PIE DE PÁGINA -->
    <div class="form-group">
        <a id="answer1" class="btn botonFormulario2" data-bs-toggle="collapse" href="#footer_editor" role="button" aria-expanded="false" aria-controls="footer_editor">
            Editar pie de página  <i class="fas fa-angle-down" aria-hidden="true" id="answer11"></i>
        </a>

        <div class="collapse" id="footer_editor">
            <div class="card card-body p-0">
                <textarea class="ckeditor form-control" name="footer">
                    <p>Buenos Aires 1400, Q8300 Neuquén</p>
                    <p><strong>TEL:</strong> +54 299 123 4567</p>
                    <p><strong>EMAIL:</strong> departamento.alumnos@abc.uncoma.edu.ar</p>
                    <p><i>Ley de creación de la Universidad Nacional del Comahue N.° 19117 del 15 de julio de 1971</i></p>
                </textarea>
            </div>
        </div>
    </div>
    <div class="form-group mt-3 d-lg-flex">
        <input type="hidden" name="id_solicitud" value="{{ $solicitud->id_solicitud }}">
        <div class="col-12 col-lg-8 p-1 ">
            <input type="button" value="Guardar y Descargar nota.pdf" class="btn botonFormulario" data-bs-toggle="modal" data-bs-target="#login_check">
        </div>
        <div class="col-12 col-lg-4 p-1 ">
            <a href="{{route('solicitud.show',$solicitud->id_solicitud)}}" class="btn {{ (session('success')) ? 'botonFormulario2' : 'botonFormulario2 disabled' }}" id="btn_continuar">Continuar</a>
        </div>
    </div>

</form>

<!-- Modal autenticar contraseña -->
<div class="modal fade" id="login_check" tabindex="-1" aria-labelledby="login_check" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="login_check_h">Debes confirmar tu contraseña</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="input_contrasenia">Contraseña</label>
                    <input type="password" name="password" id="input_contrasenia" class="form-control">
                </div>
            </div>
         
      <div class="modal-footer">
        <button type="button" class="btn botonFormulario" id="modal_sesion_submit">Autenticar y continuar</button>
      </div>
    </div>
</div>
</div>

<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        /**
        * Al momento de cargar el documento, se reemplaza el textarea por la app ckeditor
        */
        $('.ckeditor').ckeditor();
    });
    /*
    * Este método es temporal para mostrar el uso de la aplicación
    * Donde el usuario debe confirmar su contraseña (autenticarse en el sistema)
    * para poder enviar la nota (generar el pdf firmado)
    */
    $('#modal_sesion_submit').on('click', function () {
        $.post({
            url: "{{ route('notada.auth') }}",
            data: {
                '_token': '{{ csrf_token() }}',
                'contrasenia': $('#input_contrasenia').val()
            },
            success: function( data ) {
                if (data === 'true'){
                     $('#formulario_nota').submit();
                    $('#login_check').modal('toggle');
                    //$('#btn_continuar').attr("href", '/solicitud/');
                    $('#btn_continuar').removeClass('btn-secondary disabled');
                    $('#btn_continuar').addClass('btn-success');
                }
            }
        });
    });
</script>
{{-- para que las flechitas de los botones cambien al expandir el acordeòn --}}
<script>
    $("#answer1, #answer11").click(function() {
        $("#answer11").toggleClass("fas fa-angle-down fas fa-angle-up");
    });   
</script>
</div>
@endsection

@extends('estructura/layout')
@section('cuerpo')
@include('estructura/header')

@php
    $directorio = storage_path('app/id-solicitud-'.$id_solicitud.'/rendimientoAcademico'.$id_solicitud.'.json');
    $arregloRendimiento = json_decode(file_get_contents($directorio),true);
    $fecha = date('d') . ' de ' . date('M') . ' del ' . date('Y');
@endphp

<form id="formulario_nota" action="{{ route('notaDA.store') }}" method="POST" class="container w-75 py-2">
    @csrf
    <h2 class="text-center">Crear nota</h2>
    
    <div class="alert alert-success" role="alert">
        Puedes editar el contenido a necesidad, y agregar por ejemplo:
        <ul>
            <li>Sanciones disciplinarias</li>
            <li>Cambiar fechas, localidades</li>
        </ul>
    </div>

    <div class="form-group">
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
        <a class="btn btn-light btn-lg d-block" data-bs-toggle="collapse" href="#footer_editor" role="button" aria-expanded="false" aria-controls="footer_editor">
            Editar pie de página
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

    <div class="form-group mt-2">
        <input type="hidden" name="id_solicitud" value="{{ $id_solicitud }}">
        <input type="button" value="Guardar nota" class="form-control btn btn-primary" data-bs-toggle="modal" data-bs-target="#login_check">
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
        <button type="button" class="btn btn-primary" id="modal_sesion_submit">Autenticar y continuar</button>
      </div>
    </div>
  </div>
</div>

<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
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
            url: '{{ route('notada.auth') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'contrasenia': $('#input_contrasenia').val()
            },
            success: function( data ) {
                console.log(data);
                if (data === 'true') {
                    $('#formulario_nota').submit();
                }
            }
        });
    });
</script>

@endsection
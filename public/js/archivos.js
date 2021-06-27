$('input[name=seleccion]').click(function () {
    $('#href-download').removeClass('disabled');
    $('#href-carga-archivo').removeClass('disabled');
    $('#href-comentar').removeClass('disabled');
    $('#href-aprobar').removeClass('disabled');

    id = $(this).val();

    /* Esto es para cambiar la url del ver mas */
    url = $('#href-download').attr('href');
    cadenaNueva = url.slice(0, 26);
    cadenaFinal = cadenaNueva + id + '/download';
    $('#href-download').attr('href', cadenaFinal);

    /* Esto es para cambiar la url del cargar archivo */
    urlCargaArchivo = $('#href-carga-archivo').attr('href');
    cadenaNuevaCargaArchivo = urlCargaArchivo.slice(0, 38);
    cadenaFinalCargaArchivo = cadenaNuevaCargaArchivo + id;
    $('#href-carga-archivo').attr('href', cadenaFinalCargaArchivo);

    /* Esto es para cambiar la url del action del form del modal */
    urlAprobacion = $('#formAprobar').attr('action');
    cadenaNuevaAprobacion = urlAprobacion.slice(0, 26);
    cadenaFinalAprobacion = cadenaNuevaAprobacion + id + '/confirmarContrasenia';
    $('#formAprobar').attr('action', cadenaFinalAprobacion);

    /* Esto es para cambiar la url del action del form del modal para aprobar */


})


/* --- Validaciones usando Bootstrap nativo ---
 * Documentación: https://getbootstrap.com/docs/5.0/forms/validation/
 */

// Función para activar validaciones al pulsar submit
$(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
      var forms = document.getElementsByClassName('needs-validation');
      // Bucle sobre ellos y previene enviar
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
});

/* --- Validaciones Bootstrap --- */
$(function() {
    $("#formCreate").validate({
        success: function(label) {
            label.addClass("valid").text("Listo");
        },
        rules: {
            nombre: {
                required: true,
                minlength: 2,
                maxlength: 150,
            },
            apellido: {
                required: true,
                minlength: 2,
                maxlength: 150,
            },
            legajo: {
                required: true,
                minlength: 2,
                maxlength: 50,
            },
            universidadDestino: {
                minlength: 2,
                maxlength: 255,
            },
        },
        messages: {
            nombre: {
                required: "Debes completar este campo",
                minlength: "El nombre debe contener al menos 2 letras",
                maxlength: "El nombre es demasiado largo"
            },
            apellido: {
                required: "Debes completar este campo",
                minlength: "El apellido debe contener al menos 2 letras",
                maxlength: "El apellido es demasiado largo"
            },
            legajo: {
                required: "Debes completar este campo",
                minlength: "El legajo debe contener al menos 2 caracteres",
                maxlength: "El legajo es demasiado largo"
            },
            universidadDestino: {
                minlength: "La institución debe contener al menos 2 caracteres",
                maxlength: "El texto es demasiado largo"
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );

            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });
});

// Próximamente probar agregar este regexp para filtrar símbolos inválidos en campos de nombres: /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð,.'-]+$/umg

// Para cuando se modifique algún campo, advierta antes de salir o recargar la página:
$('#formCreate, #formRegistro').confirmarSalir('');

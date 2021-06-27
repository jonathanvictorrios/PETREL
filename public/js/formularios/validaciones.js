/* --- Validaciones usando plugin JQuery .validate ---
 * Documentación: https://jqueryvalidation.org/documentation/
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

/* --- Expresiones regulares (regex) --- */

var regexLegajo = /^([a-z]{0,9}\s){0,1}(\d{1,9})$/i;
/* Legajo: Acepta hasta solo 9 dígitos, o sino 9 letras, un espacio y 9 dígitos

Tests:
No - FAI-1100
No - FAI-1100
Si - FAI 1100
Si - 21100
Si - FAIWEB 1100
Si - FAIWEB
No - FAIWEB1100
Si - 1
No - F
*/

// var regexNombreLatino = /^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u;
/* NO LO LEE JAVASCRIPT, SE USA EL DE ABAJO - regexNombreLatino: Cualquier nombre con tildes y caracteres latinos (no japonés, hebreo, árabe, etc.), sin otros símbolos ni puntos.
Fuente: https://andrewwoods.net/blog/2018/name-validation-regex/

Tests:
Si - Juan Perez
No - Juan2
Si - Héctor Nuñez
Si - Kevin O'ßáçøñ
*/

var regexNombre = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð,.'\s-]+$/u;
// Lo mismo que de arriba pero explícito, permite espacios pero no puntos.

/* --- Validaciones formularios --- */

$(function() {
    // Agregar método regex al validador:
    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
        },
        "Por favor, respeta el formato ingresado"
    );

    $("#formCreate").validate({
        rules: {
            nombre: {
                required: true,
                minlength: 2,
                maxlength: 150,
                regex: regexNombre
            },
            apellido: {
                required: true,
                minlength: 2,
                maxlength: 150,
                regex: regexNombre
            },
            legajo: {
                required: true,
                minlength: 2,
                maxlength: 50,
                regex: regexLegajo
            },
            universidadDestino: {
                minlength: 2,
                maxlength: 255
            },
        },
        messages: {
            nombre: {
                required: "Debes completar el nombre",
                minlength: "El nombre debe contener al menos 2 letras",
                maxlength: "El nombre es demasiado largo",
                regex: "El nombre no puede contener números ni otros símbolos"
            },
            apellido: {
                required: "Debes completar el apellido",
                minlength: "El apellido debe contener al menos 2 letras",
                maxlength: "El apellido es demasiado largo",
                regex: "El nombre no puede contener números ni otros símbolos"
            },
            legajo: {
                required: "Debes completar el legajo",
                minlength: "El legajo debe contener al menos 2 caracteres",
                maxlength: "El legajo es demasiado largo",
                regex: "El legajo es solo númerico o con un espacio delante de las iniciales, sin símbolos (ej: FAI 1234)"
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
        success: function(label) {
            label.addClass("valid-feedback").text("Listo");
            label.removeClass("invalid-feedback");
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( errorClass ).removeClass( validClass );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( validClass ).removeClass( errorClass );
        }
    });

    $("#formRegistro").validate({
        success: function(label) {
            label.addClass("valid-feedback").text("Listo");
        },
        rules: {
            nombre: {
                required: true,
                minlength: 2,
                maxlength: 150,
                regex: regexNombre
            },
            apellido: {
                required: true,
                minlength: 2,
                maxlength: 150,
                regex: regexNombre
            },
            email: {
                required: true,
                email: true
            },
            dni: {
                required: true,
                minlength: 2,
                maxlength: 12,
                digits: true
            }, /* Se usa validarClave.js
            pass: {
                required: true,
            }, */
            repitePass: {
                required: true,
                equalTo: "#pass"
            }
        },
        messages: {
            nombre: {
                required: "Debes completar el nombre",
                minlength: "El nombre debe contener al menos 2 letras",
                maxlength: "El nombre es demasiado largo",
                regex: "El nombre no puede contener números ni otros símbolos"
            },
            apellido: {
                required: "Debes completar el apellido",
                minlength: "El apellido debe contener al menos 2 letras",
                maxlength: "El apellido es demasiado largo",
                regex: "El nombre no puede contener números ni otros símbolos"
            },
            email: {
                required: "Debes completar el correo",
                email: "Debes ingresar un formato válido de correo"
            },
            dni: {
                required: "Debes completar el DNI",
                minlength: "El número de DNI es demasiado corto",
                maxlength: "El número de DNI es demasiado largo",
                digits: "Ingresa solo números, sin puntos"
            },
            pass: {
                required: "Debes completar la contraseña",
                minlength: "La contraseña es demasiado corta",
                maxlength: "La contraseña es demasiado larga",
                required: "Debes ingresar la contraseña"
            },
            repitePass: {
                required: "Debes completar de nuevo la contraseña",
                equalTo: "La contraseña ingresada no coincide"
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

// Para cuando se modifique algún campo, advierta antes de salir o recargar la página:
$('#formCreate, #formRegistro').confirmarSalir('');

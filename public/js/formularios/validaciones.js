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
    // Ajustes por defecto, cómo muestra errores:
    $.validator.setDefaults({
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");
            error.removeClass("valid-feedback");

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

    // Agregar método regex al validador:
    $.validator.addMethod( "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Por favor, respeta el formato ingresado"
    );

    // Agregar método extensión al validador. Documentación: https://jqueryvalidation.org/extension-method/
    $.validator.addMethod( "extension",
        function( value, element, param ) {
            param = typeof param === "string" ? param.replace( /,/g, "|" ) : "png|jpe?g|gif";
            return this.optional( element ) || value.match( new RegExp( "\\.(" + param + ")$", "i" ) );
        }, $.validator.format( "Por favor, ingresa un formato de archivo válido" )
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
        }
    });

    $("#formRegistro").validate({
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
                min: 1,
                max: 99999999,
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
                min: "El número de DNI es demasiado corto",
                max: "El número de DNI es demasiado largo",
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
        }
    });

    $("#formExcel").validate({
        rules: {
            excel: {
                required: true,
                extension: "xls|xlsx|xlsb|xlsx|xlt|xl|xmlm|csv|ods|txt"
            }
        },
        messages: {
            excel: {
                required: "Debes elegir un archivo",
                extension: "Solo se admiten formatos de Excel y CSV"
            }
        }
    });

    $("#formPrograma").validate({
        rules: {
            nombrePrograma: {
                required: true,
                minlength: 3,
                maxlength: 250
            },
            numeroPrograma: {
                required: true,
                min: 1,
                maxlength: 250,
                digits: true
            },
            pdfPrograma: {
                required: true,
                extension: "pdf"
            }
        },
        messages: {
            nombre: {
                required: "Debes completar el nombre del programa",
                minlength: "El nombre debe contener al menos 3 letras",
                maxlength: "El nombre es demasiado largo",
                regex: "El nombre no puede contener números ni otros símbolos"
            },
            numeroPrograma: {
                required: "Debes completar el número del programa",
                min: "El número de programa debe ser entero positivo",
                maxlength: "El número de programa es demasiado largo",
                digits: true
            },
            pdfPrograma: {
                required: "Debes elegir un archivo",
                extension: "Solo se admiten formatos PDF"
            }
        }
    });

    $("#formulario_nota").validate({
        rules: {
            'urlRanquel[]': {
                required: true,
                url:  true
            } /*, Formulario en notaDptoAlum/create - Difícil validar porque usa ckeditor y ya trae texto por defecto
            contenido: {
                required: true
            },
            footer: {
                required: true
            } */
        },
        messages: {
            'urlRanquel[]': {
                required: "Debes ingresar un enlace",
                extension: "El enlace debe respetar formato URL (ej: http://ejemplo.com)"
            }
        }
    });

    $("#formCarpeta").validate({
        rules: {
            carrera: {
                required: true,
                minlength: 3,
                maxlength: 250,
                regex: regexNombre
            },
            anio: {
                required: true,
                range: [1980, 9999]
            },
        },
        messages: {
            carrera: {
                required: "Debes completar el nombre",
                minlength: "El nombre debe contener al menos 3 letras",
                maxlength: "El nombre es demasiado largo",
                regex: "El nombre no puede contener números ni otros símbolos"
            },
            anio: {
                required: "Debes completar el año",
                range: "El año debe ser de cuatro cifras"
            },
        }
    });
});

// Para cuando se modifique algún campo, advierta antes de salir o recargar la página:
$('#formCreate, #formRegistro, #formExcel, #formPrograma, #formulario_nota, #formCarpeta').confirmarSalir('');

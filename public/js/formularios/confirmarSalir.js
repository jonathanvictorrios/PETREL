/*!
 * jQuery confirmExit plugin
 * https://github.com/dunglas/jquery.confirmExit
 *
 * Copyright 2012 Kévin Dunglas <dunglas@gmail.com>
 * Released under the MIT license
 * http://www.opensource.org/licenses/mit-license.php
 */
(function ($) {
    $.fn.confirmarSalir = function (avisoCartel) {
        var confirmarSalir = false;

        $('input, textarea, select', this).on('change keyup', function () {
            // No llamar a este método si no hace falta
            if (!confirmarSalir) {
                confirmarSalir = true;

                window.onbeforeunload = function (event) {
                    var e = event || window.event;

                    // Para Internet Explorer viejo y Firefox:
                    if (e) {
                        e.returnValue = avisoCartel;
                    }

                    return avisoCartel;
                }
            }
        });

        this.submit(function () {
            window.onbeforeunload = null;
            confirmarSalir = false;
        });

        return this;
    }
})(jQuery);

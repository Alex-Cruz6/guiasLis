(function () {
    //Agregar al manejador de evento load la función init())
    if (window.addEventListener) window.addEventListener("load", init, false);
    else if (window.attachEvent) window.attachEvent("onload", init);

    // Buscar en el documento todos los elementos INPUT de tipo texto, ya que
    // solamente en ellos se va a registrar un controlador de evento.
    function init() {
        var inputtag2 = document.getElementById("potencia");
        // Hacer un recorrido por todos los campos del formulario
        if (inputtag2.addEventListener) {
            inputtag2.addEventListener("keypress", filter2, false);
            //Calcular el factorial del número
        }
    }

    function filter2(event) {
        // Obtener el objeto event y el código de carácter de la tecla pulsada
        // de forma compatible con todos los navegadores
        var e = event || window.event;         // Objeto de evento de la tecla
        var code = e.charCode || e.keyCode;    // tecla que se ha pulsado

        // Si se ha pulsado una tecla de función de cualquier tipo, no filtrarla
        if (e.charCode == 0) return true;       // Tecla de función (solo para Firefox)
        if (e.ctrlKey || e.altKey) return true; // Se mantienen presionadas Ctrl o Alt
        if (code < 32) return true;             // Carácter de Ctrl en tabla ASCII

        // Dejar pasar teclas de retroceso (BackSpace), tabulación (Tab), entrada (Enter) y 
        // escape (Scape)
        if (code == 0 || code == 8 || code == 9 || code == 13 || code == 27) return true;

        // Buscar la información de los caracteres válidos para este campo de entrada
        var allowed = "0123456789";     // Caracteres válidos
        var messageElement = document.getElementById("numbersOnly");  // Mensaja a ocultar/mostrar

        // Convertir el código de carácter a su carácter correspondiente
        var c = String.fromCharCode(code);

        // Comprobar si el carácter está dentro del conjunto de caracteres permitidos
        if (allowed.indexOf(c) != -1 || allowed.indexOf(c) == ".") {
            // Si c es un carácter legal, ocultar el mensaje, si es que existe.
            if (messageElement) messageElement.style.visibility = "hidden";
            return true; // Aceptar el carácter
        }
    }
})();
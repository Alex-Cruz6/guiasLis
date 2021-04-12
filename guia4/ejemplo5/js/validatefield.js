function init(){
    var inputtag = document.getElementById("edad");
    (inputtag.addEventListener) ? inputtag.addEventListener("keypress", numbersOnly, false) : inputtag.onkeypress = numbersOnly;
}

// Este es el controlador keypress que filtra la entrada del usuario
function numbersOnly(event) {
    // Obtener el objeto event y el código de carácter de la tecla pulsada
    // de forma compatible con todos los navegadores
    var e = event || window.event;         // Objeto de evento de la tecla
    var code = e.charCode || e.keyCode;    // tecla que se ha pulsado

    // Si se ha pulsado una tecla de función de cualquier tipo, no filtrarla
    if(e.charCode == 0) return true;       // Tecla de función (solo para Firefox)
    if(e.ctrlKey || e.altKey) return true; // Se mantienen presionadas Ctrl o Alt
    if(code < 32) return true;             // Carácter de Ctrl en tabla ASCII
        
    // Dejar pasar teclas de retroceso (BackSpace), tabulación (Tab), entrada (Enter), 
    // escape (Scape) y espacios en blanco (SpaceBar)
    if(code==0 || code==8 || code==9 || code==13 || code==27 || code==32) return true; 

    // Buscar la información de los caracteres válidos para este campo de entrada
    var allowed = "0123456789";     // Caracteres válidos
    var messageElement = document.getElementById("numbersOnly");  // Mensaja a ocultar/mostrar

    // Convertir el código de carácter a su carácter correspondiente
    var c = String.fromCharCode(code);
        
    // Comprobar si el carácter está dentro del conjunto de caracteres permitidos
    if (allowed.indexOf(c) != -1) {
        // Si c es un carácter legal, ocultar el mensaje, si es que existe.
        if(messageElement) messageElement.style.visibility = "hidden";
        return true; // Aceptar el carácter
    }
    else {
        // Si c no está en el conjunto de caracteres permitidos, mostrar el mensaje
        if(messageElement) messageElement.style.visibility = "visible";
            // Y rechazar este evento keypress
            if(e.preventDefault) e.preventDefault();
            if(e.returnValue) e.returnValue = false;
            return false;
        }
    }

addEvent(window, 'load', init);
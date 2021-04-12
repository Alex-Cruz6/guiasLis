function disableTextBox(){
    document.Info.presta.onclick = function(){
        document.Info.prestamo.disabled = !document.Info.prestamo.disabled;
    }
}

function addLoadEvent(func) {
    var oldonload = window.onload;
        if(typeof window.onload != 'function') {
            window.onload = func;
    }
    else {
        window.onload = function() {
            if(oldonload) {
                oldonload();
            }
            func();
        }
    }
}

addLoadEvent(disableTextBox);
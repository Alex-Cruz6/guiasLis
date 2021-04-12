function init() {
    var apertura = document.getElementById("apertura");
    var deposito = document.getElementById("deposito");
    var retiro = document.getElementById("retiro");
    var clsName;
    //alert(hElement + " | " + clsName);
    //Controlar evento click sobre el botón apertura
    if (apertura.addEventListener) {
        apertura.addEventListener("click", function () {
            ocultar();
        }, false);
    }
    else if (apertura.attachEvent) {
        apertura.attachEvent("onclick", function () {
            ocultar();
        });
    }
    //Controlar evento click sobre botón deposito
    if (deposito.addEventListener) {
        deposito.addEventListener("click", function () {
            mostrar();
        }, false);
    }
    else if (deposito.attachEvent) {
        deposito.attachEvent("onclick", function () {
            mostrar();
        });
    }
    //Controlar evento click sobre botón retiro
    if (retiro.addEventListener) {
        retiro.addEventListener("click", function () {
            mostrar();
        }, false);
    }
    else if (retiro.attachEvent) {
        retiro.attachEvent("onclick", function () {
            mostrar();
        });
    }
}
function mostrar() {
    document.getElementById("cuenta").style.display = "block";
}
function ocultar() {
    document.getElementById("cuenta").style.display = "none";
}

if (window.addEventListener) {
    window.addEventListener("load", ocultar, false);
    window.addEventListener("load", init, false);
}
else if (window.attachEvent) {
    window.attachEvent("onload", ocultar);
    window.attachEvent("onload", init);
}
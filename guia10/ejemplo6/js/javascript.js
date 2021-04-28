function nuevoAjax() {
    var objetoAjax = false; 
    try {
        //Navegadores anteriores a Internet Explorer 6.0
        objetoAjax = new ActiveXObject("Msxm12.XMLHTTP");
    }catch(e){
        try{
            //Para Internet Explorer 6.0 y superiores
            objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(E){
            objetoAjax = false;
        }
    }
    if(!objetoAjax && typeof XMLHttpRequest != 'undefined'){
        objetoAjax = new XMLHttpRequest();
    }
    return objetoAjax;
}
function cargarResultados(){
    divResultado = document.getElementById('resultados');
    codenc = document.frmencuesta.cod.value;
    opc = document.frmencuesta.opciones.value; 
    i = 1; 
    while (i <= opc) { 
        opcion = document.getElementById('opcion' + i).checked; 
        if (opcion == true) { 
            alt = i; 
        } 
        i++; 
    } 
    ajax = nuevoAjax(); 
    ajax.open("POST", "resultados.php", true); 
    ajax.onreadystatechange = function () { 
        if (ajax.readyState == 4 && ajax.status == 200) { 
            divResultado.innerHTML = ajax.responseText; 
        } 
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
    ajax.send("idenc=" + codenc + "&alternativa=" + alt);
}
function getXmlHttpRequest() {
    //Variable para comprobar el navegador
    var xmlhttp = false;
    //Comprobar si es IE
    try {
        //Verificar si la version de JS es superior a la 5
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(e){
        //Si no, utilizar el antiguo objeto ActiveX
        try {
            //Sise está usando Internet Explorer
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(E){ 
            //Caso contrario se está usando un navegador diferente
            xmlhttp = false;
        }
    }
    //Si no se usa IE entonces crear una instancia JS del objeto
    if(!xmlhttp && typeof XMLHttpRequest != 'undefined'){
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
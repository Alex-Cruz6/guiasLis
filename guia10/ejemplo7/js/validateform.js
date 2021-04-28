/*******************************************************
* Validar Formulario Accesible sin onSubmit            *
* (c)2009 Alejandro Arco                               *
* Por Alejandro Arco -http://www.alejandroarco.es      *
*******************************************************/

validateForm = function () {
    var nombre = new Array(document.getElementById('nombre'), document.nuevo_empleado['nombre'].value); 
    var apellido = new Array(document.getElementById('apellido'), document.nuevo_empleado['apellido'].value); 
    var correo = new Array(document.getElementById('correo'), document.nuevo_empleado['correo'].value); 
    var submit = document.getElementById('guardar');   
    /* Eventos */  
    nombre[0].onfocus = onFocus; 
    nombre[0].onblur = onBlur; 
    apellido[0].onfocus = onFocus; 
    apellido[0].onblur = onBlur; 
    correo[0].onfocus = onFocus; 
    correo[0].onblur = onBlur; 
    submit.onclick = validateFields;
    /* Funciones */  
    function onFocus() { 
        if (document.nuevo_empleado[this.name].value == eval(this.name)[1]) 
            document.nuevo_empleado[this.name].value = ''; 
    } 
    function onBlur() { 
        var value = document.nuevo_empleado[this.name].value; 
        value = value.replace(/^\s*/, ''); 
        value = value.replace(/\s*$/, ''); 
        if (!value) document.nuevo_empleado[this.name].value = eval(this.name)[1]; 
    } 
    function validateFields() {
        if (document.nuevo_empleado['nombre'].value == nombre[1]) { 
            document.nuevo_empleado['nombre'].focus(); 
            alert('El campo "nombre" es obligatorio.'); 
        } else if (document.nuevo_empleado['apellido'].value == apellido[1]) { 
            document.nuevo_empleado['apellido'].focus(); 
            alert('El campo "apellido" es obligatorio.'); 
        } else if (document.nuevo_empleado['correo'].value == correo[1]) { 
            document.nuevo_empleado['correo'].focus(); 
            alert('El campo "correo" es obligatorio.'); 
        } else {
            enviarDatosEmpleado();
            //return true; 
        }return false;  
    }  
}  
if (document.all && window.attachEvent) { 
    window.attachEvent("onload", validateForm); 
    // IE-Win  
} else if(window.addEventListener) { 
    window.addEventListener("load",validateForm,false); 
    // Otros  
}
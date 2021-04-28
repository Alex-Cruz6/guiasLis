//Archivo: dynamicForms.js
function init(){
    var pais;
    var i = 0;
    var paisField = document.myForm.country;
    var textFields = document.getElementsByClassName("formInputText");
    if(paisField.addEventListener){
        //Al cambiar la opción del campo select name="country"
        //Detectar el nuevo país seleccionado y llamar a la función chooseCountry()
        paisField.addEventListener("change", function(){
            pais = document.myForm.country.options[document.myForm.country.selectedIndex].text;
            chooseCountry(pais, document.getElementsByTagName("select")[1].getAttribute("name"));
        }, false);
    }else if(paisField.attachEvent){
        paisField.addEventListener("onchange", function(){
            pais = document.myForm.country.options[document.myForm.country.selectedIndex].text;
            chooseCountry(pais, document.getElementsByTagName("select")[1].getAttribute("name"));
        });
    }
    /* Al existir el atributo placeholder, esto ya no es necesario
        for(i=0; i<textFields.length; i++){
            if(textFields[i].addEventListener){
                textFields[i].addEventListener("focus", function(){
                    clearField(this);
                }, false);
            }else if(textFields[i].attachEvent){
                textFields[i].addEventListener("onfocus", function(){
                    clearField(this);
                });
            }
        } 
    */
}
function clearField(obj) { 
    if (obj.defaultValue == obj.value) obj.value = ''; 
} 
function chooseCountry(requestedData, objectID) { 
    fetchData('dataPage.php', requestedData, objectID); 
} 
function filterData(pageRequest, objectID) { 
    if (pageRequest.readyState == 4 && (pageRequest.status == 200 || window.location.href.indexOf("http") == -1)) { 
        var object = document.getElementById(objectID); 
        object.options.length = 0; 
        if (pageRequest.responseText == '(Elige un país primero)') { 
            alert("No elegiste un país"); 
        } 
        if (pageRequest.responseText != '') { 
            var arrSecondaryData = pageRequest.responseText.split(','); 
            for (i = 0; i < arrSecondaryData.length; i++) { 
                if (arrSecondaryData[i] != '') { 
                    object.options[object.options.length] = new Option(arrSecondaryData[i], arrSecondaryData[i]);
                    //alert("Agregado " + arrSecondaryData[i]);
                }
            }
        }
    }
}
if(window.addEventListener){
    window.addEventListener("load", init, false);
}else if(window.attachEvent){
    window.attachEvent("onload", init);
}
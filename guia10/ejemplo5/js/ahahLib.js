/******************************************************************************/
/*   AHAH functions by Phil Ballard                                           */
/*   Este código ha sido desarrollado únicamente con propósitos de estudio.   */
/*   Puedes hacer uso de este código, ya sea con propósito comercial o no.    */
/*   sin embargo; note que el autor no garantiza su utilidad, idoneidad       */
/*   o precisión y se exime de cualquier responsabilidad por la pérdida       */
/*   de datos en el uso del mismo.                                            */
/******************************************************************************/

function callAHAH(url, pageElement, callMessage, errorMessage) { 
    document.getElementById(pageElement).innerHTML = callMessage; 
    try {
        /* Par navegadores como Firefox, Safari, Chrome, Opera, etc */
        req = new XMLHttpRequest(); 
    } catch (e) { 
        try { 
            req = new ActiveXObject("Msxml2.XMLHTTP");  
            /* some versions IE */ 
        } catch (e) { 
            try { 
                req = new ActiveXObject("Microsoft.XMLHTTP");  
                /* some versions IE */ 
            } catch (E) { 
                req = false; 
            } 
        } 
    } 
    req.onreadystatechange = function () { 
        responseAHAH(pageElement, errorMessage); 
    };
    req.open("GET", url, true); 
    req.send(null); 
} 
function responseAHAH(pageElement, errorMessage) {
    var output = '';
    if (req.readyState == 4) { 
        if (req.status == 200) { 
            output = req.responseText; 
            document.getElementById(pageElement).innerHTML = output; 
        } else { 
            document.getElementById(pageElement).innerHTML = errorMessage + "\n" + output; 
        } 
    }
}
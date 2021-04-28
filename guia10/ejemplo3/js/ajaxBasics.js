function fetchData(url, dataRequested, objectID) { 
    if (dataRequested) { 
        var dataRequest = "dataRequest=" + dataRequested; 
    } 
    var pageRequest = false; 
    if (window.XMLHttpRequest) { 
        pageRequest = new XMLHttpRequest(); 
    } else if (window.ActiveXObject) { 
        try { 
            pageRequest = new ActiveXObject("Msxml2.XMLHTTP"); 
        } catch (e) { 
            try { 
                pageRequest = new ActiveXObject("Microsoft.XMLHTTP"); 
            } catch (e) { } 
        } 
    } else { return false; } 
    pageRequest.onreadystatechange = function () { 
        filterData(pageRequest, objectID); 
    }
    if (dataRequested) { 
        pageRequest.open('POST', url, true); 
        pageRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
        pageRequest.send(dataRequest); 
    } else { 
        pageRequest.open('GET', url, true); 
        pageRequest.send(null); 
    } 
}
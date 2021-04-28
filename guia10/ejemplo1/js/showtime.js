var xmlhttp = getXmlHttpRequest(); 
function getServerTime() { 
    var myurl = "timexml.php"; 
    myrand = parseInt(Math.random() * 999999999999999); 
    var modurl = myurl + "?rand=" + myrand; xmlhttp.open("GET", modurl, true); 
    xmlhttp.onreadystatechange = useHttpResponse; 
    xmlhttp.send(null); 
} 
function useHttpResponse() { 
    if (xmlhttp.readyState == 4) { 
        if (xmlhttp.status == 200) { 
            var timeValue = xmlhttp.responseXML.getElementsByTagName("timenow")[0]; 
            document.getElementById('showtime').innerHTML = "<p class=\"time\">" + timeValue.childNodes[0].nodeValue + "</p>"; 
        } 
    } else { 
        document.getElementById('showtime').innerHTML = "<img src=\"images/loading43.gif\" />"; 
    } 
}
function init(){
    celda = document.getElementsByClassName("dato");
    total = celda.length;
    for(i=0; i<total; i++){
        if(celda[i].addEventListener){
            celda[i].addEventListener("mouseover", highlight, false);
        }
        else if(celda[i].attachEvent){
            celda[i].attachEvent("onmouseover", highlight);
        }
    }
    for(i=0; i<total; i++){
        if(celda[i].addEventListener){
            celda[i].addEventListener("mouseout", attenuate, false);
        }
        else if(celda[i].attachEvent){
            celda[i].attachEvent("onmouseout", attenuate);
        }
    }
}

function highlight(){
    this.className = "apuntado";
}

function attenuate(){
	this.className = "dato";
}

if(window.addEventListener){
    window.addEventListener("load", init, false);
}
else if(window.attachEvent){
    window.attachEvent("onload", init);
}
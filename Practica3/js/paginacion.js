function cambio_pagina(pagina, total){
    if(pagina>=0 && pagina<=total){
        for(var i = 0 ; i <= total ; i++){
            document.getElementById(String(i)).style.display = "none" ;
            if(document.getElementById("numero" + String(i+1)).classList.contains("paginaactiva"))
             document.getElementById("numero" + String(i+1)).classList.remove("paginaactiva");
            console.log("Borrado") ;
        }
        if(document.getElementById(String(pagina)).style.display === "none"){
            document.getElementById(String(pagina)).style.display = "grid" ;
            document.getElementById("numero" + String(pagina+1)).classList.add("paginaactiva");
            console.log("Mostrar" + String(pagina)) ;
        }
    }
    else console.log(String(pagina) + "no vale");
  }
function peticionBusquedaAjax(){
    removeSearches();
    var valor = $("#busqueda").val();
    console.log(valor + "--" + valor.length);
    if(valor.length != 0){
        $.ajax({
            data:{valor},
            url:'busqueda.php',
            type:'post',
            beforeSend:function(){
                document.getElementById("resultados").style.display = "block"; 
                document.getElementById("espera").style.display = "block";
            },
            success:function(respuesta){
                 document.getElementById("espera").style.display = "none";
                decodificarJSON(JSON.parse(respuesta)); 
            }

        })
    }
    else document.getElementById("resultados").style.display = "none";
}



function decodificarJSON(json){
    // Hago la lista
    var eventoSel = -1;
    for (i = 0 ; i < json.length ; i++){
        var a = document.createElement("div");
        a.setAttribute('class','respuesta');
        var b = document.createElement("a");
        b.href="evento.php?evento=" + json[i].Id ;
        b.innerHTML = json[i].Nombre;
        a.appendChild(b);
        document.getElementById("resultados").appendChild(a);
    }

    //Movimiento por la barra de tareas
    document.getElementById("busqueda").addEventListener("keydown",function(tecla){
        var x =  document.getElementsByClassName("respuesta");
        if (x.length > 0){
            if(tecla.keyCode == 40 && eventoSel < x.length){
                 console.log("Abajo");
                 eventoSel++;
                 x[eventoSel].classList.add("autocompletaractivo");
                 x[eventoSel-1].classList.remove("autocompletaractivo");
                 console.log("Evento sel: " + eventoSel + "->" + x[eventoSel]);
            }
            if(tecla.keyCode == 38 && eventoSel >= 0) {
                console.log("Arriba");
                eventoSel--;
                x[eventoSel].classList.add("autocompletaractivo");
                x[eventoSel+1].classList.remove("autocompletaractivo");
                console.log("Evento sel: " + eventoSel + "->" + x[eventoSel]);
            }
            if(tecla.keyCode == 13){
                tecla.preventDefault();
                if(x[eventoSel]){
                    console.log("Evento seleccionado");
                    window.location = x[eventoSel].childNodes[0].href;
                }
            }
        }
    })

    //Si hago click en otro lado, desaparece el campo de búsqueda
    document.getElementById("busqueda").addEventListener("focusout",function(){
        document.getElementById("resultados").style.display = "none" ;
    })
}

function removeSearches(){
    var queries = Array.prototype.slice.call(document.getElementsByClassName("respuesta")) ;

    for(query of queries){
        console.log(query);
        query.remove();
    }
}

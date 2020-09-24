function mostrar(){
  if(document.getElementById("zona_comentarios").style.display === "none")
      document.getElementById("zona_comentarios").style.display = "block" ;
  else
      document.getElementById("zona_comentarios").style.display = "none" ;
}

function crear_comentario() {
  var fecha = new Date() ;
  var text = "<div class=\"comment\">";
  text += "<h3>" + document.getElementById("nombre").value + "," + fecha.getDate() + "/" + fecha.getMonth() + "/" + fecha.getFullYear() + " " + fecha.getHours() +  ":" + fecha.getMinutes() + "$></h3>\n" ;
  text += "<p>" + document.getElementById("texto").value + "</p>\n" ;
  text += "</div>";

  document.getElementById("comments").innerHTML += text ;
}

function validar_comentario(){
  if(document.getElementById("nombre").value === "")
    alert ("No has puesto un nombre") ;
  else
    if(document.getElementById("mail").value === "")
      alert ("No has puesto un correo electrónico") ;
    else
      if(!validar_correo(document.getElementById("mail").value))
        alert ("El correo no es válido") ;
      else
      if(document.getElementById("texto").value === "")
        alert ("No has introducido el comentario") ;
      else
      anadirComentario() ;
}

function validar_correo(mail) {
  var estructura = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return estructura.test(mail) ? true : false;
}

function palabras_baneadas(){
  console.log(document.getElementById('palabrasbans').innerHTML.split("-"));
  var eliminadas = document.getElementById('palabrasbans').innerHTML.split("-");
  var texto_com = document.getElementById("texto").value ;
  for (i=0; i<eliminadas.length; i++){
    if (texto_com.toLowerCase().includes(eliminadas[i])){
      document.getElementById("texto").value = document.getElementById("texto").value.replace(eliminadas[i],'*'.repeat(eliminadas[i].length)) ;
    }
  }
}
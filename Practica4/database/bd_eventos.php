<?php
    include_once("config_bbdd.php");
    include_once("bd_purges.php");
    include_once("bd_imagenes.php");
    include_once("bd_etiquetas.php");

    function getEvento($Id_Evento){
        global $mysqli_bd;

        purgeId($Id_Evento) ;
        $resultado = $mysqli_bd->query("Select id, nombre, lugar, fecha, informacion, ruta_img1, pie_img1, ruta_img2, pie_img2, twitter, facebook, ruta_logo From Eventos Where id=" . $Id_Evento) ;

        $evento = array('nombre' => "Este evento no existe",'lugar' => "Como mi novia (sí, es muy triste)");

        if($resultado->num_rows > 0){
            $fila = $resultado->fetch_assoc();
            $evento = array('id' => $fila['id'] ,'nombre' => $fila['nombre'],'lugar' => $fila['lugar'],
             'fecha' => date('d-m-Y',strtotime($fila['fecha'])), 'informacion' => nl2br($fila['informacion']),
             'ruta_img1' => $fila['ruta_img1'],'pie_img1' => $fila['pie_img1'], 'ruta_img2' => $fila['ruta_img2'],
              'pie_img2' => $fila['pie_img2'], 'twitter' => $fila['twitter'], 'facebook' => $fila['facebook'], 'logo' => $fila['ruta_logo']);
        }

        return $evento ;
    }

    function addEvento($nombre,$fecha,$lugar,$informacion,$twitter,$facebook,$logo,$img1,$pie1,$img2,$pie2,$gestor){
        global $mysqli_bd;
        $mysqli_bd->query("Insert into Eventos(Nombre,Fecha,Lugar,Informacion,Gestor) Values ('$nombre','$fecha','$lugar','$informacion','$gestor')") or die("Nope") ;
        //Metemos las imágenes aparte
        if(isset($logo)){
            $mysqli_bd->query("Update Eventos Set Ruta_Logo='$logo' Where Nombre='$nombre'");
        }
        if(isset($img1)){
            $mysqli_bd->query("Update Eventos Set Ruta_Img1='$img1' Where Nombre='$nombre'");
        }
        if(isset($img2)){
            $mysqli_bd->query("Update Eventos Set Ruta_Img2='$img2' Where Nombre='$nombre'");
        }

        //Y las redes sociales
        if(isset($twitter)){
            $mysqli_bd->query("Update Eventos Set Twitter='$twitter' Where Nombre='$nombre'");
        }
        if(isset($facebook)){
            $mysqli_bd->query("Update Eventos Set Facebook='$facebook' Where Nombre='$nombre'");
        }

        $resultado=$mysqli_bd->query("Select Id From Eventos Where Nombre='$nombre'");
        return $resultado->fetch_assoc()['Id'];
    }

    function modifyEvento($idEv,$nombre,$lugar,$fecha,$informacion,$twitter,$facebook,$img1,$pie1,$img2,$pie2,$logo){
        global $mysqli_bd;
        purgeId($idEv);
        //Vayamos comprobando que está relleno. Si lo está, actualizamos.
        if(isset($nombre)) $mysqli_bd->query("Update Eventos Set Nombre='$nombre' Where Id='$idEv'");
        if(isset($lugar)) $mysqli_bd->query("Update Eventos Set Lugar='$lugar' Where Id='$idEv'");
        if(isset($fecha)) $mysqli_bd->query("Update Eventos Set Fecha='$fecha' Where Id='$idEv'");
        if(isset($informacion)) $mysqli_bd->query("Update Eventos Set Informacion='$informacion' Where Id='$idEv'");
        if(isset($twitter)) $mysqli_bd->query("Update Eventos Set Twitter='$twitter' Where Id='$idEv'");
        if(isset($facebook)) $mysqli_bd->query("Update Eventos Set Facebook='$facebook' Where Id='$idEv'");
        if(isset($img1)) $mysqli_bd->query("Update Eventos Set Ruta_Img1='$img1' Where Id='$idEv'");
        if(isset($pie1)) $mysqli_bd->query("Update Eventos Set Pie_Img1='$pie1' Where Id='$idEv'");
        if(isset($img2)) $mysqli_bd->query("Update Eventos Set Ruta_Img2='$img2' Where Id='$idEv'");
        if(isset($pie2)) $mysqli_bd->query("Update Eventos Set Pie_Img2='$pie2' Where Id='$idEv'");
        if(isset($logo)) $mysqli_bd->query("Update Eventos Set Ruta_Logo='$logo' Where Id='$idEv'");
    }

    function getListaEventos(){
        global $mysqli_bd;

        $resultado = $mysqli_bd->query("Select Id,Nombre,Ruta_Logo From Eventos") ;

        $eventos = array() ;

        while($fila = $resultado->fetch_assoc()){
            $evento = array('Id' => $fila['Id'], 'Nombre' => $fila['Nombre'], 'Ruta_Logo' => $fila['Ruta_Logo']) ;
            if($evento['Ruta_Logo'] == NULL)
            $evento['Ruta_Logo'] = 'img/placeholder.png' ;
            array_push($eventos,$evento) ;
        }

        return $eventos ;
    }

    function getListaEventosGestor($gestor){
        global $mysqli_bd;

        $resultado = $mysqli_bd->query("Select Id,Nombre,Ruta_Logo,Fecha,Lugar From Eventos Where Gestor='$gestor'") ;

        $eventos = array() ;

        while($fila = $resultado->fetch_assoc()){
            $evento = array('Id' => $fila['Id'], 'Nombre' => $fila['Nombre'], 'Ruta_Logo' => $fila['Ruta_Logo'], 'Fecha' => $fila['Fecha'], 'Lugar' => $fila['Lugar']) ;
            if($evento['Ruta_Logo'] == NULL) $evento['Ruta_Logo'] = 'img/placeholder.png' ;
            array_push($eventos,$evento) ;
        }

        return $eventos ;
    }

    function deleteEvento($idEv){
        global $mysqli_bd;
        purgeId($idEv);
        deleteEtiquetas($idEv);
        $mysqli_bd->query("Delete From Eventos Where Id='$idEv'");
    }
?>

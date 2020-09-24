<?php
    include("config_bbdd.php");
    include_once("bd_purges.php");

    function getEvento($Id_Evento){
        global $mysqli_bd;

        purgeId($Id_Evento) ;
        $resultado = $mysqli_bd->query("Select id, nombre, lugar, fecha, informacion, ruta_img1, pie_img1, ruta_img2, pie_img2, twitter, facebook From Eventos Where id=" . $Id_Evento) ;

        $evento = array('nombre' => "Este evento no existe",'lugar' => "Como mi novia (sí, es muy triste)");

        if($resultado->num_rows > 0){
            $fila = $resultado->fetch_assoc();
            $evento = array('id' => $fila['id'] ,'nombre' => $fila['nombre'],'lugar' => $fila['lugar'],
             'fecha' => date('d-m-Y',strtotime($fila['fecha'])), 'informacion' => nl2br($fila['informacion']),
             'ruta_img1' => $fila['ruta_img1'],'pie_img1' => $fila['pie_img1'], 'ruta_img2' => $fila['ruta_img2'],
              'pie_img2' => $fila['pie_img2'], 'twitter' => $fila['twitter'], 'facebook' => $fila['facebook']);
        }

        return $evento ;
    }
?>

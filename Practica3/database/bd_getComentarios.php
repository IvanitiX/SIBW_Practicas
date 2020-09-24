<?php
    include("config_bbdd.php");
    include_once("bd_purges.php") ;

    function getComentarios($Id_Evento){
        global $mysqli_bd;

        purgeId($Id_Evento) ;
        $resultado = $mysqli_bd->query("Select Nombre, Fecha, Hora, Comentario From Comentarios Where Id_Evento=" . $Id_Evento) ;

        $comentario = array('nombre' => "Error", 'comentario' => '404') ;
        $comentarios = array() ;

        while($fila = $resultado->fetch_assoc()){
            $comentario = array('nombre' => $fila['Nombre'], 'fecha' => date('d-m-Y',strtotime($fila['Fecha'])), 'hora' => $fila['Hora'],
                            'comentario' => $fila['Comentario']) ;
            array_push($comentarios,$comentario) ;
        }

        return $comentarios ;
    }
?>
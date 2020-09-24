<?php
    include("config_bbdd.php");
    include_once("bd_eventos.php") ;
    include_once("bd_purges.php");

    function addComentario($Id_Evento,$Id_Comentario,$nick,$mail,$fecha,$hora,$texto){
        global $mysqli_bd;
        purgeId($Id_Evento) ;
        $mysqli_bd->query("Insert into Comentarios Values('$Id_Evento','$Id_Comentario','$nick','$mail','$fecha','$hora','$texto')");
    }

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

    function getComentarioConcreto($Id_Evento,$Id_Comentario){
        global $mysqli_bd;

        purgeId($Id_Evento) ;
        purgeId($Id_Comentario) ;
        $resultado = $mysqli_bd->query("Select Nombre, Fecha, Hora, Comentario From Comentarios Where Id_Evento='$Id_Evento' and Id_Comentario='$Id_Comentario'") ;

        $comentario = $resultado->fetch_assoc() ;
        return $comentario ;
    }

    function getListaComentarios(){
        global $mysqli_bd;

        $resultado = $mysqli_bd->query("Select Id_Evento, Id_Comentario, Nombre, Fecha, Hora, Comentario From Comentarios Order By Id_Evento") ;
        $listaEventos = getListaEventos();
        $eventos = array();
        
        for($i = 0 ; $i<count($listaEventos) ; $i++){
            $nombreEvento = $listaEventos[$i]['Nombre'];
            $eventos[$listaEventos[$i]['Id']] = $nombreEvento;
        }


        $comentarios = array() ;
        $contador = 0 ;
        while($fila = $resultado->fetch_assoc()){
            $comentario = array('Id' => $fila['Id_Evento'], 'IdCom' => $fila['Id_Comentario'], 'Evento' => $eventos[$fila['Id_Evento']] ,'nombre' => $fila['Nombre'], 'fecha' => date('d-m-Y',strtotime($fila['Fecha'])), 'hora' => $fila['Hora'],
                            'comentario' => $fila['Comentario']) ;
            array_push($comentarios,$comentario) ;
            $contador = $contador + 1 ;
        }

        return $comentarios ;
    }

    function modifyComentario($idEv,$idComm,$contenido){
        global $mysqli_bd;
        strip_tags($contenido);
        $mysqli_bd -> query("Update Comentarios Set Comentario='$contenido' Where Id_Evento=$idEv and Id_Comentario=$idComm") or die ("FAIL");
        echo "$resultado";
    }

    function deleteComentario($idEv,$idComm){
        global $mysqli_bd;
        purgeId($idEv);
        purgeId($idComm);
        $mysqli_bd->query("Delete From Comentarios Where Id_Evento='$idEv' and Id_Comentario='$idComm'");
    }
?>
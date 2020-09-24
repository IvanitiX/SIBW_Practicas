<?php
    include_once('config_bbdd.php') ;

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
?>

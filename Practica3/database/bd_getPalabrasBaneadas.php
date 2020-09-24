<?php
    include("config_bbdd.php");

    function getPalabrasBaneadas(){
        global $mysqli_bd;
        $resultado = $mysqli_bd->query("Select Palabras From Palabras_Baneadas") ;

        $palabras = array() ;

        while($fila = $resultado->fetch_assoc()){
            array_push($palabras,$fila['Palabras']);
        }

        return $palabras ;
    }
?>
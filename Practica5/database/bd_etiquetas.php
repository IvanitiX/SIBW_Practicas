<?php
include_once("config_bbdd.php");
include_once("bd_purges.php");

function getEtiquetas($IdEvento){
    global $mysqli_bd;
    $etiquetas = array();

    $resultado=$mysqli_bd->query("Select Etiqueta From Etiquetas Where Id_Evento='$IdEvento'");
    while($fila = $resultado->fetch_assoc()){
        array_push($etiquetas,$fila['Etiqueta']);
    }
    $cadena_etiquetas = implode(' ',$etiquetas);
    return $cadena_etiquetas;
}

function addEtiquetas($IdEvento,$etiquetas){
    global $mysqli_bd;
    $mysqli_bd->real_escape_string($etiquetas);
    foreach($etiquetas as $etiqueta){
        $mysqli_bd->query("Insert into Etiquetas Values ('$IdEvento','$etiqueta')") or die("WinXP");
    }
}

function deleteEtiquetas($IdEvento){
    global $mysqli_bd;
    $mysqli_bd->query("Delete From Etiquetas Where Id_Evento='$IdEvento'");
}
?>
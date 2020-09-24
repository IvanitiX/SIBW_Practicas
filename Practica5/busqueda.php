<?php
    include_once("database/bd_eventos.php");
    include_once("database/bd_usuarios.php");

    session_start();
    if (isset($_SESSION['nickUsuario'])){
      $user = getUser($_SESSION['nickUsuario']);
      $usuario = array('nick' => $user['Nick'], 'rol' => $user['Rol']) ;
    }

    if(isset($_POST['valor']) and !empty($_POST['valor'])){
        if($user['Rol'] == "Moderador") $res = searchEventoModerador($_POST['valor']) ; 
        else $res = searchEventoUsuario($_POST['valor']) ;
        echo $res;
    }
    else{
        echo("No se pasa algo por POST");
    }
?>
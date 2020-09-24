<?php
    include_once("database/bd_usuarios.php");
    include_once("database/bd_eventos.php");

    session_start();
    if (isset($_SESSION['nickUsuario'])){
      $user = getUser($_SESSION['nickUsuario']);
      $usuario = array('nick' => $user['Nick'], 'rol' => $user['Rol']) ;
    }

    if ($user['Rol'] != "Gestor" and $user['Rol'] != "SuperUsuario") header("Location: index.php");

    if (!empty($_POST)){
        //echo($_POST['publicado']);
        if($_POST['publicado'] == "1") hideEvento($_POST['idEv']);
        else if($_POST['publicado'] == "0") showEvento($_POST['idEv']);
    }
    header("Location: panelGestionEventos.php");
?>
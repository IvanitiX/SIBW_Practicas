<?php
include_once("database/bd_usuarios.php");
include_once("database/bd_eventos.php");
include_once("database/bd_comentarios.php");

//Antes de nada, ¿quién es?
session_start();
    if (isset($_SESSION['nickUsuario'])){
      $user = getUser($_SESSION['nickUsuario']);
      $usuario = array('nick' => $user['Nick'], 'rol' => $user['Rol']) ;
    }
//Si no eres gestor, moderador o SuperUsuario no pasas
if($usuario['Rol'] != "Gestor" and $usuario['Rol'] !="Moderador" and $usuario['Rol'] != "SuperUsuario") header("Location: index.php");

//Visto esto, discerniremos si has querido borrar un evento o un comentario. La eliminación ya es cosa del modelo.
if($_POST['registro'] == "Eventos"){
    deleteEvento($_POST['idEv']);
    header("Location: panelGestionEventos.php");
}
if($_POST['registro'] == "Comentarios"){
    deleteComentario($_POST['idEv'],$_POST['idCom']);
    header("Location: panelComentarios.php");
}
?>
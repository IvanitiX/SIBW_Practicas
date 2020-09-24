<?php
include_once("database/bd_comentarios.php");
include_once("database/bd_usuarios.php");

session_start();
if (isset($_SESSION['nickUsuario'])){
    $user = getUser($_SESSION['nickUsuario']);
    $usuario = array('nick' => $user['Nick'], 'rol' => $user['Rol']) ;
  }

if(isset($_POST['Texto'])){
    addComentario($_POST['IdEvento'],$_POST['IdComentario'],$user['Nick'],$user['Email'],date("Y-m-d"),date("h:i"),$_POST['Texto']);
    header("Location: evento.php?evento=" . $_POST['IdEvento']);
}
else echo "Fallo";

?>
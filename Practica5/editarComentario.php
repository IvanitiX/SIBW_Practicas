<?php
require_once "/usr/local/lib/php/vendor/autoload.php";
require_once "database/bd_comentarios.php" ;

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  
  require_once 'database/bd_usuarios.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
      $idEv = $_POST['idEv'];
      $idCom = $_POST['idCom'];
      $contenido = $_POST['comentario'] . "*Mensaje editado por un Moderador*";
      modifyComentario($idEv,$idCom,$contenido);
      header("Location: panelComentarios.php");
  }

  session_start();
    if (isset($_SESSION['nickUsuario'])){
      $user = getUser($_SESSION['nickUsuario']);
      $usuario = array('nick' => $user['Nick'], 'rol' => $user['Rol']) ;
    }
    else $usuario = "Empty";

    if(!($usuario['rol']==("Moderador") or $usuario['rol']==("SuperUsuario") and isset($_GET['evento']) and isset($_GET['comm']))) header("Location: index.php");

    $comentario = getComentarioConcreto($_GET['evento'],$_GET['comm']);
    $comentario['idEv'] = $_GET['evento'];
    $comentario['idCom'] = $_GET['comm'];

  echo $twig->render('editarComentario.html', ['user' => $usuario, 'comentario' => $comentario]);
?>
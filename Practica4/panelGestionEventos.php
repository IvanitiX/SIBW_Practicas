<?php
require_once "/usr/local/lib/php/vendor/autoload.php";
require_once "database/bd_eventos.php" ;

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  
  require_once 'database/bd_usuarios.php';

  session_start();
    if (isset($_SESSION['nickUsuario'])){
      $user = getUser($_SESSION['nickUsuario']);
      $usuario = array('nick' => $user['Nick'], 'rol' => $user['Rol']) ;
    }
    else $usuario = "Empty";

    if(!($usuario['rol']==("Gestor") or $usuario['rol']==("SuperUsuario"))) header("Location: index.php");

    $listaEventos = getListaEventosGestor($usuario['nick']);

  echo $twig->render('panelGestionEventos.html', ['user' => $usuario, 'eventos' => $listaEventos]);
?>
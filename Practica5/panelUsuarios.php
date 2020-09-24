<?php
require_once "/usr/local/lib/php/vendor/autoload.php";
require_once 'database/bd_usuarios.php';

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  session_start();

  $error = "Null";
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rol = $_POST['cambiorol'];
    if ($rol != "default"){
        $nick = $_POST['nick'] ;
        if(modifyRole($nick,$rol) != true){
          $error = "No tienes más de un Sudo. Deja uno al menos";
        }
    }
  }

    if (isset($_SESSION['nickUsuario'])){
      $user = getUser($_SESSION['nickUsuario']);
      $usuario = array('nick' => $user['Nick'], 'rol' => $user['Rol']) ;
    }
    else $usuario = "Empty";

    if($usuario['rol']!=("SuperUsuario")) header("Location: index.php");

    $listaUsuarios = getListUser() ;


  echo $twig->render('panelUsuario.html', ['user' => $usuario, 'usuarios' => $listaUsuarios, 'error' => $error]);
?>
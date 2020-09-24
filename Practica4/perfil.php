<?php
require_once "/usr/local/lib/php/vendor/autoload.php";

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  
  require_once 'database/bd_usuarios.php';

   session_start();

   if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_SESSION['nickUsuario'])){$user = getUser($_SESSION['nickUsuario']); $nickAntiguo = $_SESSION['nickUsuario'];}
    modifyUser($nickAntiguo,$_POST['nick'],$_POST['email']);
    if (!empty($_POST['oldPass'])){
      if ($_SESSION['nickUsuario'] == $_POST['nick'] || empty($_POST['nick'])) $accNick = $_SESSION['nickUsuario'];
      else $accNick = $_POST['nick'] ;
      modifyPass($accNick,$_POST['oldPass'],$user['Contraseña'],$_POST['newPass'],$_POST['repeatPass']);
    }
    $_SESSION['nickUsuario'] = $_POST['nick'];
   }

    if (isset($_SESSION['nickUsuario'])){
      $user = getUser($_SESSION['nickUsuario']);
      $usuario = array('nick' => $user['Nick'], 'rol' => $user['Rol'], 'email' => $user['Email'], 'hash' => $user['Contraseña']) ;
    }
    else $usuario = "Empty";

    if($usuario == "Empty") header("Location: index.php");

    

  echo $twig->render('perfil.html', ['user' => $usuario]);
?>
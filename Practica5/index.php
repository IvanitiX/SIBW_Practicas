<?php
    include_once('database/bd_eventos.php');
    require_once 'database/bd_usuarios.php';
    session_start();
    if (isset($_SESSION['nickUsuario'])){
      $user = getUser($_SESSION['nickUsuario']);
      $usuario = array('nick' => $user['Nick'], 'rol' => $user['Rol']) ;
    }
    else $usuario = "Empty";

    /*Carga de Twig*/ 
      require_once "/usr/local/lib/php/vendor/autoload.php";

      $loader = new \Twig\Loader\FilesystemLoader('templates');
      $twig = new \Twig\Environment($loader);

      /*Consulta a la base de datos*/
      $eventos = getListaEventos() ;
      

      /*Renderizado de Twig*/
      echo $twig->render('portada.html', ['eventos' => $eventos, 'rejillas' => floor(sizeof($eventos)/9), 'user' => $usuario]);
?>
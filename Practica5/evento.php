<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include("database/bd_eventos.php");
  include("database/bd_comentarios.php") ;
  include("database/bd_palabrasBaneadas.php") ;
  include_once ("database/bd_etiquetas.php");
  include_once("database/bd_usuarios.php");
  
  session_start();
  if (isset($_SESSION['nickUsuario'])){
    $user = getUser($_SESSION['nickUsuario']);
    $usuario = array('nick' => $user['Nick'], 'rol' => $user['Rol']) ;
  }
  else $usuario = "Empty";
  
  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  
  if (isset($_GET['evento'])) {
    $idEv = $_GET['evento'];
  } else {
    $idEv = -1;
  }
   
  $evento = getEvento($idEv);
  $comentarios = getComentarios($idEv) ;
  $etiquetas = getEtiquetas($idEv) ;
  $bans = getPalabrasBaneadas() ;

  if($evento['publicado'] == 0 && $user['Rol'] != "Gestor" && $user['Rol'] != "SuperUsuario") header("Location: index.php");
  
  if(!isset($_GET['imprimir']) || ($_GET['imprimir']) != '1')
    echo $twig->render('pag_evento.html', ['evento' => $evento, 'comentarios' => $comentarios, 'bans'=>$bans, 'user' => $usuario, 'etiquetas' => $etiquetas]);
  else
  echo $twig->render('pag_evento.html', ['evento' => $evento, 'imprimir' => 1, 'user' => $usuario, ]);
?>

<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include("database/bd_getEvento.php");
  include("database/bd_getComentarios.php") ;
  include("database/bd_getPalabrasBaneadas.php") ;
  
  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  
  if (isset($_GET['evento'])) {
    $idEv = $_GET['evento'];
  } else {
    $idEv = -1;
  }
   
  $evento = getEvento($idEv);
  $comentarios = getComentarios($idEv) ;
  $bans = getPalabrasBaneadas() ;
  
  if(!isset($_GET['imprimir']) || ($_GET['imprimir']) != '1')
    echo $twig->render('pag_evento.html', ['evento' => $evento, 'comentarios' => $comentarios, 'bans'=>$bans]);
  else
  echo $twig->render('pag_evento.html', ['evento' => $evento, 'imprimir' => 1]);
?>

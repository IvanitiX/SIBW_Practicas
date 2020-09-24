<?php
require_once "/usr/local/lib/php/vendor/autoload.php";
require_once "database/bd_eventos.php" ;
require_once "database/bd_imagenes.php" ;
require_once "database/bd_etiquetas.php" ;

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  
  require_once 'database/bd_usuarios.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
      $idEv = $_POST['idEv'];
      $nombre = $_POST['nombre'];
      $lugar = $_POST['lugar'];
      $fecha = $_POST['fecha'];
      $informacion = $_POST['info']; 
      $twitter = $_POST['twitter'];
      $facebook = $_POST['facebook'];
      if(($_FILES['imagen1']['error'])== 0) $img1 = addImagen($_FILES['imagen1']);
      $pie1 = $_POST['pie1'];
      if(($_FILES['imagen2']['error']) == 0) $img2 = addImagen($_FILES['imagen2']);
      $pie2 = $_POST['pie2'];
      if(($_FILES['logo']['error']) == 0) $logo = addImagen($_FILES['logo']);
      modifyEvento($idEv,$nombre,$lugar,$fecha,$informacion,$twitter,$facebook,$img1,$pie1,$img2,$pie2,$logo);
      deleteEtiquetas($idEv);
      addEtiquetas($idEv,explode(' ',$_POST['etiquetas']));
      header("Location: evento.php?evento=" . $idEv);
  }

  session_start();
    if (isset($_SESSION['nickUsuario'])){
      $user = getUser($_SESSION['nickUsuario']);
      $usuario = array('nick' => $user['Nick'], 'rol' => $user['Rol']) ;
    }
    else $usuario = "Empty";

    if(!($usuario['rol']==("Gestor") or $usuario['rol']==("SuperUsuario") and isset($_GET['evento']))) header("Location: index.php");

    $evento = getEvento($_GET['evento']);
    $etiquetas = getEtiquetas($evento['id']);

  echo $twig->render('editarEvento.html', ['user' => $usuario, 'evento' => $evento, 'etiquetas' => $etiquetas]);
?>
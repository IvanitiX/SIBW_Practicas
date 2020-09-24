<?php
require_once "/usr/local/lib/php/vendor/autoload.php";
require_once 'database/bd_usuarios.php';
require_once "database/bd_eventos.php";
require_once "database/bd_etiquetas.php";

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  session_start();

    if (isset($_SESSION['nickUsuario'])){
      $user = getUser($_SESSION['nickUsuario']);
      $usuario = array('nick' => $user['Nick'], 'rol' => $user['Rol']) ;
    }
    else $usuario = "Empty";

    if($usuario['rol']!=("SuperUsuario") and $usuario['rol']!=("Gestor")) header("Location: index.php");

    $archivos = array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors= array();
        if(isset($_FILES['logo'])){
            $archivologo = addImagen($_FILES['logo']);
        }

        if(isset($_FILES['imagen1'])){
            $archivos[0] = addImagen($_FILES['imagen1']);
        }

        if(isset($_FILES['imagen2'])){
            $archivos[1] = addImagen($_FILES['imagen2']);
        }
        
            $nombre=$_POST['nombre'];
            $fecha=$_POST['fecha'];
            $lugar=$_POST['lugar'];
            $informacion=$_POST['info'];
            $twitter=$_POST['twitter'];
            $facebook=$_POST['facebook'];

            if ($archivologo != false) {$logo = $archivologo;}

            if(isset($archivos[0]) and $archivos[0]!=false){
                $img1= $archivos[0];
                $pie1=$_POST['pie1'];
            }
            if(isset($archivos[1]) and $archivos[1] != false){
                $img2= $archivos[1];
                $pie2=$_POST['pie2'];
            }

            $gestor=$_SESSION['nickUsuario'];
            $id = addEvento($nombre,$fecha,$lugar,$informacion,$twitter,$facebook,$logo,$img1,$pie1,$img2,$pie2,$gestor);
            $tags = explode(' ',$_POST['etiquetas']) ;
            addEtiquetas($id,$tags);
            if ($_POST['publicar'] == true) showEvento($id);
            else hideEvento($id) ;

            if(empty($errors)){
                header("Location: index.php");
            }
    
      }



  echo $twig->render('ponTuEvento.html', ['user' => $usuario, 'errores'=> $errors]);
?>
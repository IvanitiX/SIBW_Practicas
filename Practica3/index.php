<?php
    include_once('database/bd_getListaEventos.php');

    /*Carga de Twig*/ 
      require_once "/usr/local/lib/php/vendor/autoload.php";

      $loader = new \Twig\Loader\FilesystemLoader('templates');
      $twig = new \Twig\Environment($loader);

      /*Consulta a la base de datos*/
      $eventos = getListaEventos() ;
      

      /*Renderizado de Twig*/
      echo $twig->render('portada.html', ['eventos' => $eventos, 'rejillas' => floor(sizeof($eventos)/9)]);
?>
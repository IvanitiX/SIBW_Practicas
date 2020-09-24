<?php

function addImagen($imagen){
    $file_name = $imagen['name'];
    $file_size = $imagen['size'];
    $file_tmp = $imagen['tmp_name'];
    $file_type = $imagen['type'];
    $file_ext = strtolower(end(explode('.',$imagen['name'])));
            
    $extensions= array("jpeg","jpg","png");
            
    if (in_array($file_ext,$extensions) === false){
        $errors[] = "Extensión no permitida, elige una imagen JPEG o PNG.";
    }
            
    if ($file_size > 2097152){
        $errors[] = 'Tamaño del fichero demasiado grande';
    }
    if (empty($errors)==true)  move_uploaded_file($file_tmp,"img/$file_name");
              
    if (!empty($errors)) return false;
    else return ("img/" . $file_name) ;
}
?>
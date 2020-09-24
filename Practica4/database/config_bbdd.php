<?php
    define('BD_USER',"Arcadia") ;
    define('BD_PASSWORD', "CallMeArcadia") ;
    define('BD_NAME', "GameAdvisor") ;
    define('BD_MANAGER', "mysql") ;
    $mysqli_bd = new mysqli(BD_MANAGER,BD_USER,BD_PASSWORD,BD_NAME);
    if ($mysqli_bd->connect_errno){
        die ("¡Uh, oh!, tenemos un error " . $mysqli_bd->connect_error);
    }
?>

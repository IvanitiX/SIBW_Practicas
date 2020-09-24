<?php
    function purgeId($Id_Evento){
        if(!is_numeric($Id_Evento)){
            die("Un evento no tiene letras. Una de dos: o se te ha colado, o me estás intentando hacer algo con la BD.");
        }
    }
?>
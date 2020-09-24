<?php
include_once('config_bbdd.php');

  // Devuelve true si existe un usuario con esa contraseña
  function checkLogin($nick, $pass) {
    global $mysqli_bd;
    $mysqli_bd->real_escape_string($nick);
    $resultado = $mysqli_bd->query("Select Nick,Contraseña From Usuarios Where Nick= '$nick'") ;
    if($resultado->num_rows > 0){
      $fila = $resultado -> fetch_assoc();
      if (password_verify($pass,$fila['Contraseña'])) return true;
      else return false;
    }
    else return false;
  }

  function registrar($nick,$email,$pass){
      global $mysqli_bd;
      $mysqli_bd->real_escape_string($nick);
      $mysqli_bd->real_escape_string($email);
      if (empty($nick) || empty($email) || empty($pass) || !filter_var($email,FILTER_VALIDATE_EMAIL)) return false;
      $hash = password_hash($pass,PASSWORD_DEFAULT);
      if ($mysqli_bd->query("INSERT INTO Usuarios VALUES ('$nick', '$email', '$hash','Usuario')")){return true;}
      else return false ;
  }
  
  // Devuelve la información de un usuario a partir de su nick 
  function getUser($nick) {
    global $mysqli_bd;
    $resultado = $mysqli_bd->query("Select Nick,Email,Contraseña,Rol From Usuarios Where Nick='$nick'") ;
    if($resultado->num_rows > 0) return $resultado->fetch_assoc() ;
    else return 0;
  }

  function getListUser() {
    global $mysqli_bd;
    $resultado = $mysqli_bd->query("Select Nick,Email,Rol From Usuarios Order By Rol") ;
    $userList = array() ;

        while($fila = $resultado->fetch_assoc()){
            $user = array('nick' => $fila['Nick'], 'email'=>$fila['Email'], 'rol' => $fila['Rol'] ) ;
            array_push($userList,$user) ;
        }
    return $userList;
    
  }

  function modifyUser($oldNick,$nick,$mail){
    global $mysqli_bd;
    $mysqli_bd->real_escape_string($oldNick);
    $mysqli_bd->real_escape_string($nick);
    $mysqli_bd->real_escape_string($mail);
    if (!empty($nick)) $mysqli_bd->query("UPDATE Usuarios SET Nick = '$nick' WHERE Nick = '$oldNick' ");
    if (!empty($mail) and filter_var($mail,FILTER_VALIDATE_EMAIL)) $mysqli_bd->query("UPDATE Usuarios SET Email = '$mail' WHERE Nick = '$oldNick' ");
  }

  function modifyPass($nick,$oldPass,$oldHash,$pass,$rep){
    global $mysqli_bd;
    $errors=array();
    if (password_verify($oldPass,$oldHash) and $pass === $rep){
      $newHash = password_hash($pass,PASSWORD_DEFAULT);
      $mysqli_bd->query("UPDATE Usuarios SET Contraseña = '$newHash' WHERE Nick = '$nick' ");
    }
    else{
      if (!password_verify($oldPass,$oldHash)) array_push($errors,"La contraseña antigua no es esa");
      if ($pass != $rep) array_push($errors,"Las contraseñas nuevas no coinciden");
    }
  }

  function modifyRole($user,$role){
    global $mysqli_bd;
    $resultado = $mysqli_bd->query("Select Count(Rol) Cuenta From Usuarios Where Rol = 'SuperUsuario'") ;
    $resultado2 = $mysqli_bd->query("Select Rol From Usuarios Where Nick = '$user'") ;
    $cuenta = $resultado->fetch_assoc()['Cuenta'];
    $rolUsuario = $resultado2->fetch_assoc()['Rol'];
    if ($cuenta == "1" and $rolUsuario === "SuperUsuario" and $role != "SuperUsuario")
      return false;
    else $mysqli_bd->query("UPDATE Usuarios SET Rol = '$role' WHERE Nick = '$user' ");
      return true ;
  }
?>
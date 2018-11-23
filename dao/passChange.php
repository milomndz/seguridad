<?php
    session_start();
    require('../connections/cn.php');
    $user = $_POST['usuario'];
    $pass = $_POST['password'];
    $passN= $_POST['passwordN'];
    require('/string.php');

    $usuario = lstring($user);

    $query = "SELECT * FROM USUARIO WHERE username = $1 and pass = $2";
    $sql = pg_prepare($db, "autenticacion", $query);

    $res = pg_execute($db, "autenticacion", array($usuario, $pass));
    if(!$res) {
        echo pg_last_error($db);
        exit;
    }
    $result = pg_fetch_row($res);
    //echo $result[0] . " " . $result[1] . " " . $result[2] . " " . $result[3] . " ". $result[4] . "<br>";
    //echo $usuario . " " . $password;

    $passhash=hash("sha1",$passN);
    if($result[0] == $user && $result[1] == $pass){
      $query = "UPDATE usuario SET pass=$1 WHERE username=$2;";
$sql = pg_prepare($db, "cambiarContra", $query);

//echo "$nombre $apellido $usuario $password $nivel";

$res = pg_execute($db, "cambiarContra", array($passhash,$user));

  if(!$res) {
      echo pg_last_error($db);
      exit;
  }

  echo "Cambio de contraseña exitoso. <a href='../login.php'>Clic aquí</a> para iniciar sesión" ;
        if($_SESSION['rol']== "registro"){
            header("Location: ../_registro/index.php");
        }
        elseif($_SESSION['rol']== "maestro"){
            header("Location: ../_maestro/index.php");
        }
        elseif($_SESSION['rol']== "investigador"){
            header("Location: ../_investigador/index.php");
        }
        elseif($_SESSION['rol']== "estatal"){
            header("Location: ../_estatal/index.php");
        }
        elseif($_SESSION['rol']== "intocable"){
            header("Location: ../_intocable/ReflectionZendExtension.php");
        }
    }
    else{
        if($_SESSION['rol']== "registro"){
            echo "Los datos ingresados son incorrectos, click aqui para regresar al index"."<a href='../_registro/index.php'>Clic para volver</a>";
        }
        elseif($_SESSION['rol']== "maestro"){
            echo "Los datos ingresados son incorrectos, click aqui para regresar al index"."<a href='../_maestro/index.php'>Clic para volver</a>";
        }
        elseif($_SESSION['rol']== "investigador"){
            echo "Los datos ingresados son incorrectos, click aqui para regresar al index"."<a href='../_investigador/index.php'>Clic para volver</a>";
        }
        elseif($_SESSION['rol']== "estatal"){
            echo "Los datos ingresados son incorrectos, click aqui para regresar al index"."<a href='../_estatal/index.php'>Clic para volver</a>";
        }
        elseif($_SESSION['rol']== "intocable"){
            echo "Los datos ingresados son incorrectos, click aqui para regresar al index"."<a href='../_intocable/index.php'>Clic para volver</a>";
        }
    }

?>

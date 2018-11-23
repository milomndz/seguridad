<?php
    session_start();
    require_once('../connections/cn.php');
    $isbn = $_POST['recipient-name'];
    $tokenI = $_POST['token-name'];

    if($tokenI == $_SESSION['token']){
        $sql = "INSERT INTO prestamo(username, isbn, estado) VALUES ('$_SESSION[usuario]','$isbn','Prestado');";
        $result = pg_query($cn, $sql) or die(pg_error());
        if($_SESSION['rol']== "registro"){
            header("Location: ../_registro/all.php");
        }
        elseif($_SESSION['rol']== "maestro"){
            header("Location: ../_maestro/all.php");
        }
        elseif($_SESSION['rol']== "investigador"){
            header("Location: ../_investigador/all.php");
        }
        elseif($_SESSION['rol']== "estatal"){
            header("Location: ../_estatal/all.php");
        }
        elseif($_SESSION['rol']== "intocable"){
            header("Location: ../_intocable/all.php");
        }
    }
    else{
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
            header("Location: ../_intocable/index.php");
        }
    }
?>
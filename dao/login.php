<html>
<head>
</head>
<body>
  <?php
    session_start();
    require_once('string.php');
    require_once('../connections/cn.php');
    $usuarioa = $_POST['usuario'];
    $passworda = $_POST['password'];

    $usuario = lstring($usuarioa);
    $password = $passworda;

    $query = "SELECT * FROM USUARIO WHERE username = $1 and pass = $2";
    $sql = pg_prepare($db, "autenticacion", $query);

    $res = pg_execute($db, "autenticacion", array($usuario, $password));
    if(!$res) {
        echo pg_last_error($db);
        exit;
    }
    $result = pg_fetch_row($res);
    //echo $result[0] . " " . $result[1] . " " . $result[2] . " " . $result[3] . " ". $result[4] . "<br>";
    //echo $usuario . " " . $password;
    if($result[0] == $usuario && $result[1] == $password){
       $_SESSION['usuario'] = $usuario;
      if($result[4] == 1){
        echo "Nivel 1";
      }
      if($result[4] == 2){
        $token = bin2hex(openssl_random_pseudo_bytes(8));
        $_SESSION['token'] = $token;

          $_SESSION['rol'] = "registro";
          header("Location: ../_registro/index.php");
      }
      elseif($result[4] == 3){

          $_SESSION['rol'] = "maestro";
        $token = bin2hex(openssl_random_pseudo_bytes(8));
        $_SESSION['token'] = $token;
        header("Location: ../_maestro/index.php");

      }
      elseif($result[4] == 4){

          $_SESSION['rol'] = "investigador";
        header("Location: ../_investigador/index.php");
      }
      elseif($result[4] == 5){

          $_SESSION['rol'] = "estatal";
        header("Location: ../_estatal/index.php");
      }
      elseif($result[4] == 6){

          $_SESSION['rol'] = "intocable";
        header("Location: ../_intocable/index.php");
      }
    }
    else{
      echo "no se encontro el usuario, o la contraseña es incorrecta. " . "<a href='../login.php'>Clic para volver</a>";
      //header("Location: ../login.php");
    }
  ?>
</body>
</html>

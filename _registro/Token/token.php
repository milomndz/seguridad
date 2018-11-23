<html>
<head>
</head>
<body>
  <?php
    session_start();
    require_once('../../dao/string.php');
    require_once('../../connections/cn.php');
    $usuarioa = $_POST['usuario'];
    $passworda = $_POST['password'];

    $usuario = lstring($usuarioa);
    $password = sha1($passworda);

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
      $token = bin2hex(openssl_random_pseudo_bytes(8));
      $_SESSION['token'] = $token;
      header("Location: ../Token/recibirToken.php");
    }
    else{
      echo "no se encontro el usuario, o la contraseña es incorrecta. " . "<a href='../Token/pedirtoken.php'>Clic para volver</a>";
      //header("Location: ../login.php");
    }
  ?>
</body>
</html>

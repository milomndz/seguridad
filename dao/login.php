<html>
<head>
</head>
<body>
  <?php 
    session_start();
    require_once('string.php');
    require_once('../connections/cn.php');
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $usuario = lstring($usuario);
    $password = $password;
    $sql = "SELECT username, pass, id_nivel FROM public.usuario;";
    $res = pg_query($db, $sql);
    if(!$res) {
        echo pg_last_error($db);
        exit;
    }

    do{
        if($usuario === $row['username'] && $password === $row['pass']){
          $_SESSION['usuario_cliente'] = $usuario;

          if(2 == $row['id_nivel']){
            header("Location: ../_registro/index.php");
          }
          elseif(3 == $row['id_nivel']){
            header("Location: ../_maestro/index.php");
          }
          elseif(4 == $row['id_nivel']){
            header("Location: ../_investigador/index.php");
          }
          elseif(5 == $row['id_nivel']){
            header("Location: ../_estatal/index.php");
          }
          elseif(6 == $row['id_nivel']){
            header("Location: ../_intocable/index.php");
          }
          
        }
        else{
          header("Location: ../login.php");
        }
      } while($row = pg_fetch_assoc($res));
    
 ?>
</body>
</html>

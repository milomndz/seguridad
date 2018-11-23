
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Inicio de Sesion</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="dao/login.php" method="POST" name="form1">
      <img class="mb-4" src="img/logo.png" alt="" width="150" height="150">
      <h1 class="h2 mb-3 font-weight-normal">Biblioteca de Citadel</h1>
      <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1>
      <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Email address" required autofocus>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me">Recuerdame
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <a class="btn btn-lg btn-info btn-block" href="index.php" role="button">Regresar</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>

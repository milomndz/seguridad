<?php
	session_start();
	if($_SESSION['usuario'] == ""){
		header("Location: ../login.php");
  }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Peticion de Token</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/login.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="../Token/token.php" method="POST" name="form1">
      <img class="mb-4" src="../../img/token.png" alt="" width="150" height="150">
      <h1 class="h2 mb-3 font-weight-normal">Biblioteca de Citadel</h1>
      <h1 class="h3 mb-3 font-weight-normal">Llena estos datos para recibir tu Token</h1>
      <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Email address" required autofocus>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Pedir Token</button>
      <a class="btn btn-lg btn-info btn-block" href="../index.php" role="button">Regresar</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>

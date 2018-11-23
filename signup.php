
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Sign Up Citadel</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="dao/signup.php" method="POST" name="form1">
      <img class="mb-4" src="img/logo.png" alt="" width="150" height="150">
      <h1 class="h2 mb-3 font-weight-normal">Biblioteca de Citadel</h1>
      <h1 class="h3 mb-3 font-weight-normal">Registrate</h1>
      <input type="text" id="usuario" name="nombre" class="form-control" placeholder="Nombre" required autofocus>
      <input type="text" id="usuario" name="apellido" class="form-control" placeholder="Apellido" required autofocus>
      <input type="text" id="usuario" name="usuario" class="form-control" placeholder="usuario" required autofocus>
      <p class="h5 mb-3 font-weight-normal">Nivel deseado</p>
      <div class="radio mb-3">
        <input type="radio" name="nivel" value="1" checked> 1 <span style="margin-right: 10px;"></span> 
        <input type="radio" name="nivel" value="2"> 2 <span style="margin-right: 10px;"></span> 
        <input type="radio" name="nivel" value="3"> 3 <span style="margin-right: 10px;"></span> 
        <input type="radio" name="nivel" value="4"> 4 <span style="margin-right: 10px;"></span> 
        <input type="radio" name="nivel" value="5"> 5 <span style="margin-right: 10px;"></span> 
        <input type="radio" name="nivel" value="6"> 6 <span style="margin-right: 10px;"></span> 
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <a class="btn btn-lg btn-info btn-block" href="index.php" role="button">Regresar</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>

<?php
	session_start();
	if($_SESSION['usuario'] != ""){
    if ($_SESSION['rol'] != "investigador") {
      header("Location: ../login.php");
    }
  }
  else{
    header("Location: ../login.php");
  }
  require_once('../dao/nivel.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-muted" href="../dao/logout.php">Salir</a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Biblioteca de Citadel</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
            </a>
						<a class="btn btn-sm btn-outline-secondary" href="../_investigador/Token/pedirtoken.php">Pedir Token</a>
            <a class="btn btn-sm btn-outline-secondary" href="../_investigador/ChangePass/cambiarPassForm.php">Cambiar Pass</a>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="#">Novela</a>
          <a class="p-2 text-muted" href="#">Historia</a>
          <a class="p-2 text-muted" href="#">Psicología</a>
          <a class="p-2 text-muted" href="#">Filosofía</a>
          <a class="p-2 text-muted" href="#">Arte</a>
          <a class="p-2 text-muted" href="#">Ficción</a>
          <a class="p-2 text-muted" href="#">Técnica</a>
          <a class="p-2 text-muted" href="#">Educación</a>
          <a class="p-2 text-muted" href="#">Ciencia</a>
          <a class="p-2 text-muted" href="#">Salud</a>
          <a class="p-2 text-muted" href="#">Poesía</a>
        </nav>
      </div>

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">La primera biblioteca pública de Citadel</h1>
          <p class="lead my-3">Pretende responder a la amplia gama de necesidades que pueden demandar sus usuarios. Además de obras literarias clásicas, sus fondos pueden estar integrados por textos que proporcionan información sobre servicios sociales, obras de referencia, discos, películas y libros recreativos.</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Leer más...</a></p>
        </div>
      </div>
      <h3 class="pb-3 mb-4 font-italic border-bottom">
            Adquisiciones más recientes
          </h3>
      <div class="row mb-2">
        <?php require_once('../dao/librosIT.php');
         do{?>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <?php echo colorNivel($row['descripcion']); ?>
              <h3 class="mb-0">
                <a class="text-dark" href="#"><?php echo $row['titulo'];  ?></a>
              </h3>
              <div class="mb-1 text-muted"><?php echo $row['anio_ed'];  ?></div>
              <p class="card-text mb-auto">ISBN: <?php echo $row['isbn']. "<br>";
                echo "Estanteria: ".$row['estanteria'];  ?>
              </p>
               <button type="button" class="btn btn-info btn-large" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row['isbn'];  ?>" data-titulo="<?php echo $row['titulo'];  ?>">Consultar</button>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block"  src="../img/portada2.jpg" width="200px" weight="200px" alt="Card image cap">
          </div>

        </div>
        <?php }while($row = pg_fetch_assoc($res));?>
      </div>
      <a class="btn btn-lg btn-info btn-block" href="index.php" role="button">Regresar</a>
      <br>
    </div>

    <footer class="blog-footer">
      <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="../dao/prestar.php" method="POST">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">ISBN:</label>
                <input type="text" disabled class="form-control" id="recipient-name" name="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Titulo:</label>
                <input type="text" id="titulo-name" name="titulo-name" disabled class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Token:</label>
                <input type="text" id="token-name" name="token-name" class="form-control">
              </div>

          </div>
          <div class="modal-footer">
            <button  class="btn btn-danger" id="btnPrestar"  type="submit">Prestar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
    <script>
      $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var tituloL = button.data('titulo')
        var modal = $(this)
        modal.find('.modal-title').text('Prestar libro: ' + tituloL)
        modal.find('#recipient-name').val(recipient)
        modal.find('#titulo-name').val(tituloL)
      })
    </script>
  </body>
</html>

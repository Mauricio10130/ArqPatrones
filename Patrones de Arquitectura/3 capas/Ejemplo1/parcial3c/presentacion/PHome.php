

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Almacen</title>
    <?php
        require_once "dependencias.php";
    ?>
</head>
<body>
    
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img class="img-rounded" src="resources/img/logo.png" alt="" width="340" height="80">
          <!-- <h1 class="navbar-brand" href="#">Colegio Cristo Rey</h1> -->
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="PBienvenido.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Gestionar Usuarios<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="PClientes.php"> Clientes</a></li>
                <li><a href="PProveedor.php"> Proovedores</a></li>
              </ul>
            </li>
            <li><a href="PPedidos.php"><span class="glyphicon glyphicon-oil"></span> Pedidos</a></li>
            <li><a href="PAdjuntoProductos.php"><span class="glyphicon glyphicon-oil"></span> Adjunto</a></li>
            <li><a href="PProductos.php"><span class="glyphicon glyphicon-time"></span> Productos</a></li>
            <li><a href="PAlmacen.php"><span class="glyphicon glyphicon-tags"></span> Almacen</a></li>
            <li><a href="PCategoria.php"><span class="glyphicon glyphicon-th-list"></span> Categoria</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>  
</body>
</html>
<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').height(200);
    }
    else {
      $('.logo').height(100);
    }
  });
</script>
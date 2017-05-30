<?php
	include_once("../controllers/ProductsController.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pizza</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- my css file -->
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>
    <!-- header -->
    <header>
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="./admin.php">Lobos Pizza</a>
			    </div>
			    <ul class="nav navbar-nav">
						<li><a href="./RegistroP.php">Registrar productos</a></li>
			      <li><a href="./ModificarP.php">Modificar productos</a></li>
						<li><a href="./EliminarP.php">Eliminar producto</a></li>
			    </ul>
			  </div>
			</nav>
    </header>
    <div class="video-container">
      <video class="video" src="../public/video.mp4" autoplay loop="">
      </video>
    </div>
		<!-- FORMULARIO PARA MOSTRAR LOS PRODUCTOS REGISTRADOS -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<center><h1 class ="white-text">PRODUCTOS REGISTRADOS</h1></center>
					<div class="front panel panel-default">
			      <table class="table table-bordered table-hover">
			    		<thead>
			      		<tr>
									<th>ID</th>
			        		<th>Producto</th>
									<th>Descripción</th>
									<th>Precio</th>
								</tr>
			    		</thead>
			    		<tbody>
					  			<?php
					    			foreach ($productos as $producto) {
					        ?>
									<tr>
					          <td><?php echo $producto['id'];?></td>
										<td><?php echo $producto['nombre'];?></td>
										<td><?php echo $producto['descripcion'];?></td>
										<td><?php echo $producto['precio'];?></td>
										<!--<td><a href="modificarP.php?id=<?php
										//echo $producto['id']; ?>">Modificar</a></td>

										<td><a href="#">Eliminar</a></td>-->
					        <?php
					          }
					        ?>
								</tr>
			    		</tbody>
			  		</table>
					</div>
				</div>
			</div>
		</div>
  </body>
</html>

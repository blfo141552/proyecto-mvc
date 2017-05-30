<?php
	include_once("./../controllers/ProductsController.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Eliminar Producto</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- my css file -->
    <link rel="stylesheet" href="./../assets/css/style.css">
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
						<li><a href="RegistroP.php">Registrar productos</a></li>
			      <li><a href="verP.php">Ver productos</a></li>
			      <li><a href="ModificarP.php">Modificar productos</a></li>
			    </ul>
			  </div>
			</nav>
    </header>
    <div class="video-container">
      <video class="video" src="./../public/video.mp4" autoplay loop="">
      </video>
    </div>
		<!-- FORMULARIO PARA INGRESAR PRODUCTOS -->
    <div class="video-container vertical-center">
      <div class="front absolute card col-xs-12">
				<center><h1 class ="white-text">Seleccione producto a eliminar</h1></center><br>
				<select class="form-control" id="idProd" name="<?php echo $producto['id'];?>">
					<?php
						foreach ($productos as $producto) {
					?>
							<option value="<?php echo $producto['id']; ?>"><?php echo $producto['nombre']; ?></option>
					<?php
						}
					?>
				</select>
        <br><br><br><br><br><br><br><button type="button" class="form-control" id="borrar">Borrar producto</button>
      </div>
    </div>
		<!-- container -->
    <script src="./../assets/js/script.js" charset="utf-8"></script>
    <script type="text/javascript">
      let borrar = document.querySelector("#borrar");
      borrar.addEventListener('click',function(){
				let idProd = document.querySelector("#idProd");
				$.ajax({
				  method: "POST",
				  url: "./../controllers/ProductsController.php",
					data: { funcion: "EliminarProducto" , idProd:idProd.value}
				})
				.done(function() {
				   console.log( "Datos eliminados ");
				   alert("Datos eliminados");
					 alert('Datos eliminados');
				 });
      });

    </script>
  </body>
</html>

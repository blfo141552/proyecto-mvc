
<?php
  include_once("./../controllers/ProductsController.php");
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
    <link rel="stylesheet" href="./../assets/css/style.css">
  </head>
  <body>
    <!-- header -->
    <header>
     <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
              <li><a class="navbar-brand" href="./../index.php">Lobos Pizza</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>
    <div class="video-container vertical-center">
      <video class="video" src="./../public/video.mp4" autoplay loop="">
      </video>
    </div>
      <div class="col-xs-3" align="center"></div>
      <div class="col-xs-6" align="center">
      <h2 class ="white-text">Carrito</h2>
        <input type="text" class="form-control" id="nombre" value="" placeholder="Escribe el nombre del Cliente"><br>
        <input type="text" class="form-control" id="telefono" value="" placeholder="Escribe el telefono del Cliente"><br>
        <input type="text" class="form-control" id="direccion" value="" placeholder="Escribe la direccion del Cliente"><br>
        <center><h2 class ="white-text">Elige el producto</h2></center>
      <select class="form-control" name="" id="pro">
        <?php
          foreach ($productos as $producto) {
        ?>
            <option value="<?php echo $producto['id']; ?>"><?php echo $producto['nombre']; ?></option>
        <?php
          }
        ?>
      </select>
       <br>
       <input type="number" class="form-control" id="cantidad" value="" placeholder="cantidad"><br>
       <br>
        <button type="button" class="form-control" id="guardar"  value="Add Row" onclick="addRow('dataTable');">Agregar producto
        </button>
      <br>
 <SCRIPT language="javascript">
          function addRow(tableID) {
              miCampoTexto = document.getElementById("cantidad").value;
             if (miCampoTexto.length == 0) {
                return;
               }
               var table = document.getElementById(tableID);
               var rowCount = table.rows.length;
               var row = table.insertRow(rowCount);
               var cell1 = row.insertCell(0);
               var element1 = document.createElement("input");
               element1.type = "checkbox";
               cell1.appendChild(element1);
               var cell2 = row.insertCell(1);
               var element2 = document.createElement("input");
               element2.disabled="disabled";
               element2.value=document.getElementById("pro").value;
               cell2.appendChild(element2);
               var cell3 = row.insertCell(2);
               var element3 = document.createElement("input");
               element3.disabled="disabled";
               element3.value=document.getElementById("cantidad").value;
               cell3.appendChild(element3);
               agregarCarrito(document.getElementById("pro").value);
               cantidad.value = "";
          }

          function deleteRow(tableID) {
               try {
               var table = document.getElementById(tableID);
               var rowCount = table.rows.length;
               for(var i=0; i<rowCount; i++) {
                    var row = table.rows[i];
                    var chkbox = row.cells[0].childNodes[0];
                    if(null != chkbox && true == chkbox.checked) {
                         table.deleteRow(i);
                         rowCount--;
                         i--;
                    }
               }
               }catch(e) {
                    alert(e);
               }
          }
     </SCRIPT>
     <TABLE class="table table-r" id="dataTable" width="350px" border="1" >
     </TABLE>
     <INPUT  aligne="center" type="button" value="Eliminar produto" onclick="deleteRow('dataTable');"  title="Para eliminar, primero selecciona los productos"/>
     <INPUT  aligne="center" id="pedidoF" type="button" value="Hacer pedido" onclick="realizarPedido()"/>
     </div>
    <!-- container -->
    <script src="./../assets/js/script.js" charset="utf-8"></script>
    <script src="./../assets/js/carrito.js" charset="utf-8"></script>
    <script type="text/javascript">
   var listaproductos = new Array();
      function realizarPedido() {
        miCampoTexto = document.getElementById("nombre").value;
             miCampoTexto1 = document.getElementById("direccion").value;
             miCampoTexto2 = document.getElementById("telefono").value;
             if (miCampoTexto.length == 0 || miCampoTexto1.length == 0 || miCampoTexto2.length == 0) {
              alert("Necesitas unos campos de contacto");
                return;
               }
        let nombre = document.querySelector("#nombre");
        let telefono = document.querySelector("#telefono");
        let direccion = document.querySelector("#direccion");
        let arregloJSON = JSON.stringify(listaproductos);
        console.log(arregloJSON);
        $.ajax({
          method: "POST",
          url: "./../controllers/CarritoController.php",
          data: { productos: arregloJSON,
                  nombre: nombre.value,
                  direccion: direccion.value,
                  telefono: telefono.value,
                  funcion: "agregarCarrito"
                }
        })
        .done(function() {
           console.log( "Datos guardados ");
         });
      }
      function agregarCarrito(idProducto) {
        let cantidad = document.querySelector("#cantidad");
        // listaproductos.push()
        let carrito = new Carrito(idProducto,cantidad.value);
        listaproductos.push(carrito);
        console.log(listaproductos)
        $(".input").val("");//jquery
      }
    </script>
</center>
      <div class="col-xs-3" align="center"></div>
  </body>
</html>

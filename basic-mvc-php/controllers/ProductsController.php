<?php

		if( isset($_POST['funcion']) ){
			switch ($_POST['funcion']){
				case 'modificarProductos':
					require_once("../models/Product.php");
					require_once("../models/Cleaner.php");


					$productos = json_decode($_POST['productos']);
					$idProd = $_POST['idProd'];
					foreach ($productos as $item) {
						$idProd = Cleaner::cleanInput($idProd);
						$nombre=Cleaner::cleanInput($item->_nombre);
						$categoria = (int)Cleaner::cleanInput($item->_categoria);
						$precio= (int)Cleaner::cleanInput($item->_precio);
						$descripcion = Cleaner::cleanInput($item->_descripcion);
						$producto = new Product($nombre,
																		$precio,
																		$categoria,
																		$item->_descripcion);
						$producto->update($idProd);
					}
					break;
				case 'insertarProductos':
					require_once("../models/Product.php");
					require_once("../models/Cleaner.php");

					//echo 'Hola AJAX '.$_POST['funcion'];
					$productos = json_decode($_POST['productos']);

					foreach ($productos as $item) {
						$nombre = Cleaner::cleanInput($item->_nombre);
						$categoria = (int)Cleaner::cleanInput($item->_categoria);
						$producto = new Product($nombre,
																		$item->_precio,
																		$categoria,
																		$item->_descripcion);
						$producto->save();
					}
					break;
					case'EliminarProducto':
						require_once("../models/Product.php");
						$idProd = $_POST['idProd'];
							$productos=Product::delete($idProd);
					break;
			}
		}
			else {
				include_once("../models/Product.php");
				$productos = Product::get();
			}

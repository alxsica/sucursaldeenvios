<?php 

	include_once("includes/stock.php");
	include_once("includes/sucursal.php");

	$sucursal = new Sucursal();

	$stock = new Stock();

	if (isset($_POST["nombre"], $_POST["cantidad_paquetes"], $_POST["sucursal"], $_POST["variaciones"])) {

		if (!empty($_POST["nombre"]) && !empty($_POST["cantidad_paquetes"]) && !empty($_POST["sucursal"]) && !empty($_POST["variaciones"])) {
			$stock->setNombre($_POST["nombre"]);
			$stock->setCantidad_paquetes($_POST["cantidad_paquetes"]);
			$stock->setSucursal($_POST["sucursal"]);
			$stock->setVariaciones($_POST["variaciones"]);
			$stock->agregar_stock();	
		}		
	}

	if (isset($_GET["eliminar"])) {
		$stock->setId_stock($_GET["eliminar"]);
		$stock->eliminar();
	}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Stock</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Envios Cartagena</h1>
	<p>Este es un sitio dedicado al envio de paquetes, con sucursales en diferentes ciudades del país.</p>
	<?php include_once("includes/menu.php"); ?>

	<h1><a href="?agregar" class="agregar">Agregar Stock</a></h1>
	<hr>

	<?php 
		if (isset($_GET["editar"])){
			include_once("includes/forms/editar-stock.php");
		}

		if(isset($_GET["agregar"])){			
			include_once("includes/forms/stock.php");
		}
	?>

	<table>
		<tr>
			<th>NOMBRE</th>
			<th>CANTIDAD DE PAQUETES</th>
			<th>SUCURSAL</th>
			<th>VARIACIONES</th>
			<th></th>
			<th></th>
		</tr>

		<?php foreach ($stock->mostrar_stock() as $st) { ?> 
		<tr>			
			<td><?php echo $st["nombre"]; ?></td>
			<td><?php echo $st["cantidad_paquetes"]; ?></td>
			<td><?php echo $st["sucursal"]; ?></td>
			<td><?php echo $st["variaciones"]; ?></td>
			<td><a href="?editar=<?php echo $st['id_stock']; ?>" class="funciones">Editar</a></td>
			<td><a href="?eliminar=<?php echo $st['id_stock']; ?>" class="funciones">Eliminar</a></td>
		</tr>
		<?php } ?>
		
	</table>

</body>
</html>
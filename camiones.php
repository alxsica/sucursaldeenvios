   <?php 

	include_once("includes/camion.php");
	include_once("includes/empleado.php");
	include_once("includes/sucursal.php");

	$empleado = new Empleado();
	$sucursal = new Sucursal();
	$camion = new Camion();

	if (isset($_POST["origen"], $_POST["destino"], $_POST["empleado"], $_POST["cantidad_paquetes"], $_POST["placa"])) {

		if (!empty($_POST["origen"]) && !empty($_POST["destino"]) && !empty($_POST["empleado"]) && !empty($_POST["cantidad_paquetes"]) && !empty($_POST["placa"])) {
			$camion->setOrigen($_POST["origen"]);
			$camion->setDestino($_POST["destino"]);
			$camion->setEmpleado($_POST["empleado"]);
			$camion->setCantidad_paquetes($_POST["cantidad_paquetes"]);
			$camion->setPlaca($_POST["placa"]);
			$camion->agregar_camion();

			$empleado->setNombre($_POST["empleado"]);
			$empleado->ocupar();	
		}		
	}

	if (isset($_GET["eliminar"])) {
		$camion = $camion->setId_camion($_GET["eliminar"]);
		$camion->eliminar();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Camiones</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Envios Cartagena</h1>
	<p>Este es un sitio dedicado al envio de paquetes, con sucursales en diferentes ciudades del país.</p>
	<?php include_once("includes/menu.php"); ?>

	<h1><a href="?agregar" class="agregar">Agregar Camion</a></h1> 
 <hr>

	<?php 
		if (isset($_GET["editar"])){
			include_once("includes/forms/editar-camion.php");
		}

		if(isset($_GET["agregar"])){			
			include_once("includes/forms/camion.php");
		}
	?>

	
	<table>
		<tr>
			<th>ORIGEN</th>
			<th>DESTINO</th>
			<th>CONDUCTOR A CARGO</th>
			<th># DE PAQUETES</th>
			<th>PLACA</th>
			<th></th>
			<th></th>
		</tr>

		<?php foreach ($camion->mostrar_placa() as $carro) { ?> 
		<tr>			
			<td><?php echo $carro["origen"]; ?></td>
			<td><?php echo $carro["destino"]; ?></td>
			<td><?php echo $carro["empleado"]; ?></td>
			<td><?php echo $carro["cantidad_paquetes"]; ?></td>
			<td><?php echo $carro["placa"]; ?></td>
			<td><a href="?editar=<?php echo $carro['id_camion']; ?>&empleado=<?php echo $carro['empleado']; ?>" class="funciones">Editar</a></td>
			<td><a href="?eliminar=<?php echo $carro['id_camion']; ?>" class="funciones">Eliminar</a></td>
		</tr>
		<?php } ?>
		
	</table>

</body>
</html>



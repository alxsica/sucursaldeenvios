<?php 

	include_once("includes/paquete.php");
	include_once("includes/sucursal.php");
	include_once("includes/camion.php");
	include_once("includes/empleado.php");
	include_once("includes/proveedor.php");
	include_once("includes/stock.php");

	$paquete = new Paquete();
	$sucursal = new Sucursal();
	$camion = new Camion();
	$empleado = new Empleado();
	$proveedor = new Proveedor();
	$stock = new Stock();

	if (isset($_POST["origen"], $_POST["destino"], $_POST["valor"], $_POST["prioridad"], $_POST["stock"], $_POST["ubicacion_stock"], $_POST["placa_camion"], $_POST["id_mensajero"], $_POST["estado"], $_POST["proveedor"])) {

		if (!empty($_POST["origen"]) && !empty($_POST["destino"]) && !empty($_POST["valor"]) && !empty($_POST["prioridad"]) && !empty($_POST["ubicacion_stock"]) && !empty($_POST["placa_camion"]) && !empty($_POST["id_mensajero"]) && !empty($_POST["estado"])) {
			$paquete->setOrigen($_POST["origen"]);
			$paquete->setDestino($_POST["destino"]);
			$paquete->setValor($_POST["valor"]);
			$paquete->setPrioridad($_POST["prioridad"]);
			$paquete->setStock($_POST["stock"]);
			$paquete->setUbicacion_stock($_POST["ubicacion_stock"]);
			$paquete->setPlaca_camion($_POST["placa_camion"]);
			$paquete->setId_mensajero($_POST["id_mensajero"]);
			$paquete->setEstado($_POST["estado"]);
			$paquete->setProveedor($_POST["proveedor"]);
			$paquete->agregar_paquete();	
		}		
	}

	if (isset($_GET["eliminar"])) {
		$paquete->setId_paquete($_GET["eliminar"]);
		$paquete->eliminar();
	}	

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Paquetes</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Envios Cartagena</h1>
	<p>Este es un sitio dedicado al envio de paquetes, con sucursales en diferentes ciudades del país.</p>
	<?php include_once("includes/menu.php"); ?>

	<h1><a href="?agregar" class="agregar">Agregar Paquetes</a></h1>
	<hr>

	<?php 
		if (isset($_GET["editar"])){
			include_once("includes/forms/editar-paquetes.php");
		}

		if(isset($_GET["agregar"])){			
			include_once("includes/forms/paquetes.php");
		}
	?>

	<table>
		<tbody>
		<tr>
			<th>ORIGEN</th>
			<th>DESTINO</th>
			<th>VALOR ENVIO</th>
			<th>PRIORIDAD</th>
			<th>UBICACIÓN</th>
			<th>PLACA</th>
			<th>MENSAJERO</th>
			<th>ESTADO</th>
			<th>PROVEEDOR</th>
			<th></th>
			<th></th>
		</tr>

		<?php foreach ($paquete->mostrar_paquetes() as $paq) { ?> 
		<tr>			
			<td><?php echo $paq["origen"]; ?></td>
			<td><?php echo $paq["destino"]; ?></td>
			<td><?php echo $paq["valor"]; ?></td>
			<td><?php echo $paq["prioridad"]; ?></td>
			<td><?php echo $paq["stock"]; ?> [<?php echo $paq["ubicacion_stock"]; ?>]</td>
			<td><?php echo $paq["placa_camion"]; ?></td>
			<td><?php echo $paq["id_mensajero"]; ?></td>
			<td><?php echo $paq["estado"]; ?></td>
			<td><?php echo $paq["proveedor"]; ?></td>
			<td><a href="?editar=<?php echo $paq['id_paquete']; ?>" class="funciones">Editar</a></td>
			<td><a href="?eliminar=<?php echo $paq['id_paquete']; ?>" class="funciones">Eliminar</a></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>

</body>
</html>
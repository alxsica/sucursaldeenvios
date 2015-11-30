<?php 

	include_once("includes/proveedor.php");

	$proveedor = new Proveedor();

	if (isset($_POST["nombre"], $_POST["valor_envio"])) {

		if (!empty($_POST["nombre"]) && !empty($_POST["valor_envio"])) {
			$proveedor->setNombre($_POST["nombre"]);
			$proveedor->setValor_envio($_POST["valor_envio"]);
			$proveedor->agregar_proveedor();	
		}		
	}

	if (isset($_GET["eliminar"])) {
		$proveedor->setId_proveedor($_GET["eliminar"]);
		$proveedor->eliminar();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Proveedores</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Envios Cartagena</h1>
	<p>Este es un sitio dedicado al envio de paquetes, con sucursales en diferentes ciudades del país.</p>
	<?php include_once("includes/menu.php"); ?>

	<h1><a href="?agregar" class="agregar">Agregar Proveedor</a></h1>
	<hr>

	<?php 
		if (isset($_GET["editar"])){
			include_once("includes/forms/editar-proveedor.php");
		}

		if(isset($_GET["agregar"])){			
			include_once("includes/forms/proveedor.php");
		}
	?>
	

	<table>
		<tr>
			<th>ID PROVEEDOR</th>
			<th>NOMBRE</th>
			<th>VALOR DE ENVIO</th>
			<th></th>
			<th></th>
		</tr>

		<?php foreach ($proveedor->mostrar_proveedores() as $proveedor) { ?> 
		<tr>			
			<td><?php echo $proveedor["id_proveedor"]; ?></td>
			<td><?php echo $proveedor["nombre"]; ?></td>
			<td>$<?php echo $proveedor["valor_envio"]; ?></td>
			<td><a href="?editar=<?php echo $proveedor['id_proveedor']; ?>" class="funciones">Editar</a></td>
			<td><a href="?eliminar=<?php echo $proveedor['id_proveedor']; ?>" class="funciones">Eliminar</a></td>
		</tr>
		<?php } ?>
		
	</table>

</body>
</html>
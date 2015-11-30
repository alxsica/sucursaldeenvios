<?php 

	include_once("includes/paquete.php");

	$paquete = new Paquete();

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

	<h1><a href="distribucion.php" class="agregar">Calendario de Envios</a></h1>
	<nav>
		<menu><b><a href="?city=cartagena">Cartagena</a></b></menu>
		<menu><b><a href="?city=barranquilla">Barranquilla</a></b></menu>
		<menu><b><a href="?city=santamarta">Santamarta</a></b></menu>
		<menu><b><a href="?city=medellin">Medellin</a></b></menu>
		<menu><b><a href="?city=cali">Cali</a></b></menu>
	</nav>
	
	<hr>

	<?php
		if(isset($_GET["city"])){
			$ciudad = $_GET["city"];

			if ($ciudad == "barranquilla") {
				include("distribucion/barranquilla.php");
			}else if ($ciudad == "cali") {
				include("distribucion/cali.php");
			}else if ($ciudad == "medellin") {
				include("distribucion/medellin.php");
			}else if ($ciudad == "santamarta") {
				include("distribucion/santamarta.php");
			}else if ($ciudad == "cartagena"){
				include("distribucion/cartagena.php");
			}else{
				include("distribucion/calendario.php");
			}

		}else{
			include("distribucion/calendario.php");
		}
	?>

	

</body>
</html>
<?php

	$n_camion = new Camion();	
	$n_empleado = new Empleado();

	$n_camion->setId_camion($_GET["editar"]);
	$cam = $n_camion->editar();

	$n_empleado->setNombre($_GET["empleado"]);
	$n_empleado->desocupar();
	

	if (isset($_POST["n_origen"], $_POST["n_destino"], $_POST["n_empleado"], $_POST["n_cantidad_paquetes"], $_POST["n_placa"])) {
		#$empleado->setNombre($_POST["n_empleado"]);
		#$empleado->desocupar();

		if (!empty($_POST["n_origen"]) && !empty($_POST["n_destino"]) && !empty($_POST["n_empleado"]) && !empty($_POST["n_cantidad_paquetes"]) && !empty($_POST["n_placa"])) {
			$n_camion->setOrigen($_POST["n_origen"]);
			$n_camion->setDestino($_POST["n_destino"]);
			$n_camion->setEmpleado($_POST["n_empleado"]);
			$n_camion->setCantidad_paquetes($_POST["n_cantidad_paquetes"]);
			$n_camion->setPlaca($_POST["n_placa"]);
			$n_camion->actualizar();

			$empleado->setNombre($_POST["n_empleado"]);
			$empleado->ocupar();	
		}		
	}else if(!isset($_POST["n_origen"], $_POST["n_destino"], $_POST["n_empleado"], $_POST["n_cantidad_paquetes"], $_POST["n_placa"])){
		$n_empleado->ocupar();
	}
?>


<form action="" method="post">

	<label>Origen</label><br>
	<select name="n_origen">
		<option value="Cartagena">Cartagena &nbsp;</option>
		<!--
		<?php foreach ($sucursal->mostrar_sucursal() as $origen) { ?>
		<option value="<?php echo $origen['ciudad']; ?>"><?php echo $origen['ciudad']; ?></option>
		<?php } ?>
		-->
	</select><br><br>

	<label>Destino</label><br>
	<select name="n_destino">
		<?php foreach ($sucursal->mostrar_sucursal() as $destino) { ?>
		<option value="<?php echo $destino['ciudad']; ?>"><?php echo $destino['ciudad']; ?></option>
		<?php } ?>
	</select><br><br>
	
	<label>Conductor a Cargo</label><br>
	<select name="n_empleado">
			<?php #$empleado->desocupar($cam[0]["empleado"]); ?>
			<option value="<?php echo $cam[0]['empleado']; ?>"><?php echo $cam[0]['empleado']; ?></option>
		<?php foreach ($empleado->mostrar_conductores() as $empleado) { ?>
		<option value="<?php echo $empleado['nombre']; ?>"><?php echo $empleado['nombre']; ?></option>
		<?php } ?>		
	</select><br><br>

	<label>Cantidad de Paquetes</label><br>
	<input type="text" name="n_cantidad_paquetes" value="<?php echo $cam[0]['cantidad_paquetes']; ?>"><br><br>

	<label>Placa del Camion</label><br>
	<input type="text" name="n_placa" value="<?php echo $cam[0]['placa']; ?>"><br><br>


	<input type="submit"value="Actualizar"><br><br>
</form>
<hr>
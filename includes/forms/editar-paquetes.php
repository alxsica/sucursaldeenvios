<?php

	$n_paquete = new Paquete();

	$n_paquete->setId_paquete($_GET["editar"]);
	$paq = $n_paquete->editar();

	if (isset($_POST["n_origen"], $_POST["n_destino"], $_POST["n_valor"], $_POST["n_prioridad"], $_POST["n_stock"], $_POST["n_ubicacion_stock"], $_POST["n_placa_camion"], $_POST["n_id_mensajero"], $_POST["n_estado"], $_POST["n_proveedor"])) {

		if (!empty($_POST["n_origen"]) && !empty($_POST["n_destino"]) && !empty($_POST["n_valor"]) && !empty($_POST["n_prioridad"]) && !empty($_POST["n_ubicacion_stock"]) && !empty($_POST["n_placa_camion"]) && !empty($_POST["n_id_mensajero"]) && !empty($_POST["n_estado"]) && !empty($_POST["n_proveedor"])) {
			$n_paquete->setOrigen($_POST["n_origen"]);
			$n_paquete->setDestino($_POST["n_destino"]);
			$n_paquete->setValor($_POST["n_valor"]);
			$n_paquete->setPrioridad($_POST["n_prioridad"]);
			$n_paquete->setStock($_POST["n_stock"]);
			$n_paquete->setUbicacion_stock($_POST["n_ubicacion_stock"]);
			$n_paquete->setPlaca_camion($_POST["n_placa_camion"]);
			$n_paquete->setId_mensajero($_POST["n_id_mensajero"]);
			$n_paquete->setEstado($_POST["n_estado"]);
			$n_paquete->setProveedor($_POST["n_proveedor"]);
			$n_paquete->actualizar();	
		}		
	}
?>


<form action="" method="post">
	<label>Origen</label><br>
	<select name="n_origen">
		<option value="Cartagena">Cartagena &nbsp;</option>
		<!--
		<option value="<?php echo $paq[0]['origen']; ?>"><?php echo $paq[0]['origen']; ?></option>
		<?php foreach ($sucursal->mostrar_sucursal() as $origen) { ?>
		<option value="<?php echo $origen['ciudad']; ?>"><?php echo $origen['ciudad']; ?></option>
		<?php } ?>
		-->
	</select><br><br>

	<label>Destino</label><br>
	<select name="n_destino">
		<option value="<?php echo $paq[0]['destino']; ?>"><?php echo $paq[0]['destino']; ?></option>
		<?php foreach ($sucursal->mostrar_sucursal() as $destino) { ?>
		<option value="<?php echo $destino['ciudad']; ?>"><?php echo $destino['ciudad']; ?></option>
		<?php } ?>
	</select><br><br>

	<label>Valor Envio</label><br>
	<input type="text" name="n_valor" value="<?php echo $paq[0]['valor']; ?>"><br><br>

	<label>Prioridad del Envio</label><br>
	<select name="n_prioridad">
		<option value="<?php echo $paq[0]['prioridad']; ?>"><?php echo $paq[0]['prioridad']; ?></option>
		<option value="Baja">Baja</option>
		<option value="Media">Media</option>
		<option value="Alta">Alta</option>
	</select><br><br>

	<label>Stock</label><br>
	<select name="n_stock">
		<?php foreach ($stock->mostrar_stock() as $stock) { ?>
		<option value="<?php echo $stock['nombre']; ?>"><?php echo $stock['nombre']; ?></option>
		<?php } ?>
	</select><br><br>

	<label>Ubicación en el Stock</label><br>
	<input type="text" name="n_ubicacion_stock" value="<?php echo $paq[0]['ubicacion_stock']; ?>"><br><br>

	<label>Placa del Camion</label><br>
	<select name="n_placa_camion">
		<option value="<?php echo $paq[0]['placa_camion']; ?>"><?php echo $paq[0]['placa_camion']; ?></option>
		<?php foreach ($camion->mostrar_placa() as $placa) { ?>
		<option value="<?php echo $placa['placa']; ?>"><?php echo $placa['placa']; ?></option>
		<?php } ?>
	</select><br><br>

	<label>Mensajero</label><br>
	<select name="n_id_mensajero">
		<option value="<?php echo $paq[0]['id_mensajero']; ?>"><?php echo $paq[0]['id_mensajero']; ?></option>
		<?php foreach ($empleado->mostrar_mensajeros() as $mensajero) { ?>
		<option value="<?php echo $mensajero['nombre']; ?>"><?php echo $mensajero['nombre']; ?></option>
		<?php } ?>
	</select><br><br>

	<label>Estado del Paquete</label><br>
	<select name="n_estado">
		<option value="Espera">Espera</option>
		<option value="Enviado">Enviado</option>
	</select><br><br>

	<label>Proveedor</label><br>
	<select name="n_proveedor">
		<option value="<?php echo $paq[0]['proveedor']; ?>"><?php echo $paq[0]['proveedor']; ?></option>
		<?php foreach ($proveedor->mostrar_proveedores() as $proveedor) { ?>
		<option value="<?php echo $proveedor['nombre']; ?>"><?php echo $proveedor['nombre']; ?></option>
		<?php } ?>
	</select><br><br>


	<input type="submit"value="Actualizar"><br>
</form>
<hr>
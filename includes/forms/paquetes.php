<form action="" method="post">
	<label>Origen</label><br>
	<select name="origen">
		<option value="Cartagena">Cartagena &nbsp;</option>
		<!--
		<?php foreach ($sucursal->mostrar_sucursal() as $origen) { ?>
		<option value="<?php echo $origen['ciudad']; ?>"><?php echo $origen['ciudad']; ?></option>
		<?php } ?>
		-->
	</select><br><br>

	<label>Destino</label><br>
	<select name="destino">
		<?php foreach ($sucursal->mostrar_sucursal() as $destino) { ?>
		<option value="<?php echo $destino['ciudad']; ?>"><?php echo $destino['ciudad']; ?></option>
		<?php } ?>
	</select><br><br>

	<label>Valor Envio</label><br>
	<input type="text" name="valor" placeholder="Valor Envio"><br><br>

	<label>Prioridad del Envio</label><br>
	<select name="prioridad">
		<option value="Baja">Baja</option>
		<option value="Media">Media</option>
		<option value="Alta">Alta</option>
	</select><br><br>

	<label>Stock</label><br>
	<select name="stock">
		<?php foreach ($stock->mostrar_stock() as $stock) { ?>
		<option value="<?php echo $stock['nombre']; ?>"><?php echo $stock['nombre']; ?></option>
		<?php } ?>
	</select><br><br>

	<label>Ubicación en el Stock</label><br>
	<input type="text" name="ubicacion_stock" placeholder=""><br><br>

	<label>Placa del Camion</label><br>
	<select name="placa_camion">
		<?php foreach ($camion->mostrar_placa() as $placa) { ?>
		<option value="<?php echo $placa['placa']; ?>"><?php echo $placa['placa']; ?></option>
		<?php } ?>
	</select><br><br>

	<label>Mensajero</label><br>
	<select name="id_mensajero">
		<?php foreach ($empleado->mostrar_mensajeros() as $mensajero) { ?>
		<option value="<?php echo $mensajero['nombre']; ?>"><?php echo $mensajero['nombre']; ?></option>
		<?php } ?>
	</select><br><br>

	<label>Estado del Paquete</label><br>
	<select name="estado">
		<option value="Espera">Espera</option>
		<option value="Enviado">Enviado</option>
	</select><br><br>

	<label>Proveedor</label><br>
	<select name="proveedor">
		<?php foreach ($proveedor->mostrar_proveedores() as $proveedor) { ?>
		<option value="<?php echo $proveedor['nombre']; ?>"><?php echo $proveedor['nombre']; ?></option>
		<?php } ?>
	</select><br><br>


	<input type="submit"value="Registrar"><br>
</form>
<hr>
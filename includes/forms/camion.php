<form action="" method="post">

	<label>Origen</label><br>
	<select name="origen" disabled>
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
	
	<label>Conductor a Cargo</label><br>
	<select name="empleado">
		<?php foreach ($empleado->mostrar_conductores() as $empleado) { ?>
		<option value="<?php echo $empleado['nombre']; ?>"><?php echo $empleado['nombre']; ?></option>
		<?php } ?>
	</select><br><br>

	<label>Cantidad de Paquetes</label><br>
	<input type="text" name="cantidad_paquetes" placeholder=""><br><br>

	<label>Placa del Camion</label><br>
	<input type="text" name="placa" placeholder=""><br><br>


	<input type="submit"value="Agregar"><br>
</form>
<hr>
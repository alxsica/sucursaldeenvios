<form action="" method="post">

	<label>Nombre</label><br>
	<input type="text" name="nombre" placeholder=""><br><br>

	<label>Cantidad de Paquetes</label><br>
	<input type="text" name="cantidad_paquetes" placeholder=""><br><br>

	<label>Sucursal</label><br>
	<select name="sucursal">
		<?php foreach ($sucursal->mostrar_sucursal() as $sucursal) { ?>
		<option value="<?php echo $sucursal['ciudad']; ?>"><?php echo $sucursal['ciudad']; ?></option>
		<?php } ?>
	</select><br><br>

	<label>Variaciones</label><br>
	<textarea name="variaciones"></textarea><br><br>

	<input type="submit"value="Registrar"><br>
</form>
<hr>
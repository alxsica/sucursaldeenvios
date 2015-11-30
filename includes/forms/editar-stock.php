<?php

	$n_stock = new Stock();

	$n_stock->setId_stock($_GET["editar"]);
	$st = $n_stock->editar();

	if (isset($_POST["n_nombre"], $_POST["n_cantidad_paquetes"], $_POST["n_sucursal"], $_POST["n_variaciones"])) {

		if (!empty($_POST["n_nombre"]) && !empty($_POST["n_cantidad_paquetes"]) && !empty($_POST["n_sucursal"]) && !empty($_POST["n_variaciones"])) {
			$n_stock->setNombre($_POST["n_nombre"]);
			$n_stock->setCantidad_paquetes($_POST["n_cantidad_paquetes"]);
			$n_stock->setSucursal($_POST["n_sucursal"]);
			$n_stock->setVariaciones($_POST["n_variaciones"]);
			$n_stock->actualizar();	
		}		
	}
?>


<form action="" method="post">

	<label>Nombre</label><br>
	<input type="text" name="n_nombre" value="<?php echo $st[0]['nombre']; ?>" placeholder=""><br><br>

	<label>Cantidad de Paquetes</label><br>
	<input type="text" name="n_cantidad_paquetes" value="<?php echo $st[0]['cantidad_paquetes']; ?>" placeholder=""><br><br>

	<label>Sucursal</label><br>
	<select name="n_sucursal">
		<option value="<?php echo $st[0]['sucursal']; ?>"><?php echo $st[0]['sucursal']; ?></option>
		<?php foreach ($sucursal->mostrar_sucursal() as $sucursal) { ?>
		<option value="<?php echo $sucursal['ciudad']; ?>"><?php echo $sucursal['ciudad']; ?></option>
		<?php } ?>
	</select><br><br>

	<label>Variaciones</label><br>
	<textarea name="n_variaciones"><?php echo $st[0]['variaciones']; ?></textarea><br><br>

	<input type="submit" value="Actualizar"><br>
</form>
<hr>
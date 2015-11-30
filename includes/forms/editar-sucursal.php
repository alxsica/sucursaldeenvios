<?php

	$n_sucursal = new Sucursal();

	$n_sucursal->setId_sucursal($_GET["editar"]);
	$suc = $n_sucursal->editar();

	if (isset($_POST["n_ciudad"], $_POST["n_direccion"])) {

		if (!empty($_POST["n_ciudad"]) && !empty($_POST["n_direccion"])) {
			$n_sucursal->setCiudad($_POST["n_ciudad"]);
			$n_sucursal->setDireccion($_POST["n_direccion"]);
			$n_sucursal->actualizar();	
		}		
	}
?>

<hr>
<form action="" method="post">
		
	<label>Ciudad</label><br>
	<input type="text" name="n_ciudad" value="<?php echo $suc[0]['ciudad']; ?>"><br><br>

	<label>Dirección</label><br>
	<input type="text" name="n_direccion" value="<?php echo $suc[0]['direccion']; ?>"><br><br>


	<input type="submit"value="Actualizar"><br>
</form>

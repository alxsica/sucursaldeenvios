<?php

	$n_proveedor = new Proveedor();

	$n_proveedor->setId_proveedor($_GET["editar"]);
	$prov = $n_proveedor->editar();

	if (isset($_POST["n_nombre"], $_POST["n_valor_envio"])) {

		if (!empty($_POST["n_nombre"]) && !empty($_POST["n_valor_envio"])) {
			$n_proveedor->setNombre($_POST["n_nombre"]);
			$n_proveedor->setValor_envio($_POST["n_valor_envio"]);
			$n_proveedor->actualizar();	
		}		
	}
?>


<form action="" method="post">
		
	<label>Nombre</label><br>
	<input type="text" name="n_nombre" value="<?php echo $prov[0]['nombre']; ?>" autofocus><br><br>

	<label>Valor Envio</label><br>
	<input type="text" name="n_valor_envio" value="<?php echo $prov[0]['valor_envio']; ?>"><br><br>


	<input type="submit"value="Actualizar"><br>
</form>

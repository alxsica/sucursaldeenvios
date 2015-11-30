<?php

	$n_empleado = new Empleado();

	$n_empleado->setId_empleado($_GET["editar"]);
	$emp = $n_empleado->editar();

	if (isset($_POST["n_nombre"], $_POST["n_cargo"])) {

		if (!empty($_POST["n_nombre"]) && !empty($_POST["n_cargo"])) {
			$n_empleado->setNombre($_POST["n_nombre"]);
			$n_empleado->setCargo($_POST["n_cargo"]);
			$n_empleado->actualizar();	
		}		
	}
?>


<form action="" method="post">
	<label>Nombre</label><br>
	<input type="text" name="n_nombre" value="<?php echo $emp[0]['nombre']; ?>"><br><br>

	<label>Cargo</label><br>
	<select name="n_cargo">
		<option value="Almacenista">Almacenista</option>
		<option value="Conductor">Conductor</option>
		<option value="Gerente">Gerente</option>
		<option value="Jefe de Bodega">Jefe de Bodega</option>
		<option value="Mensajero">Mensajero</option>
	</select><br><br>

	<input type="submit"value="Actualizar"><br>
</form>
<hr>

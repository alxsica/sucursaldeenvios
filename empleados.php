<?php
include_once("includes/empleado.php");

$empleado = new Empleado();

if (isset($_POST["nombre"], $_POST["cargo"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["cargo"])) {
        $empleado->setNombre($_POST["nombre"]);
        $empleado->setCargo($_POST["cargo"]);
        $empleado->agregar_empleado();
    }
}

if (isset($_GET["eliminar"])) {
    $empleado->setId_empleado($_GET["eliminar"]);
    $empleado->eliminar();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Empleados</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Envios Cartagena</h1>
        <p>Este es un sitio dedicado al envio de paquetes, con sucursales en diferentes ciudades del país.</p>
        <?php include_once("includes/menu.php"); ?>

        <h1><a href="?agregar" class="agregar">Agregar Empleado</a></h1>
        <hr>

        <?php
        if (isset($_GET["editar"])) {
            include_once("includes/forms/editar-empleado.php");
        }

        if (isset($_GET["agregar"])) {
            include_once("includes/forms/empleado.php");
        }
        ?>

        <table>
            <tr>
                <!-- 
                <th>ID EMPLEADO</th>
                -->			
                <th>NOMBRE</th>
                <th>CARGO</th>
                <th>ESTADO</th>
                <th></th>
                <th></th>
            </tr>

            <?php foreach ($empleado->mostrar_empleados() as $empleado) { ?> 
                <tr>			
                    <!--
                    <td><?php echo $empleado["id_empleado"]; ?></td>
                    -->
                    <td><?php echo $empleado["nombre"]; ?></td>
                    <td><?php echo $empleado["cargo"]; ?></td>
                    <td><?php echo $empleado["estado"]; ?></td>
                    <td><a href="?editar=<?php echo $empleado['id_empleado']; ?>" class="funciones">Editar</a></td>
                    <td><a href="?eliminar=<?php echo $empleado['id_empleado']; ?>" class="funciones">Eliminar</a></td>
                </tr>
            <?php } ?>

        </table>

    </body>
</html>
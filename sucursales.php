<?php
include_once("includes/sucursal.php");

$sucursal = new Sucursal();

if (isset($_POST["ciudad"], $_POST["direccion"])) {
    if (!empty($_POST["ciudad"]) && !empty($_POST["direccion"])) {
        $sucursal->setCiudad($_POST["ciudad"]);
        $sucursal->setDireccion($_POST["direccion"]);
        $sucursal->agregar_sucursal();
    }
}

if (isset($_GET["eliminar"])) {
    $sucursal->setId_sucursal($_GET["eliminar"]);
    $sucursal->eliminar();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sucursales</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Envios Cartagena</h1>
        <p>Este es un sitio dedicado al envio de paquetes, con sucursales en diferentes ciudades del país.</p>
        <?php include_once("includes/menu.php"); ?>

        <!-- inhabilitar -->
        <h1><a href="?agregar" class="agregar">Agregar Sucursal</a></h1>
        <hr>
        <!-- inhabilitar -->

        <?php
        if (isset($_GET["editar"])) {
            include_once("includes/forms/editar-sucursal.php");
        }

        /*inhabilitar*/ if(isset($_GET["agregar"])){			
          include_once("includes/forms/sucursal.php");
          } 
        ?>	
        <hr>



        <table>
            <tr>
                <!--
                <th>ID SUCURSAL</th>
                -->
                <th>CIUDAD</th>
                <th>DIRECCIÓN</th>
                <th></th>
                <th></th>
            </tr>

            <?php foreach ($sucursal->mostrar_sucursal() as $sucursal) { ?> 
                <tr>
                    <!--			
                    <td><?php echo $sucursal["id_sucursal"]; ?></td>
                    -->
                    <td><?php echo $sucursal["ciudad"]; ?></td>
                    <td><?php echo $sucursal["direccion"]; ?></td>
                    <td><a href="?editar=<?php echo $sucursal['id_sucursal']; ?>" class="funciones">Editar</a></td>
                    <td><a href="?eliminar=<?php echo $sucursal['id_sucursal']; ?>" class="funciones">Eliminar</a></td>
                </tr>
            <?php } ?>

        </table>

    </body>
</html>
<table>
	<tr>
		<th>Origen</th>
		<th>Valor Envio</th>
		<th>Prioridad</th>
		<th>Proveedor</th>
	</tr>
<?php foreach ($paquete->paquetes_por_ciudad("Medellin") as $paq) { ?> 
	<tr>			
		<td><?php echo $paq["origen"]; ?></td>
		<td>$<?php echo $paq["valor"]; ?></td>
		<td><?php echo $paq["prioridad"]; ?></td>
		<td><?php echo $paq["proveedor"]; ?></td>
	</tr>
<?php } ?>
</table>
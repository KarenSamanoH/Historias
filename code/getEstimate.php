<?php
include("conexion.php");
$clientId=$_POST['clientId'];
$query = "SELECT * FROM cotizacion WHERE IDCliente=$clientId";
 $result= mysqli_query($conexion, $query);
 
 
         
?>
<div class="estimate-actions">
	<div style="float: right;"><button type="button" onclick="newEstimate(<?=$clientId ?>);" class="btn btn-info " data-row-id="">Nueva Cotizacion</button></div>
</div>
<?php if ($result->num_rows>0) { ?>

<table id="estimates-table">
	<thead>
	<tr>
		<th>FECHA</th>
		<th>NOMBRE</th>
		<th>TIPO EVENTO</th>
		<th>PROMOCION</th>
		<th>FECHA EVENTO</th>
		<th></th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php 
	while($row = mysqli_fetch_array($result)){ ?>
	<tr>
		<td><?=$row['FechaEvento'] ?></td>
		<td><?=$row['Nombre'] ?></td>
		<td><?=$row['IDCliente'] ?></td>
		<td><?=$row['CostoFinal'] ?></td>
		<td><?=$row['FechaEvento'] ?></td>
		<td><button type="button" class="btn btn-warning btn-xs " onclick="modifiEstimate(<?=$row['IDCotizacion'] ?>)">Modificar</button></td>
		<td><button type="button" class="btn btn-info btn-xs" >Realizar Pedido</button></td>

	</tr>
	<form  method="post" id="send-<?=$row['IDCotizacion'] ?>" action="Pedido.php" >
	


 	</form>
	<?php } ?>
	
	</tbody>
</table>
<?php } else{?>
<p style="text-align: center;">Este cliente no tiene cotizaciones </p>
	<?php } ?>
<br>
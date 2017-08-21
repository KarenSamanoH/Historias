<?php
include("conexion.php");
$clientId=$_POST['clientId'];
$query = "SELECT * FROM cotizacion WHERE IDCliente=$clientId ORDER BY IDCotizacion DESC";
 $result= mysqli_query($conexion, $query);
 
 
         
?>
<div class="estimate-actions">
	<div style="float: right;"><button type="button" onclick="newEstimate(<?=$clientId ?>);" class="btn btn-info " data-row-id="">Nueva Cotizacion</button></div>
	<div style="float: right; margin-right: 20px;"><input id="searcher"  data-table="order-table" style="padding: 5px;" type="text" onkeyup="searchEst();"  placeholder="Buscar cotizacion..."></div>
</div>
<?php if ($result->num_rows>0) { ?>
<div style="width:100%; max-height: 400px; overflow-y: auto;">
<table id="estimates-table" class="estimates-table">
	<thead>
	<tr>
		<th>ID</th>
		<th>FECHA</th>
		<th>CLIENTE</th>
		<th>FECHA EVENTO</th>
		<th>TOTAL</th>
		<th></th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php 
	while($row = mysqli_fetch_array($result)){ ?>
	<tr>
		<td><?=$row['IDCotizacion'] ?></td>
		<td><?=$row['FechaEvento'] ?></td>
		<td><?=$row['IDCliente'] ?></td>
		<td><?=$row['FechaEvento'] ?></td>
		<td><?=$row['CostoFinal'] ?></td>
		<td><button type="button" class="btn btn-warning btn-xs " onclick="modifiEstimate(<?=$row['IDCotizacion'] ?>)">Modificar</button></td>
		<td><button type="button" class="btn btn-info btn-xs" >Realizar Pedido</button></td>

	</tr>
	<form  method="post" id="send-<?=$row['IDCotizacion'] ?>" action="Pedido.php" >
	


 	</form>
	<?php } ?>
	
	</tbody>
</table>
</div>
<?php } else{?>
<p style="text-align: center;">Este cliente no tiene cotizaciones </p>
	<?php } ?>

	
<br>
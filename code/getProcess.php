<?php 
include("../code/conexion.php");
$prodid=$_POST['prodid'];
$get_query="SELECT e.*, c.Nombre, c.Ancho, c.Alto FROM elementos_linea e INNER JOIN catalogoelemento c ON e.IDCatElem=c.IDCatElem WHERE IDLinea=$prodid";
$result=mysqli_query($conexion,$get_query);

while ($row=mysqli_fetch_assoc($result)) { 
	$elem=$row['id_elemento_linea'];
$process_query="SELECT p.*,c.* FROM procesoslinea p INNER JOIN catalogoproceso c ON p.IDCatPro=c.IDCatPro WHERE id_elemento_linea=$elem";
$result2=mysqli_query($conexion,$process_query);
$ids[]=$elem
	?>

<div class="col-md-3" id="elem-<?=$elem ?>">
	<ul>
		<li><?=$row['Nombre'] ?></li>
		<input type="hidden" class="Ancho" value="<?=$row['Ancho'] ?>">
				  <input type="hidden" class="Alto" value="<?=$row['Alto'] ?>">
				   <input type="hidden" class="costo-elemento"  name="costo-elemento[<?=$row['IDCatElem'] ?>]">
			<ul>
			<?php while ($row2=mysqli_fetch_assoc($result2)) { ?>
				<li><?=$row2['Nombre'] ?></li>
				<input type="hidden" class="CostoUnitario" id="CostoUnitario-<?=$elem
 ?>-<?=$row2['IDCatPro'];
 ?>" value="<?=$row2['CostoUnitario'] ?>">
				  <input type="hidden" class="CostoCiento" id="CostoCiento-<?=$elem
 ?>-<?=$row2['IDCatPro'];
 ?>" value="<?=$row2['CostoCiento'] ?>">
				  <input type="hidden" class="CostoMillar" id="CostoMillar-<?=$elem
 ?>-<?=$row2['IDCatPro'];
 ?>" value="<?=$row2['CostoMillar'] ?>">
				  <input type="hidden" class="CostoUnico" id="CostoUnico-<?=$elem
 ?>-<?=$row2['IDCatPro'];
 ?>" value="<?=$row2['CostoUnico'] ?>">
				 
				<?php } ?>
			</ul>
		
	</ul>

</div>

<?php	
}
$elems=json_encode($ids);

?>
<input type="hidden" id=idelements   value='<?=$elems ?>'>
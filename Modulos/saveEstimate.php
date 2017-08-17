<?php 
include("../code/conexion.php");
$clientid=$_POST['clientid'];
$descrip=$_POST['est-descrip'];
$model=$_POST['est-model'];
$family=$_POST['est-family'];
$cu=$_POST['est-cu'];
$ciento=$_POST['est-100'];
$millar=$_POST['est-1000'];
$lead=$_POST['est-lead'];
$iva=$_POST['est-iva'];
$paper=$_POST['est-paper'];
$final=$_POST['est-final'];
$current_date=$_POST['current_date'];
$event_date=$_POST['event_date'];
$idprod=$_POST['idprod'];


$query = "INSERT INTO cotizacion(FechaCotizacion, FechaEvento, Nombre, Descripcion, IDCliente, IDAgente, CostoMod,CostoFinal) VALUES ('$current_date','$event_date',null,'$descrip',$clientid,1,null,$final)";
$result = mysqli_query($conexion, $query);





if ($result) {
	$last_id = $conexion->insert_id;
	echo "last ".$last_id."<br>";
	$addprodquery="INSERT INTO producto(IDProducto, IDCotizacion, IDDescuento, Modelo, Categoria, Cantidad, CostoEl, Descuento, CostoFinal, IDCatElem) VALUES (NULL, $last_id, NULL, $model, NULL, NULL, 0.00, NULL, 0.00, 1)";
	$result2 = mysqli_query($conexion, $addprodquery);

	if ($result2){
	$lastprod_id = $conexion->insert_id;
	echo "last prod ".$lastprod_id."<br>";

	$getelemquery="SELECT id_elemento_linea,IDCatElem FROM elementos_linea WHERE IDLinea=$idprod";
	$getelems=mysqli_query($conexion, $getelemquery);

while ( $row=mysqli_fetch_assoc($getelems)) {
	$idcatelem=$row['IDCatElem'];
	$addelemquery="INSERT INTO elemento (IDElemento, IDProducto, IDCatElem, IDCatMod, IDCatMat, Cantidad, Ancho, Alto, Profundidad, CostoMod, PrecioCompra, CostoFinal) VALUES (NULL, $lastprod_id, $idcatelem, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, NULL, 0.00)";

	

	$elemInserted = mysqli_query($conexion, $addelemquery);
	if ($elemInserted) {
		$lastelem_id = $conexion->insert_id;
		echo "last elem ".$lastelem_id."<br>";
		$id_elem=$row['id_elemento_linea'];
	$getprocsquery="SELECT IDProcesosLinea FROM procesoslinea WHERE id_elemento_linea=$id_elem";
	$getprocs=mysqli_query($conexion, $getprocsquery);
	while ($row2=mysqli_fetch_assoc($getprocs)) {
		$idpro=$row2['IDProcesosLinea'];
		$addprocquery="INSERT INTO proceso (IDProceso, IDElemento, IDCatPro, Descripcion, Cantidad, CostoUnico, CostoUnitario, CostoCiento, CostoMillar, CostoFinal) VALUES (NULL, $lastelem_id, $idpro, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00)";	
		$procInserted = mysqli_query($conexion, $addprocquery);
		if ($procInserted) {
			echo 'todo bien procesos';
		}else{
			echo("Error description: " . mysqli_error($conexion));
	echo $addprocquery;
		}
		
	}
	echo "todo bien elemento";
	echo "<br>";
	}else{
	echo("Error description: " . mysqli_error($conexion));
	echo $addelemquery;
}
	


} echo "todo bien producto";
echo "<br>";
}else{
	echo("Error description: " . mysqli_error($conexion));
	echo $addprodquery;
}

	echo "todo bien cotizacion";
	echo "<br>";
}else{
	echo("Error description: " . mysqli_error($conexion));
	echo $query;
}



?>

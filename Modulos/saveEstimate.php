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

$query = "INSERT INTO cotizacion(FechaCotizacion, FechaEvento, Nombre, Descripcion, IDCliente, IDAgente, CostoMod,CostoFinal) VALUES ('$current_date','$event_date',null,'$descrip',$clientid,1,null,$final)";
$result = mysqli_query($conexion, $query);

if ($result) {
	echo "todo bien";
}else{
	echo("Error description: " . mysqli_error($conexion));
	echo $query;
}



?>

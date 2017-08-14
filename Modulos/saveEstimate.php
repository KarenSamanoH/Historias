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


$query = "INSERT INTO cotizacion(FechaEvento,Nombre,Descripcion,IDCliente,IDAgente,CostoMod,CostoFinal) VALUES (null,null,'$descrip',$clientid,1,null,$final)";
$result = mysqli_query($conexion, $query);

if ($result) {
	echo "todo bien";
}else{
	echo("Error description: " . mysqli_error($conexion));
	echo $query;
}



?>
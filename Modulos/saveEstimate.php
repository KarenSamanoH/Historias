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
$paper=$_POST['papel'];
$final=$_POST['est-final'];
$current_date=$_POST['current_date'];
$event_date=$_POST['event_date'];
$idprod=$_POST['idprod'];
$qty=$_POST['qty'];
$descu=$_POST['descu'];

	

	$getelemquery="SELECT id_elemento_linea,IDCatElem FROM elementos_linea WHERE IDLinea=$idprod";
	$getelems=mysqli_query($conexion, $getelemquery);
	//print_r($getelems);
	
	while ($r=mysqli_fetch_assoc($getelems)) {
		$row[$r['id_elemento_linea']]=$r;
	}


foreach ($row as $key => $ro1) {
	
	$elements[]=$ro1['IDCatElem'];

		
		
		$id_elem=$ro1['id_elemento_linea'];
		
	$getprocsquery="SELECT IDCatPro FROM procesoslinea WHERE id_elemento_linea=$id_elem";
	$getprocs=mysqli_query($conexion, $getprocsquery);
	
	while ($row2=mysqli_fetch_assoc($getprocs)) {
		$processes[$ro1['IDCatElem']]['procesos'][]=$row2['IDCatPro'];
		
	}
	$processes[$ro1['IDCatElem']]['datos']['material']=1;
		
	$processes[$ro1['IDCatElem']]['datos']['alto']=4;
		$processes[$ro1['IDCatElem']]['datos']['ancho']=5;
		$processes[$ro1['IDCatElem']]['datos']['cantidad']=$qty;
		$processes[$ro1['IDCatElem']]['datos']['costoMod']=10;
		$processes[$ro1['IDCatElem']]['datos']['costoFinal']=$final;
}


$producto=array($idprod =>array( 'contenido'=>$processes,'cantidad'=>$qty, 'descuento'=>$descu,'costofinal'=>$final, 'papel'=>$paper) );

	echo "<pre>";
print_r($processes);
echo "</pre>";

$details=json_encode($producto);
echo $details;

$query = "INSERT INTO cotizacion(FechaCotizacion, FechaEvento, Nombre, Descripcion, IDCliente, IDAgente, CostoMod,CostoFinal,detalles) VALUES ('$current_date','$event_date',null,'$descrip',$clientid,1,null,$final,'$details')";
$result = mysqli_query($conexion, $query);
?>

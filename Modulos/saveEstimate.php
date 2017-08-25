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
$ajuste=$_POST['CAjuste'];
$costoelem=$_POST['costo-elemento'];	

	$getelemquery="SELECT el.id_elemento_linea,el.IDCatElem,ce.Ancho,ce.Alto FROM elementos_linea el INNER JOIN catalogoelemento ce ON el.IDCatElem=ce.IDCatElem WHERE IDLinea=$idprod";
	$getelems=mysqli_query($conexion, $getelemquery);
	//print_r($getelems);
	echo $getelemquery;
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
		
	$processes[$ro1['IDCatElem']]['datos']['alto']=$ro1['Alto'];
		$processes[$ro1['IDCatElem']]['datos']['ancho']=$ro1['Ancho'];
		$processes[$ro1['IDCatElem']]['datos']['cantidad']=$qty;
		$processes[$ro1['IDCatElem']]['datos']['ajuste']=$ajuste;
		$processes[$ro1['IDCatElem']]['datos']['costoFinal']=$costoelem[$ro1['IDCatElem']];
		$processes[$ro1['IDCatElem']]['datos']['papel']=$paper;
}


$producto=array($idprod =>array( 'contenido'=>$processes,'cantidad'=>$qty, 'descuento'=>$descu,'costofinal'=>$final, 'papel'=>$paper,'ajuste'=>$ajuste) );

	echo "<pre>";
	print_r($costoelem);
print_r($processes);
echo "</pre>";

$details=json_encode($producto);
echo $details;

$query = "INSERT INTO cotizacion(FechaCotizacion, FechaEvento, Nombre, Descripcion, IDCliente, IDAgente, CostoMod,CostoFinal,detalles) VALUES ('$current_date','$event_date',null,'$descrip',$clientid,1,null,$final,'$details')";
$result = mysqli_query($conexion, $query);
?>

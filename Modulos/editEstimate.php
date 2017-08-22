<?php 
include("../code/conexion.php");

$models=$_POST['models'];
$total=$_POST['total-amount'];
$idcotiza=$_POST['id-cotiza'];
foreach ($models as  $model) {
	$elements=$_POST['elements-'.$model];

	foreach ($elements as $key => $elem) {
		$procesos=(isset($_POST['procesos-'.$model.'-'.$elem]))?$_POST['procesos-'.$model.'-'.$elem] : '';
		
		
		$content[$model]['contenido'][$key]['procesos']=$procesos;
	} 
	
	$content[$model]['cantidad']=45;
	$content[$model]['descuento']=58;
	$content[$model]['costofinal']=$total;
	$content[$model]['papel']=30;
}

//$info= array('contenido' => $content, 'cantidad'=>45,'descuento'=>58,'costofinal'=>$total,'papel'=>30);
$info_jsdon=json_encode($content);

echo "<pre>";
print_r($content);
		echo "</pre>";
$update_query="UPDATE cotizacion SET detalles='$info_jsdon' WHERE IDCotizacion=$idcotiza";
$result=mysqli_query($conexion,$update_query);
	if ($result) {
		echo "todo salio bien";
	} else{
		echo mysqli_error;
			}

?>

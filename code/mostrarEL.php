<?php
//traer especificaiones
include("conexion.php");
if(isset($_POST["IDElemento"]))
{
    $idelem=$_POST['IDElemento'];
 //$output = array();
 $query = "SELECT elemento.IDProducto,elemento.CostoFinal, elemento.CostoMod, elemento.IDElemento, elemento.IDCatElem, catalogoelemento.Nombre, elemento.IDCatMat, "
         . "catalogomaterial.Nombre1, elemento.Cantidad, elemento.Ancho, elemento.Alto FROM elemento INNER JOIN catalogoelemento "
         . "on catalogoelemento.IDCatElem=elemento.IDCatElem INNER JOIN catalogomaterial on catalogomaterial.IDCatMat = "
         . "elemento.IDCatMat  WHERE elemento.IDCatElem = ".$idelem."";
 $result
         = mysqli_query($conexion, $query);
 
 while($row = mysqli_fetch_array($result))
         
         
 {
$output["IDElemento"] = $row["IDElemento"];
$output["Nombre1"] = $row["IDCatMat"];
$output["Alto"] = $row["Alto"]; 
$output["Ancho"] = $row["Ancho"];
$output["Cantidad"] = $row["Cantidad"];
$output["CostoMod"] = $row["CostoMod"];
$output["CostoFinal"] = $row["CostoFinal"];
 }
 echo json_encode($output);
}

?>

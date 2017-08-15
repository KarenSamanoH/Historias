
<?php
include("conexion.php");
if(isset($_POST["IDCliente"]))
{
 //$output = array();
 $query = "SELECT * FROM cliente WHERE IDCliente = '".$_POST["IDCliente"]."'";
 $result = mysqli_query($conexion, $query);
 while($row = mysqli_fetch_array($result))
 {
 
$output["IDCliente"] = $row["IDCliente"];
$output["IDEmpresa"] = $row["IDEmpresa"];
$output["Nombre1"] = $row["Nombre1"];
$output["TipoEvento"] = $row["TipoEvento"];
$output["Nombre2"] = $row["Nombre2"];
$output["Telefono"] = $row["Telefono"];
$output["Celular1"] = $row["Celular1"];
$output["Celular2"] = $row["Celular2"];
$output["Email1"] = $row["Email1"];
$output["FechaAlta"] = $row["FechaAlta"];
$output["IDAgente"] = $row["IDAgente"];
$output["Direccion"] = $row["Direccion"];
$output["TipoEvento"] = $row["TipoEvento"];

  
 }
 echo json_encode($output);
}

?>


<?php
//fetch_single.php
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
$output["Apellidos1"] = $row["Apellidos1"];
$output["TipoEvento"] = $row["TipoEvento"];
$output["Nombre2"] = $row["Nombre2"];
$output["Apellidos2"] = $row["Apellidos2"];
$output["Calle"] = $row["Calle"];
$output["Ciudad"] = $row["Ciudad"];
$output["Estado"] = $row["Estado"];
$output["CP"] = $row["CP"];
$output["Colonia"] = $row["Colonia"];
$output["Telefono"] = $row["Telefono"];
$output["Fax"] = $row["Fax"];
$output["Celular1"] = $row["Celular1"];
$output["Celular2"] = $row["Celular2"];
$output["Email1"] = $row["Email1"];
$output["Email2"] = $row["Email2"];
$output["FechaAlta"] = $row["FechaAlta"];
$output["EstatusCompra"] = $row["EstatusCompra"];
$output["IDAgente"] = $row["IDAgente"];
$output["Comentarios"] = $row["Comentarios"];
$output["TipoEvento"] = $row["TipoEvento"];
$output["TipoCliente"] = $row["TipoCliente"];
$output["Expo"] = $row["Expo"];
$output["FechaExpo"] = $row["FechaExpo"];
  
 }
 echo json_encode($output);
}

?>

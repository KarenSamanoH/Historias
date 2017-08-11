<?php

include("../code/conexion.php");
$query = '';
$data = array();
$records_per_page = 10;
$start_from = 0;
$current_page_number = 0;
if(isset($_POST["rowCount"]))
{
 $records_per_page = $_POST["rowCount"];
}
else
{
 $records_per_page = 10;
}
if(isset($_POST["current"]))
{
 $current_page_number = $_POST["current"];
}
else
{
 $current_page_number = 1;
}
$start_from = ($current_page_number - 1) * $records_per_page;
$query .= "
 SELECT 
  cliente.IDCliente,
  empresa.Empresa,
  cliente.Nombre1,
  cliente.Telefono, 
  cliente.TipoEvento FROM cliente 
  INNER JOIN empresa 
  ON empresa.IDEmpresa = cliente.IDEmpresa";
if(!empty($_POST["searchPhrase"]))
{
 $query .= ' WHERE (cliente.Nombre1 LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR empresa.Empresa LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR cliente.Telefono LIKE "%'.$_POST["searchPhrase"].'%" ';
 $query .= 'OR cliente.TipoEvento LIKE "%'.$_POST["searchPhrase"].'%" ) ';
 $query .= 'OR  cliente.IDCliente LIKE "%'.$_POST["searchPhrase"].'%"  ';
}
$order_by = '';
if(isset($_POST["sort"]) && is_array($_POST["sort"]))
{
 foreach($_POST["sort"] as $key => $value)
 {
  $order_by .= " $key $value, ";
 }
}
else
{
 $query .= ' ORDER BY cliente.IDCliente DESC ';
}
if($order_by != '')
{
 $query .= ' ORDER BY ' . substr($order_by, 0, -2);
}

if($records_per_page != -1)
{
 $query .= " LIMIT " . $start_from . ", " . $records_per_page;
}
//echo $query;
$result = mysqli_query($conexion, $query);

while($row = mysqli_fetch_assoc($result))
{
 $data[] = $row;
}



$query1 = "SELECT * FROM cliente";
$result1 = mysqli_query($conexion, $query1);
$total_records = mysqli_num_rows($result1);

$output = array(
 'current'  => intval($_POST["current"]),
 'rowCount'  => 10,
 'total'   => intval($total_records),
 'rows'   => $data
);

echo json_encode($output);

?>


<?php
//delete.php
include("conexion.php");
if(isset($_POST["IDCliente"]))
{
 $query = "DELETE FROM cliente WHERE IDCliente = '".$_POST["IDCliente"]."'";
 if(mysqli_query($conexion, $query))
 {
  echo 'Cliente eliminado.", ".", "success';
 }
}
?>

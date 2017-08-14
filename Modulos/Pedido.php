<?php include("../code/conexion.php");
if (empty($_POST)) {
  include 'empty_pedido.php';
}else{
  include 'modify_pedido.php';
}

?>
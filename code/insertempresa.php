<?php
//insertempresa.php
include("../code/conexion.php");

if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 { 
$Empresa = mysqli_real_escape_string($conexion, $_POST["Empresa"]);
$RFC = mysqli_real_escape_string($conexion, $_POST["RFC"]);
$Cargo = mysqli_real_escape_string($conexion, $_POST["Cargo"]);
$CURP = mysqli_real_escape_string($conexion, $_POST["CURP"]);
$Calle= mysqli_real_escape_string($conexion, $_POST["Calle"]);
$Ciudad = mysqli_real_escape_string($conexion, $_POST["ciudad"]);
$Estado= mysqli_real_escape_string($conexion, $_POST["Estado"]);
$CP = mysqli_real_escape_string($conexion, $_POST["CP"]);
$Colonia = mysqli_real_escape_string($conexion, $_POST["Colonia"]);
     
$query = "
INSERT INTO empresa(Empresa,Cargo,RFC,CURP, Calle,Ciudad,Estado,CP,Colonia) 
VALUES ('".$Empresa."','".$Calle."','".$Ciudad."','".$Estado."','".$CP."','".$Colonia."','".$CURP."','".$RFC."','".$Cargo."')";
   
  if(mysqli_query($conexion, $query))
  {
   echo 'Empresa agregada';
  }else{
  	echo mysqli_error($conexion);
  }
 }
}
 ?>
  
<?php
//insert.php
include("../code/conexion.php");
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Agregar")
 {
$IDEmpresa = mysqli_real_escape_string($conexion, $_POST["IDEmpresa"]);
$Nombre1 = mysqli_real_escape_string($conexion, $_POST["Nombre1"]);
$TipoEvento = mysqli_real_escape_string($conexion, $_POST["TipoEvento"]);
$Nombre2= mysqli_real_escape_string($conexion, $_POST["Nombre2"]);
$Telefono = mysqli_real_escape_string($conexion, $_POST["Telefono"]);
$Celular1 = mysqli_real_escape_string($conexion, $_POST["Celular1"]);
$Celular2 = mysqli_real_escape_string($conexion, $_POST["Celular2"]);
$Email1 = mysqli_real_escape_string($conexion, $_POST["Email1"]);
$FechaAlta = mysqli_real_escape_string($conexion, $_POST["FechaAlta"]);
$Direccion = mysqli_real_escape_string($conexion, $_POST["Direccion"]);
$IDAgente = mysqli_real_escape_string($conexion, $_POST["IDAgente"]);        

        
  $query = "
   INSERT INTO cliente(IDEmpresa, Nombre1 , TipoEvento, Nombre2 , Telefono,Celular1,Celular2,Email1,FechaAlta,Direccion,IDAgente) 
   VALUES ('".$IDEmpresa."', '".$Nombre1."','".$TipoEvento."','".$Nombre2."','".$Telefono."', '".$Celular1."', '".$Celular2."',"
          . "'".$Email1."', '".$FechaAlta."','".$Direccion."','".$IDAgente."')
  ";
  
  
  if(mysqli_query($conexion, $query))
  {
   echo 'Cliente agregado';
  }
 }

 if($_POST["operation"] == "Editar")
 {
$IDEmpresa = mysqli_real_escape_string($conexion, $_POST["IDEmpresa"]);
$Nombre1 = mysqli_real_escape_string($conexion, $_POST["Nombre1"]);
$TipoEvento = mysqli_real_escape_string($conexion, $_POST["TipoEvento"]);
$Nombre2= mysqli_real_escape_string($conexion, $_POST["Nombre2"]);
$Telefono = mysqli_real_escape_string($conexion, $_POST["Telefono"]);
$Celular1 = mysqli_real_escape_string($conexion, $_POST["Celular1"]);
$Celular2 = mysqli_real_escape_string($conexion, $_POST["Celular2"]);
$Email1 = mysqli_real_escape_string($conexion, $_POST["Email1"]);
$FechaAlta = mysqli_real_escape_string($conexion, $_POST["FechaAlta"]);
$Direccion = mysqli_real_escape_string($conexion, $_POST["Direccion"]);
$IDAgente = mysqli_real_escape_string($conexion, $_POST["IDAgente"]);       
$query = "
UPDATE cliente 
SET IDEmpresa = '".$IDEmpresa."', 
Nombre1 = '".$Nombre1."', 
TipoEvento = '".$TipoEvento."', 
Nombre2 = '".$Nombre2."',
Telefono = '".$Telefono."',
Celular1 = '".$Celular1."',
Celular2 = '".$Celular2."',
Email1 ='".$Email1."',
FechaAlta = '".$FechaAlta."',
IDAgente = '".$IDAgente."', 
Direccion ='".$Direccion."',


   WHERE IDCliente = '".$_POST["IDCliente"]."'
  ";
  if(mysqli_query($conexion, $query))
  {
   echo 'Información actualizada';
  }
 }
}
?>



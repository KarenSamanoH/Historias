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
$Fax = mysqli_real_escape_string($conexion, $_POST["Fax"]);
$Celular1 = mysqli_real_escape_string($conexion, $_POST["Celular1"]);
$Celular1 = mysqli_real_escape_string($conexion, $_POST["Celular2"]);
$Email1 = mysqli_real_escape_string($conexion, $_POST["Email1"]);
$FechaAlta = mysqli_real_escape_string($conexion, $_POST["FechaAlta"]);
$Comentarios = mysqli_real_escape_string($conexion, $_POST["Comentarios"]);
$Expo = mysqli_real_escape_string($conexion, $_POST["Expo"]);
$FechaExpo = mysqli_real_escape_string($conexion, $_POST["FechaExpo"]); 
$IDAgente = mysqli_real_escape_string($conexion, $_POST["IDAgente"]);        

        
  $query = "
   INSERT INTO cliente(IDEmpresa, Nombre1 , TipoEvento, Nombre2 , Telefono,Fax,Celular1,Celular2,Email1,FechaAlta,Comentarios,IDAgente, FechaExpo,Expo) 
   VALUES ('".$IDEmpresa."', '".$Nombre1."','".$TipoEvento."','".$Nombre2."','".$Telefono."','".$Fax."', '".$Celular1."', '".$Celular2."',"
          . "'".$Email1."', '".$FechaAlta."','".$Comentarios."','".$IDAgente."','".$FechaExpo."','".$Expo."')
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
$Fax = mysqli_real_escape_string($conexion, $_POST["Fax"]);
$Celular1 = mysqli_real_escape_string($conexion, $_POST["Celular1"]);
$Celular2 = mysqli_real_escape_string($conexion, $_POST["Celular2"]);
$Email1 = mysqli_real_escape_string($conexion, $_POST["Email1"]);
$FechaAlta = mysqli_real_escape_string($conexion, $_POST["FechaAlta"]);
$Comentarios = mysqli_real_escape_string($conexion, $_POST["Comentarios"]);
$Expo = mysqli_real_escape_string($conexion, $_POST["Expo"]);
$FechaExpo = mysqli_real_escape_string($conexion, $_POST["FechaExpo"]); 
$IDAgente = mysqli_real_escape_string($conexion, $_POST["IDAgente"]);       
$query = "
UPDATE cliente 
SET IDEmpresa = '".$IDEmpresa."', 
Nombre1 = '".$Nombre1."', 
TipoEvento = '".$TipoEvento."', 
Nombre2 = '".$Nombre2."',
Telefono = '".$Telefono."',
Fax = '".$Fax."',
Celular1 = '".$Celular1."',
Celular2 = '".$Celular2."',
Email1 ='".$Email1."',
FechaAlta = '".$FechaAlta."',
IDAgente = '".$IDAgente."', 
Comentarios ='".$Comentarios."',
Expo = '".$Expo."',
FechaExpo ='".$FechaExpo."'

   WHERE IDCliente = '".$_POST["IDCliente"]."'
  ";
  if(mysqli_query($conexion, $query))
  {
   echo 'Información actualizada';
  }
 }
}
?>



<?php
//insert.php
include("../code/conexion.php");
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Agregar")
 {
$IDEmpresa = mysqli_real_escape_string($conexion, $_POST["IDEmpresa"]);
$Nombre1 = mysqli_real_escape_string($conexion, $_POST["Nombre1"]);
$Apellidos1 = mysqli_real_escape_string($conexion, $_POST["Apellidos1"]);
$TipoEvento = mysqli_real_escape_string($conexion, $_POST["TipoEvento"]);
$Nombre2= mysqli_real_escape_string($conexion, $_POST["Nombre2"]);
$Apellidos2 = mysqli_real_escape_string($conexion, $_POST["Apellidos2"]);
$Calle= mysqli_real_escape_string($conexion, $_POST["Calle"]);
$Ciudad = mysqli_real_escape_string($conexion, $_POST["Ciudad"]);
$Estado= mysqli_real_escape_string($conexion, $_POST["Estado"]);
$CP = mysqli_real_escape_string($conexion, $_POST["CP"]);
$Colonia = mysqli_real_escape_string($conexion, $_POST["Colonia"]);
$Telefono = mysqli_real_escape_string($conexion, $_POST["Telefono"]);
$Fax = mysqli_real_escape_string($conexion, $_POST["Fax"]);
$Celular1 = mysqli_real_escape_string($conexion, $_POST["Celular1"]);
$Celular2 = mysqli_real_escape_string($conexion, $_POST["Celular2"]);
$Email1 = mysqli_real_escape_string($conexion, $_POST["Email1"]);
$Email2 = mysqli_real_escape_string($conexion, $_POST["Email2"]);
$FechaAlta = mysqli_real_escape_string($conexion, $_POST["FechaAlta"]);
$EstatusCompra = mysqli_real_escape_string($conexion, $_POST["EstatusCompra"]);
$Comentarios = mysqli_real_escape_string($conexion, $_POST["Comentarios"]);
$TipoCliente = mysqli_real_escape_string($conexion, $_POST["TipoCliente"]);
$Expo = mysqli_real_escape_string($conexion, $_POST["Expo"]);
$FechaExpo = mysqli_real_escape_string($conexion, $_POST["FechaExpo"]); 
$IDAgente = mysqli_real_escape_string($conexion, $_POST["IDAgente"]);        

        
  $query = "
   INSERT INTO cliente(IDEmpresa, Nombre1 , Apellidos1, TipoEvento, Nombre2 , Apellidos2,Calle,Ciudad,Estado,CP,Colonia,Telefono,Fax,Celular1,Celular2,Email1,Email2,FechaAlta,EstatusCompra,Comentarios,IDAgente, FechaExpo,TipoCliente,Expo) 
   VALUES ('".$IDEmpresa."', '".$Nombre1."', '".$Apellidos1."','".$TipoEvento."','".$Nombre2."', '".$Apellidos2."', '".$Calle."','".$Ciudad."','".$Estado."', '".$CP."', '".$Colonia."','".$Telefono."','".$Fax."', '".$Celular1."', '".$Celular2."',"
          . "'".$Email1."','".$Email2."', '".$FechaAlta."', '".$EstatusCompra."','".$Comentarios."','".$IDAgente."','".$FechaExpo."','".$TipoCliente."', '".$Expo."')
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
$Apellidos1 = mysqli_real_escape_string($conexion, $_POST["Apellidos1"]);
$TipoEvento = mysqli_real_escape_string($conexion, $_POST["TipoEvento"]);
$Nombre2= mysqli_real_escape_string($conexion, $_POST["Nombre2"]);
$Apellidos2 = mysqli_real_escape_string($conexion, $_POST["Apellidos2"]);
$Calle= mysqli_real_escape_string($conexion, $_POST["Calle"]);
$Ciudad = mysqli_real_escape_string($conexion, $_POST["Ciudad"]);
$Estado= mysqli_real_escape_string($conexion, $_POST["Estado"]);
$CP = mysqli_real_escape_string($conexion, $_POST["CP"]);
$Colonia = mysqli_real_escape_string($conexion, $_POST["Colonia"]);
$Telefono = mysqli_real_escape_string($conexion, $_POST["Telefono"]);
$Fax = mysqli_real_escape_string($conexion, $_POST["Fax"]);
$Celular1 = mysqli_real_escape_string($conexion, $_POST["Celular1"]);
$Celular2 = mysqli_real_escape_string($conexion, $_POST["Celular2"]);
$Email1 = mysqli_real_escape_string($conexion, $_POST["Email1"]);
$Email2 = mysqli_real_escape_string($conexion, $_POST["Email2"]);
$FechaAlta = mysqli_real_escape_string($conexion, $_POST["FechaAlta"]);
$EstatusCompra = mysqli_real_escape_string($conexion, $_POST["EstatusCompra"]);
$Comentarios = mysqli_real_escape_string($conexion, $_POST["Comentarios"]);
$TipoCliente = mysqli_real_escape_string($conexion, $_POST["TipoCliente"]);
$Expo = mysqli_real_escape_string($conexion, $_POST["Expo"]);
$FechaExpo = mysqli_real_escape_string($conexion, $_POST["FechaExpo"]); 
$IDAgente = mysqli_real_escape_string($conexion, $_POST["IDAgente"]);       
$query = "
UPDATE cliente 
SET IDEmpresa = '".$IDEmpresa."', 
Nombre1 = '".$Nombre1."', 
Apellidos1 = '".$Apellidos1."',
TipoEvento = '".$TipoEvento."', 
Nombre2 = '".$Nombre2."',
Apellidos2 ='".$Apellidos2."',
Calle = '".$Calle."', 
Ciudad = '".$Ciudad."',
Estado = '".$Estado."', 
CP ='".$CP."',
Colonia = '".$Colonia."', 
Telefono = '".$Telefono."',
Fax = '".$Fax."',
Celular1 = '".$Celular1."',
Celular2 = '".$Celular2."',
Email1 ='".$Email1."',
Email2 = '".$Email2."', 
FechaAlta = '".$FechaAlta."',
IDAgente = '".$IDAgente."', 
EstatusCompra = '".$EstatusCompra."',
Comentarios ='".$Comentarios."',
TipoCliente = '".$TipoCliente."',
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



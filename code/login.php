<?php
session_start();
require_once "conexion.php";
$mysqli=new mysqli("localhost","root","","historias");

$user1=$_POST['user'];
$pass1= $_POST['password'];

$sql="SELECT * from  cuenta where NombreCuenta =  _utf8 '$user1' collate utf8_bin and Contrasena = _utf8 '$pass1' collate utf8_bin";

$res=mysqli_fetch_assoc($mysqli->query($sql));

$user=$res['Contrasena'];
if ($res){
    $_SESSION['user'] = $user;
    $_SESSION['logged_in']=true;
    echo 1;
    

}else{
   $_SESSION['logged_in']=false; 
echo 0;    
    }
?>

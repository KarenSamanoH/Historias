<?php

session_start();
require_once "conexion.php";
$mysqli=new mysqli("localhost","root","","historias");

$user1=$_POST['user'];
$pass1= $_POST['password'];

$sql="SELECT * from  cuenta where NombreCuenta='$user1' and Contrasena='$pass1'";

$res=mysqli_fetch_assoc($mysqli->query($sql));

$user=$res['Contrasena'];
if ($res){
    $_SESSION['user'] = $user;
    echo 1;
    

}else{
    
echo 0;    
    }
?>

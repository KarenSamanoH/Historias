<?php

if( !session_id() )
{
    session_start();
}

session_destroy();
$_SESSION['logged_in']=false;
?>

<script>
   //alert("la session se ha cerrado correctamente");
   //self.location.replace("index.php");

       
 	self.location.replace("../index.php");
                                                 
   
</script>


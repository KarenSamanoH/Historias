<?php include("../code/conexion.php");
if( !session_id() )
    {
        session_start();
     
        
    }
    if(@$_SESSION['logged_in'] != true){
        echo '
    <script>
        alert("Inicia Sesion para entrar a esta pagina");
        self.location.replace("../index.php");
    </script>';
    }else{
        if (empty($_POST)) {
  include 'empty_pedido.php';
}else{
  include 'modify_pedido.php';
}
    }


?>
<div class="backdrop"></div>
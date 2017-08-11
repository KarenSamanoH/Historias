<?php include("../code/conexion.php");
$query = "SELECT * FROM catalogomaterial";
$result = mysqli_query($conexion, $query);
$output = '';
while($row = mysqli_fetch_array($result))
{
 $output .= '<option value="'.$row["IDCatMat"].'">'.$row["Nombre1"].'</option>'; 
}
?>

<html lang="en">
    
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Historias en papel</title>
<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
--><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>  <!--

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<link href="../css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="../css/historias.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />

--><link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="../css/botones.css" rel="stylesheet" type="text/css"/>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="../css/historias.css" rel="stylesheet" type="text/css"/>
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
<!--<script>
$( function() {
$( "#datepicker" ).datepicker();
} );
</script>-->

<!--

<script>
$.datepicker.regional['es'] = {
closeText: 'Cerrar',

prevText: '< Ant',
nextText: 'Sig >',
currentText: 'Hoy',
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
weekHeader: 'Sm',
dateFormat: 'dd/mm/yy',
firstDay: 1,
isRTL: false,
showMonthAfterYear: false,
yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#fecha").datepicker();
});
</script>-->


<!-- Custom Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<!-- JS--> 




<body >
 <!------oncontextmenu="return false" onkeydown="return false--->

<nav id="mainNav" class="navbar navbar-default navbar-custom">
<div class="container">
<div class="navbar-header page-scroll">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle</span>Menú<i class="fa fa-bars"></i>
</button>
<a class="navbar-brand page-scroll" href="../Modulos/Principal.php ">Historias en Papel</a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
<li class="hidden">
<a href="#page-top"></a>
</li>
<li>
<a class="page-scroll" href="Clientes.php">Clientes<span  class="fa fa-suitcase" aria-hidden="true"></span></a>
</li>
<li>
<a class="page-scroll" href="Pedido.php">Pedido<span class="glyphicon glyphicon-book"></span></a>
</li>
<li>
<a class="page-scroll" href="Reportar.php">Reportar un problema<span class="glyphicon glyphicon-exclamation-sign"></span></a>
</li>
<li>
<a class="page-scroll" href="../index.php">Salir<span class="glyphicon glyphicon-log-out"></span></a>
</li>
</ul>
</div>

</div>

</nav>


<div class="container responsive">
<h1 align="center">Detalles del pedido</h1>
</div>

<div class="col-xs-12 col-sm-12 ">
<div class="panel panel-default">
<div class="panel-heading resume-heading">
<div class="row">
<div class="col-lg-12">
<div class="col-xs-12 col-sm-4">
<figure>
<img class="img-circle img-responsive" alt="cotizacion" src="../img/cot.png">
</figure>

<div class="row">
<div class="col-xs-12 social-btns">

<div class="col-xs-12 col-md-1 col-lg-1 social-btn-holder">
</div>
</div>
</div>

</div>

<div class="col-xs-12 col-sm-8">
<div class="form-group col-xs-4">
<label for="Nombre" class="control-label">Nombre</label>
<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="">
</div>

<div class="form-group col-xs-4">
<label for="Descripción" class="control-label">Descripción</label>
<input type="text" class="form-control" id="Descripción" name="Descripción" placeholder="">
</div>

<div class="form-group col-xs-4">
<label for="Descuento" class="control-label">Descuento</label>
<input type="text" class="form-control" id="Descuento" name="Descuento" placeholder="">
</div>

<div class="form-group col-xs-4">
<label for="Crédito" class="control-label">Crédito</label>
<input type="text" class="form-control" id="Crédito" name="Crédito" placeholder="">
</div>

<div class="form-group col-xs-4">
<label for="FechaE" class="control-label">Fecha de evento</label>
<input type="text" class="form-control"  id="datepicker" name="FechaE" placeholder="">
</div>


<div class="form-group col-xs-4">
<label for="CostoF" class="control-label">Costo Final</label>
<input type="text" class="form-control" id="CostoF" name="CostoF" placeholder="">
</div>




<div class="form-group col-xs-4">
<label for="Pedido" class="control-label hidden">boton</label>
<input  type="submit" class="btn btn-success" id="Pedido" name="Pedido" value="  Enviar pedido  ">
</div>
    
<div class="form-group col-xs-4">
<label for="Pedido" class="control-label hidden">boton</label>
<input  type="submit" class="btn btn-info" id="Coti" name="Coti" value="Guardar cotización" >
</div>

</div>
</div>
</div>
</div>

<div class="container">
	<div class="row">
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#invitacion" data-toggle="tab" aria-controls="invitacion" role="tab" title="invitaciones">
                            <span class="round-tab">
                            <img src="../img/invitacion.png" class="img-circle img-responsive"/>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#caja" data-toggle="tab" aria-controls="caja" role="tab" title="caja">
                            <span class="round-tab">
                            <img src="../img/caja.png" class="img-circle img-responsive"/>
                            </span>
                        </a>
					</li>                  

                    <li role="presentation" class="disabled">
                        <a href="#papeleria" data-toggle="tab" aria-controls="papeleria" role="tab" title="papeleria">
                            <span class="round-tab">
                           <img src="../img/tapa.png" class="img-circle img-responsive"/>
                            </span>
                        </a>
                    </li>
                    
                    <li role="presentation" class="disabled">
                        <a href="#recuerdos" data-toggle="tab" aria-controls="recuerdos" role="tab" title="recuerdos">
                            <span class="round-tab">
                            <img src="../img/recuerdos.png" class="img-circle img-responsive"/>
                            </span>
                        </a>
                    </li>
                    
                    <li role="presentation" class="disabled">
                        <a href="#otros" data-toggle="tab" aria-controls="otros" role="tab" title="Otros">
                            <span class="round-tab">
                            <img src="../img/otros.png" class="img-circle img-responsive"/>
                            </span>
                        </a>
                    </li>
                    
                </ul>
            </div>


            
<div class="tab-content" align="center">
<div class="tab-pane active col-xs-12" role="tabpanel" id="invitacion">
<h3>Elija el modelo de la invitación</h3>

<div class="box col-lg-12">     
<ul class="list-inline">
<li><input type="text" class="text-primary form-control inputdefault" id="inviauto" name="inviauto" placeholder="Buscar" /></li>
<div id="inviList"></div>         
</ul>
</div>
<br/>

<div class="container col-lg-12">
<div class="panel-group">
<div class="panel panel-info">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" href="#collapseB">Boletos</a>
</h4>
</div>
<div id="collapseB" class="panel-collapse collapse">
<div class="panel-body">

    <form id="boletos" name="boletos">
<div class="row col-md-8 col-md-offset-2">
<div class="form">
<div class="col-md-12"  align="center">
    <h4>Modelo</h4><ul class="list-inline">
<li><input type="text" class="form-control"  id="IDElemento" name="IDElemento" placeholder="Buscar M" /></li>
<div id="BoList"></div>   
</ul>
</div>
    
    <div class="col-md-12"><h5 class="headerSign">Caracteristicas</h5></div>   

<div class="col-md-6">

<form action="" method="post">

<div class="form-group">
<label for="Material" class="control-label">Material</label>
<select name="Nombre1" id="Nombre1" class="form-control" placeholder='Material' >
<?php echo $output; ?>
</select>
</div>
    


<div class="form-group">
 <label for="Alto" class="control-label">Alto</label>
<input class="form-control" type="text" name="Alto" id="Alto" placeholder="Alto">
</div>

<div class="form-group">
<label for="Ancho" class="control-label">Ancho</label>
<input class="form-control" type="text" name="Ancho" id="Ancho" placeholder="Ancho">
</div>
    
</div>

    <div class="col-md-6"> 
        
        
       <div class="form-group">
           <label for="Cantidad" class="control-label">Cantidad</label>
<input class="form-control" type="text" name="Cantidad" id="Cantidad" placeholder="Cantidad">
</div>

<div class="form-group ">
<label for="Costo" class="control-label">Costo del modelo</label>
<input class="form-control" type="text" name="CostoMod" id="CostoMod" value="" placeholder="$">
</div>
    
 <div class="form-group ">
 <label for="Cantidad" class="control-label">Costo Final</label>
<input class="form-control" type="text" name="CostoFinal" id="CostoFinal" value="" placeholder="$ Final">
</div> 
        </div>
    



<div class ="col-md-12 center-block">
<h5>Procesos</h5>
<form action="" method="POST">
<?php 
$flag=true;
$query2="SELECT * FROM catalogoproceso";
$resultado=mysqli_query($conexion, $query2);
while($row2 = mysqli_fetch_assoc($resultado)){ ?>
    
 <div class="btn-group" data-toggle="buttons">
<label class="btn btn-info   <?=($flag==true)? active : '  ' ?>">				
<span class="">
<i class="fa fa-check-square" aria-hidden="true"> </i><?=$row2 ['Nombre'] ?>  
</span>
    <input autocomplete="off" checked=""  type="checkbox" id='<?=$row2['IDCatPro'] ?>' name="check_list[]" value="<?=$row2['IDCatPro'] ?>">
<span class="">
    <i class="fa fa-square-o"><br></i><?=$row2 ['Nombre'] ?>  
</span>
</label>
</div>
    <?php } ?>
</form>

            
        </div>
             
</div>
        
</div>
        </form>


</div>
</div>
</div>
</div> 

</div>

</div>
 
<!-----Caja---->
<div class="tab-pane" role="tabpanel" id="caja">
<h3>Elija el modelo de la caja</h3>
<ul class="list-inline pull-left">
<li><input type="text" class="text-primary form-control inputdefault"  id="autoCajas" name="autoCajas" autocomplete="off"  placeholder="Buscar" /></li>
<li><button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search" aria-hidden="true"></i></button></li>       
<div id="CajasList"></div>   
</ul>
</div>
<div class="tab-pane" role="tabpanel" id="recuerdos">
<h3>Elija el modelo del recuerdo</h3>
<ul class="list-inline pull-left">
<li><input type="text" class="text-primary form-control inputdefault" autocomplete="off" id="autoRecu" name="autoRecu" placeholder="Buscar" /></li>
<li><button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search" aria-hidden="true"></i></button></li>    
<div id="RecuList"></div>   
</ul>
</div>
<div class="tab-pane" role="tabpanel" id="papeleria">
<ul class="list-inline pull-left">
<h3>Elija su producto de papelería</h3>
<li><input type="text" class="text-primary form-control inputdefault" autocomplete="off" id="autoPapeleria" name="autoPapeleria" placeholder="Buscar" /></li>
<li><button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search" aria-hidden="true"></i></button></li> 
<div id="PapeList"></div>   
</ul>
</div>    
<div class="tab-pane" role="tabpanel" id="otros">
<h3>Personalize su producto</h3>
<ul class="list-inline pull-left">
<li><input type="text" class="text-primary form-control inputdefault" autocomplete="off"  placeholder="Buscar" /></li>
<li><button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search" aria-hidden="true"></i></button></li>
</ul>
</div>

<div class="clearfix"></div>
</div>
</div>
</section>
</div>
</div>


</body>
</html>

<!--------Autocomplete invitaciones--------->

<script>  
 $(document).ready(function(){  
      $('#inviauto').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"../code/autoP.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#inviList').fadeIn();  
                          $('#inviList').html(data);  
                     }  
                });  
           }  
      });  
      
 }); 
 
 function rellenar(id,idelemento){
     rellenarDefault(idelemento);
     $('#inviauto').val($(id).text());  
           $('#inviList').fadeOut(); 
 }
 </script>  
 <!-----Autocomplete Cajas----->
 <script>  
 $(document).ready(function(){  
      $('#autoCajas').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"../code/autoPC.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  rellenar2(idelemento);
                          $('#CajasList').fadeIn();  
                          $('#CajasList').html(data);  
                     }  
                });  
           }  
      });  
      
 });  
 </script>  
 
 
  <!-----Autocomplete Papelería----->
 <script>  
 $(document).ready(function(){  
      $('#autoPapeleria').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"../code/autoPP.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#PapeList').fadeIn();  
                          $('#PapeList').html(data);  
                     }  
                });  
           }  
      });  
       
 });  
 </script>  
 
 
   <!-----Autocomplete Recuerdos----->
 <script>  
 $(document).ready(function(){  
      $('#autoRecu').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"../code/autoPR.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#RecuList').fadeIn();  
                          $('#RecuList').html(data);  
                     }  
                });  
           }  
      });  
       
 });  
 </script>  
 
 <!--------Autocomplete Boleto--------->


 
 
<script>  
 $(document).ready(function(){  
      $('#IDElemento').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"../code/autoBo.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                         
                         
                         
                          $('#BoList').fadeIn();  
                          $('#BoList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
             
      });  
 }); 
 
 function rellenar2(id,idelem){
     $('#IDElemento').val($(id).text());
     var name=$(id).text();
           $('#BoList').fadeOut();
            $.ajax({
    url:"../code/mostrarD.php",
    method:"POST",
    data:{IDElemento:name},
    dataType:"json",
    success:function(data)
    {
$('#Nombre1').val(data.Nombre1);       
$('#Alto').val(data.Alto);
$('#Ancho').val(data.Ancho);
$('#Cantidad').val(data.Cantidad);
$('#CostoMod').val(data.CostoMod); 
$('#CostoFinal').val(data.CostoFinal);
    } 
    }
  );
 }
 function rellenarDefault(idelem){
     
            $.ajax({
    url:"../code/mostrarEL.php",
    method:"POST",
    data:{IDElemento:idelem},
    dataType:"json",
    success:function(data)
    {
$('#IDElemento').val(data.IDElemento);          
$('#Nombre1').val(data.Nombre1);       
$('#Alto').val(data.Alto);
$('#Ancho').val(data.Ancho);
$('#Cantidad').val(data.Cantidad);
$('#CostoMod').val(data.CostoMod); 
$('#CostoFinal').val(data.CostoFinal);
    } 
    }
  );
 }
 </script>  
 
  
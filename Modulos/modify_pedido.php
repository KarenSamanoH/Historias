<?php include("../code/conexion.php");
$cotizaId=$_POST['id-cotizacion'];

$data_query="SELECT * FROM cotizacion WHERE IDCotizacion=$cotizaId";


$getdata=mysqli_fetch_assoc(mysqli_query($conexion, $data_query));


$products_query="SELECT * FROM producto WHERE IDCotizacion=$cotizaId";
//$getprods=mysqli_fetch_assoc(mysqli_query($conexion, $products_query));
//print_r($getprods);
$getprods=mysqli_query($conexion, $products_query);

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
<style type="text/css">
  .not-allow{
    cursor:not-allowed!important;
  }
.checgroup{
  
width: 75px;
height: 50px;
display: inline-block;
font-size: 11px;
font-weight: bold;

position: relative;
-webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; 
}
.controls{
  width: 45px;
  position: relative;
}
.iteration{
  background: #000; width: 18px; height: 18px; border-radius: 64px; color: #fff;
  position: absolute;
  top: 14px;
  right: 15px;
  line-height:  18px;


}
.less{
   width: 18px; height: 18px; color: #000;
  display: inline-block;
  
  margin-right: -2px;
  padding: 0;
  cursor: pointer;
  background-image: url('../img/less.png');
  background-position: center;
  background-size: contain;
  

}
.more{
   width: 18px; height: 18px;  color: #000;
  display: inline-block;
  cursor: pointer;
  margin-left: -2px;
  padding: 0;
  pointer-events: default;
  background-image: url('../img/more.png');
  background-position: center;
  background-size: contain;
  font-family: "helvetica";
}
.checgroup input{
  display: none;
}
.checkicon{
  width: 30px;
  height: 30px;
  background-image: url('../img/off.png');
  background-position: center;
  background-size: contain;
  margin: 0 auto;
  cursor: pointer;
  
}
.checkicon-on{
  width: 30px;
  height: 30px;
  background-image: url('../img/on.png');
  background-position: center;
  background-size: contain;
  margin: 0 auto;
  
  
}
.checkicon-on-blue{
  background-image: url('../images/completed.png');
}
.checkicon-on-green{
  background-image: url('../images/ontime.png');
}
.checkicon-on-red{
  background-image: url('../images/not.png');
}
.checkicon-on-yellow{
  background-image: url('../images/late.png');
}
.checktext{
  margin-top: 5px;
}
#mainNav{
  padding:0!important;
  margin: 0!important;
}
.line {
    width: 97%;
    position: relative;
    border-bottom: 1px solid #ccc;
    margin: 10px;
}
.separator {
    padding: 0 10px;
    margin-top: 10px;
    background: #fff;
    top: -10px;
    left: 50%;
    transform: translate(-50%, -50%);
    position: absolute;
    color: #808080;
    font-family: "Helvetica";
    font-weight: bold;
}
.img-circle{
  width: 35%!important;
}
.indicator{
  position: absolute;
  right: 7px;
  top: 4px;
  width: 30px;
  height: 30px;
}
.indicator img{
  width: 100%;
}
.price{
  position: absolute;
  width: 75px;
  height: 25px;
  line-height: 25px;
  top:-25px;
  font-size: 15px;
  text-align: center;
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding:5px 16px;
    font-size: 16px;
    width: 180px;
    border: none;
    cursor: pointer;
    
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    position: relative;
    display: inline-block;
    width: 100%;
    text-align: right;

}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    width: 100%;
    overflow: auto;
    box-shadow: 0px 0px 8px 0px rgba(119, 119, 119, 0.86);
-moz-box-shadow: 0px 0px 8px 0px rgba(119, 119, 119, 0.86);
-webkit-box-shadow: 0px 0px 8px 0px rgba(119, 119, 119, 0.86);
    z-index: 1;
    text-align: left;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
  border:1px solid transparent;
    text-decoration: none;
    display: inline-block;
}
.dropdown-content a:hover{
   background-color: #d9edf7;
    border:1px solid #bce8f1;
}



.show {display:block;}
.input_fields_wrap th{
  text-align: center;
  padding: 6px!important;
  border:1px solid #f2f2f2;
  
}
.input_fields_wrap{
  margin-top: 10px;
}
.input_fields_wrap tr, td{
  padding: 6px!important;
   border:1px solid #f2f2f2;
}
.resume-heading{
  padding-bottom: 0!important;
}
.input_fields_wrap tr:nth-child(even){background: #f2f2f2}
.col-md-4 img{
  width: 80%;
}
.panel-body-parent{
  background:#F7F7F7!important;
}
.model-details{
  display: inline-block;
  width: 20%;
  color: #fff;
  font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-weight: bold;
  font-size: 18px;
  position: relative;
}
.model-details img{
  width: 30px;
  position: absolute;
  top: -3px;
  right: 0;
  cursor: pointer;
}
.addelem{
  background: #5bc0de!important;
  width: 190px!important;

}
</style>
</head>


<body >
 <!-- oncontextmenu="return false" onkeydown="return false -->
 
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
<a class="page-scroll" href="../code/logout.php">Salir<span class="glyphicon glyphicon-log-out"></span></a>
</li>
</ul>
</div>

</div>

</nav>

<div class="col-xs-12 col-sm-12 ">
<div class="panel panel-default">
<div class="panel-heading resume-heading">
<div class="row">
<div class="col-lg-12">
<div class="col-xs-12 col-sm-2">
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

<div class="col-xs-12 col-sm-10">



<div class="form-group col-xs-2">
<label for="FechaE" class="control-label">Fecha de evento</label>
<input type="text" class="form-control"  id="datepicker" name="FechaE" placeholder="" value="<?=$getdata['FechaEvento'] ?>">
</div>


<div class="form-group col-xs-2">
<label for="CostoF" class="control-label">Costo Final</label>
<input type="text" class="form-control" id="CostoF" name="CostoF" readonly="true" placeholder="">
</div>




<div class="form-group col-xs-2">
<p style="margin: 0;">&nbsp</p>

<input  type="submit" class="btn btn-success" id="Pedido" name="Pedido" value="  Enviar pedido  ">
</div>

<div class="form-group col-xs-2">
<p style="margin: 0;">&nbsp</p>

<input  type="submit" class="btn btn-info" id="Coti" onclick="$('#general-form').submit();" name="Coti" value="Guardar cotización" >
</div>
<div class="form-group col-xs-2">
<div class="search-box" style="margin-top: 25px;">
    <input type="text"  autocomplete="off" placeholder="Agregar otro modelo" />
        <div class="result"></div>
    </div>
</div>

</div>
</div>
</div>
</div>
<br>
<div class="container" style="width: 100%!important;">
	<div class="tab-content" align="center">
<div class="tab-pane active col-xs-12" role="tabpanel" id="invitacion">

 <form id="general-form" method="post" onsubmit="sendAllData(event);">
<div class="container col-lg-12" id="container">
<input type="hidden" name="total-amount" id="total-amount">
<?php
if ($getdata['detalles']!='') {
  
$details= json_decode($getdata['detalles'],TRUE);

foreach ($details as $key => $product)
 
{  $getprodinfo="SELECT * FROM catalogoproducto WHERE IDLinea=$key";
  $prodinfo=mysqli_query($conexion, $getprodinfo);
  $row4=mysqli_fetch_assoc($prodinfo);



  $productId=$row4['IDLinea']; ?>
<div class="panel-group" id="panel-group-<?=$productId ?>">
<div class="panel panel-info">
<div class="panel-heading" id="panel-<?=$productId ?>" style="position: relative; background: #31708f!important; color:#fff">
<a data-toggle="collapse" href="#collapse<?=$productId ?>">
<div class="model-details">
MODELO: <?=$row4['Modelo'] ?>
</div><div class="model-details">
DESCUENTO: 
</div><div class="model-details">
CANTIDAD: <?= $details[$key]['cantidad'] ?>
</div><div class="model-details">
  PRECIO: <?=$details[$key]['costofinal'] ?>
</div></a><div class="model-details">
  &nbsp <img src="../img/t.png" onclick="removeModel(<?=$productId ?>)">
</div>
<input type="hidden" class="models" name="models[]" value="<?=$productId ?>">
<div class="indicator" style="display: none;"><img src="../img/save.png"></div>
</div>
<div id="collapse<?=$productId ?>" class="panel-collapse collapse">
<div class="panel-body panel-body-parent">

<div class=" col-md-4">
<img src="../img/22.jpg">
</div>   
<div class=" col-md-8" id="elem-contain-<?=$productId ?>">
<div class="form">

    
      

    



<div class="col-md-2">
  <h5 class="headerSign" style="text-align: left;">    ELEMENTOS</h5>
</div>
<div class="col-md-10">
  <div class="dropdown">
<button type="button" onclick="dropElems(<?=$productId ?>)" class="dropbtn addelem">Agregar Elemento <span class="glyphicon glyphicon-chevron-down " aria-hidden="true"></span></button>
  <div id="newelem-<?=$productId ?>" class="dropdown-content">
  <?php 
  $getElemsQuery="SELECT * FROM catalogoelemento";
  $getElems=mysqli_query($conexion, $getElemsQuery);
  while ($catelem=mysqli_fetch_assoc($getElems)){
  
   ?>
    <a href="#" onclick="addElem(<?=$productId ?>,'<?=$catelem['Nombre'] ?>',<?=$catelem['IDCatElem'] ?>)"><?=$catelem['Nombre'] ?></a>
    
    <?php } ?>
  </div>
</div>
</div>
<?php 
  $elements=$product['contenido'];
  if ($elements!='') {
    
  foreach ($elements as $key2 => $element) 
 { 
  
  $elem_query="SELECT* FROM catalogoelemento WHERE IDCatElem=$key2";
  $getelem=mysqli_query($conexion, $elem_query);
  $row2=mysqli_fetch_assoc($getelem);
  $idelem=$row2['IDCatElem'];
  $procesos=$element['procesos'];
  ?>
  
<div class ="col-md-12 center-block">

  <br>

<div class="panel panel-info">
<a data-toggle="collapse" href="#collapse-elem-<?=$productId ?>-<?=$idelem ?>">
<div class="panel-heading panel-elem" id="panel-<?=$idelem ?>" style="position: relative; background: #d9edf7;">
<h4 class="panel-title">
<?=$row2['Nombre'] ?>
</h4>
<div class="indicator" style="display: none;"><img src="../img/save.png"></div>
</div></a>
<div id="collapse-elem-<?=$productId ?>-<?=$idelem ?>" class="panel-collapse collapse">
<div class="panel-body">

    
<div class="row ">
<div class="col-md-12"><h5 class="headerSign">Caracteristicas</h5></div> 
  <div class="col-md-6">



<div class="form-group">
<label for="Material" class="control-label">Material</label>
<select name="materiales[<?=$productId ?>]" id="Nombre1" class="form-control" placeholder='Material' >
<?php echo $output; ?>
</select>
</div>
    


<div class="form-group">
 <label for="Alto" class="control-label">Alto</label>
<input class="form-control prices" type="number" name="altos[<?=$productId ?>]" id="Alto" placeholder="Alto" value="0">
</div>

<div class="form-group">
<label for="Ancho" class="control-label">Ancho</label>
<input class="form-control prices" type="number" name="anchos[<?=$productId ?>]" id="Ancho" placeholder="Ancho" value="0">
</div>
    
</div>

    <div class="col-md-6"> 
        
        
       <div class="form-group">
           <label for="Cantidad" class="control-label">Cantidad</label>
<input class="form-control prices" type="number" name="cantidades[<?=$productId ?>]" id="Cantidad" placeholder="Cantidad" value="<?= $details[$key]['cantidad'] ?>">
</div>

<div class="form-group ">
<label for="Costo" class="control-label">Costo del papel</label>
<input class="form-control prices" type="number" name="costosMod[<?=$productId ?>]" id="CostoMod" value="<?=$details[$key]['papel'] ?>" placeholder="$">
</div>
    
 <div class="form-group ">
 <label for="Cantidad" class="control-label">Costo Final</label>
<input class="form-control prices" type="number" name="costosFinales[<?=$productId ?>]" id="CostoFinal" value="<?=$details[$key]['costofinal'] ?>" placeholder="$ Final">
</div> 
        </div>
<div class="col-md-2">
  <h5 class="headerSign" style="text-align: left;">    PROCESOS</h5>
</div>
<div class="col-md-10">
  <div class="dropdown">
<button type="button" onclick="drop(<?=$idelem ?>,<?=$productId ?>)" class="dropbtn">Agregar Proceso <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
  <div id="newproces-<?=$productId ?>-<?=$idelem ?>" class="dropdown-content">
  <?php 
  $getProcesQuery="SELECT * FROM catalogoproceso";
  $getProcessCat=mysqli_query($conexion, $getProcesQuery);
  while ($process=mysqli_fetch_assoc($getProcessCat)){
  
   ?>
    <a href="#" onclick="addProcess(<?=$idelem ?>,'<?=$process['Nombre'] ?>',<?=$process['CostoUnitario'] ?>,<?=$productId ?>)"><?=$process['Nombre'] ?></a>
    
    <?php } ?>
  </div>
</div>
</div>
<br> 
<br>  
<table id="input_fields_wrap_<?=$productId ?>_<?=$idelem ?>" class="input_fields_wrap" style="width: 98%;text-align: center;">
<tr>
<th>Titulo</th>
  <th>Catalogo</th>
  <th>Costo</th>
  <th></th>
</tr>
<?php 

  
  foreach($procesos as $key3 => $proces){
  $getProcesQuery="SELECT * FROM catalogoproceso WHERE IDCatPro=$proces";
  $getProcessCat=mysqli_query($conexion, $getProcesQuery);
   $row3=mysqli_fetch_assoc($getProcessCat);
  

  $idproces=$row3['IDCatPro'];
  $IDCatPro=$row3['IDCatPro'];
  $CostoUnitario=$row3['CostoUnitario'];
  ?>
 
  <tr>
  <td>
    <?=$row3['Nombre'] ?>
  </td>
  
  <td><select name="catalogos-<?=$idelem ?>[]">
    <option>Conchita</option>
    <option>Galleta</option>
    <option>Lazo</option>
  </select>
  </td>
  <td><?=$CostoUnitario ?>
  <input type="hidden" class="prices" value="5">
  </td>
  <td><a href="#" class="remove_field" onclick="removeProcess(<?=$idelem ?>,<?=$productId ?>)">Quitar</a></td>
 </tr>
<?php } ?> 
</table>

      
</div>
        


</div>
</div>
</div>
</div>
<br>
  <?php } } else{ ?>
  <p>Este producto no contiene elementos </p>
  <?php } ?>           
</div>
        
</div>
        </form>


</div>
</div>
</div>
</div> 
<?php } }else{ ?>  
<p>No hay productos en esta cotizacion</p>
<?php }?>
</div>

</div>
 


<div class="clearfix"></div>
</div>
</div>


</body>
</html>

<!-- Autocomplete invitaciones -->

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
 <!-- Autocomplete Cajas -->
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
 
 
  <!-- Autocomplete Papelería -->
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
 
 
   <!-- Autocomplete Recuerdos  -->
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
 
 <!-- Autocomplete Boleto -->


 
 
<script>  
 $(document).ready(function(){ 

  $('.defcheck ').click();
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
var i = 2;
 function checking(idorden,id,idprod){
        //$('#panel-'+idprod+' .indicator').show();
          $('#odete'+idorden).prop("disabled", false).val(idorden);
          $('#'+id+' .controls').css('visibility','visible');
          $('#'+id+' .price').show();
          var $checkbox = $('#'+id).find('input:checkbox');
          var $checkboxicon = $('#'+id).find('.checkicon');
        $checkbox.prop('checked', !$checkbox.prop('checked'));
        $checkboxicon.toggleClass('checkicon-on');
        var ischk=$checkbox.is(':checked')
        var len=$("#inputs-"+idorden).find('input[type=checkbox]:checked').length;

        if (len<1) {
          $('#odete'+idorden).prop("disabled", true).val('');
        }
        
        if (!ischk) {
          $('#'+id+' .price').hide();
          $('#'+id+' .controls').css('visibility','hidden');
          $('#iteration-'+id).html('1').hide();
          $('.inc-proc'+id).remove();
            $checkboxicon.removeClass('checkicon-on-green');
        $checkboxicon.removeClass('checkicon-on-yellow');
        $checkboxicon.removeClass('checkicon-on-red');
        $checkboxicon.removeClass('checkicon-on-blue');
          console.log('.inc-proc'+id);
        }
        i++;
        }

         function showTooltip(id){
          $('#'+id).toggleClass('error-div')
        }

        function lessProcess(id){
           var itr=$('#iteration-'+id).html();
           if (itr>1) {
             $('#iteration-'+id).show();
          $('#iteration-'+id).html(parseInt(itr)-1);
          $('.inc-proc'+id+':last').remove();
           }
         

        }
         function moreProcess(id,idor,proceso){
          
          var itr=$('#iteration-'+id).html();
          $('#iteration-'+id).show();
          var times=parseInt(itr)+1;
          $('#iteration-'+id).html(times);
          $('<input class="temporal inc-proc'+id+'" type=hidden name=procesos_'+idor+'[] value="'+proceso+'"/>').fadeIn('slow').appendTo('#'+id);
        /*
          $('<input class="temporal inc-proc'+id+'" type=hidden name=procesos_'+idor+'[] value="'+proceso+'-'+times+'"/>').fadeIn('slow').appendTo('#'+id);
        */
          
        }
 </script>  
 <script>


function dropElems(id) {
    document.getElementById("newelem-"+id).classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<script type="text/javascript">
  $(document).ready(function() {
    collectPrices();
    
   
});
  var x = 1; 
  var max_fields      = 1000; 
  
    

    
    function sendAllData(event){
              event.preventDefault();
                    
                        $.ajax({  
                              
                             type:"POST",
                             url:"editEstimate.php",   
                             data:$('#general-form').serialize(),  
                               
                             success:function(data){
                              
                                  $('.col-lg-12').html(data);  
                             }  
                        });
    }

  function collectPrices(){
      var sum = 0;
$('.prices').each(function(){
  var val= this.value;
  if (val==''){ val=0;}
    sum += parseFloat(val);
});
$('#total-amount').val(sum);
$('#CostoF').val(sum);



  }
  $('.prices').change(function() {
  collectPrices();
});


$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
   
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        var models=$.map($('.models'), function(el, idx) {
    return $(el).val()
})
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal,modelos:models}).done(function(data){
                
                resultDropdown.html(data);
            });
        } else{
            
            
            resultDropdown.empty();
        }
    });
    
    $(document).on("click", ".result p:not(.not-allow)", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});

function fillData(id){
  

  
     $.ajax({  
                              
                             type:"POST",
                             url:"addmodel.php",   
                             data:{idmodelo:id},  
                               
                             success:function(data){
                              
                                  $('#container').append(data);
                                  collectPrices();  
                             }  
                        });
}
function removeModel(id){
  $('#panel-group-'+id).remove();
  collectPrices();
}
function addElem(product,name,id){
   $.ajax({  
                              
                             type:"POST",
                             url:"addelem.php",   
                             data:{idelemento:id,producto:product},  
                               
                             success:function(data){
                              
                                  $('#elem-contain-'+product).append(data);
                                  collectPrices();  
                             }  
                        });
}
function removeProcess(id,product){
     
      console.log('');
        event.preventDefault();
        $('#input_fields_wrap_'+product+'_'+id).find('tr:last').remove(); x--;
        collectPrices();
    }
  function addProcess(id,sel,price,product){
    wrapper=$("#input_fields_wrap_"+product+'_'+id); 
    event.preventDefault();
        console.log(sel);
         
        
       
      /*
        var sec_options='<option disabled="true" selected="true">Elige el Proceso..</option>'+
        '<option value="36">Armado </option>'+
        '<option value="1">Caja </option>'+
        '<option value="2">Calado </option>'+
        '<option value="3">Celofan </option>'+
        '<option value="4">Corte </option>'+
        '<option value="5">Diseño </option>'+
        '<option value="6">Doblez </option>'+
        '<option value="7">Dummie </option>'+
        '<option value="8">Empalme </option>'+
        '<option value="9">Empaque </option>'+
        '<option value="0">Grabado </option>'+
        '<option value="11">Grapa </option>'+
        '<option value="12">Hot Stamping </option>'+
        '<option value="13">Idioma </option>'+
        '<option value="14">Impresion Digital </option>'+
        '<option value="15">Lacre </option>'+
        '<option value="16">Laminado </option>'+
        '<option value="17">Laton </option>'+
        '<option value="18">Liston </option>'+
        '<option value="19"> Motivo</option>'+
        '<option value="20">Offset </option>'+
        '<option value="21">Papel </option>'+
        '<option value="22">Pegado </option>'+
        '<option alue="23">Perforacion </option>'+
        '<option value="24">Preprensa </option>'+
        '<option value="25">Producto </option>'+
        '<option value="26">Rotulacion </option>'+
        '<option value="27">Sticker </option>'+
        '<option value="28">Suaje </option>'+
        '<option value="29">Tinta + Grabado </option>'+
        '<option value="30">Tinta 1 </option>'+
        '<option value="31">Tinta 2 </option>'+
        '<option value="32 ">Tinta 3 </option>'+
        '<option value="33">Tinta 4 </option>'+
        '<option value="34">Tinta 5 </option>'+
        '<option value="35">Tinta 6 </option>';
        */
        var sec_options2=
        //' <option disabled="true" selected="true">Elige el Proceso..</option>'+
                        '<option>Galleta</option>'+
                        '<option>Conchita</option>'+
                        '<option>Lazo</option>';
        var new_tr='<tr><td>'+sel+'</td>'+
                   /* '<td><select name="procesos-'+id+'[]">'+sec_options+'</select></td>'+ */
                    '<td><select  class="disabled" name="catalogos-'+id+'[]">'+sec_options2+'</select></td>'+ 
                    '<td>$'+price+'</td><input type="hidden" class="prices" value="'+price+'">'+
                    '<td><a href="#" onclick=removeProcess('+id+','+product+')>Quitar</a></td></tr>';

        

      if(x < max_fields){ 
            x++; 
            $(wrapper).append(new_tr); 
        }  
collectPrices();
    }
    function drop(id,product) {
    document.getElementById("newproces-"+product+'-'+id).classList.toggle("show");
}

</script>

<?php include("../code/conexion.php");
$cotizaId=$_POST['id-cotizacion'];

$data_query="SELECT * FROM cotizacion WHERE IDCotizacion=$cotizaId";


$getdata=mysqli_fetch_assoc(mysqli_query($conexion, $data_query));

$products_query="SELECT * FROM producto WHERE IDCotizacion=$cotizaId";
//$getprods=mysqli_fetch_assoc(mysqli_query($conexion, $products_query));
//print_r($getprods);
$getprods=mysqli_query($conexion, $products_query);

function getCheckStatus($id_elem,$id_proc){
                    require('../code/conexion.php');
                    
                    $subquery="SELECT IDCatPro FROM proceso WHERE IDElemento=$id_elem AND IDCatPro='$id_proc'";
                    $getting=mysqli_query($conexion,$subquery);
                  $getLast = mysqli_fetch_assoc($getting);
                if (isset($getLast['IDCatPro'])) {
                  echo " defcheck";
                }
                  
                

                  }
function getProcessPrice($id_elem,$id_proc){
   require('../code/conexion.php');
                    
                    $subquery="SELECT CostoFinal FROM proceso WHERE IDElemento=$id_elem AND IDCatPro='$id_proc'";
                    $getting=mysqli_query($conexion,$subquery);
                  $getLast = mysqli_fetch_assoc($getting);
                if (isset($getLast['CostoFinal'])) {
                  echo '$'.$getLast['CostoFinal'];
                  echo "<input type='hidden' value='".$getLast['CostoFinal']."' name='precios[]'>";
                }
                else{
                  $subquery2="SELECT CostoUnitario FROM catalogoproceso WHERE IDCatPro='$id_proc'";
                    $getting2=mysqli_query($conexion,$subquery2);
                  $getLast2 = mysqli_fetch_assoc($getting2);
                  echo '$'.$getLast2['CostoUnitario'];
                  echo "<input type='hidden' value='".$getLast2['CostoUnitario']."' name='precios[]'>";
                }
}
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
  width: 15%!important;
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



<div class="form-group col-xs-2">
<label for="FechaE" class="control-label">Fecha de evento</label>
<input type="text" class="form-control"  id="datepicker" name="FechaE" placeholder="">
</div>


<div class="form-group col-xs-2">
<label for="CostoF" class="control-label">Costo Final</label>
<input type="text" class="form-control" id="CostoF" name="CostoF" placeholder="">
</div>




<div class="form-group col-xs-2">
<p style="margin: 0;">&nbsp</p>

<input  type="submit" class="btn btn-success" id="Pedido" name="Pedido" value="  Enviar pedido  ">
</div>

<div class="form-group col-xs-2">
<p style="margin: 0;">&nbsp</p>

<input  type="submit" class="btn btn-info" id="Coti" onclick="$('#general-form').submit();" name="Coti" value="Guardar cotización" >
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
<div class="container col-lg-12">
<input type="hidden" name="total-amount" id="total-amount">
<?php 
  while($row4 = mysqli_fetch_array($getprods))
{  $productId=$row4['IDProducto']; ?>
<div class="panel-group">
<div class="panel panel-info">
<div class="panel-heading" id="panel-<?=$productId ?>" style="position: relative; background: #31708f!important; color:#fff">
<h4 class="panel-title">
<a data-toggle="collapse" href="#collapse<?=$productId ?>">Modelo <?=$row4['Modelo'] ?></a>
</h4>
<div class="indicator" style="display: none;"><img src="../img/save.png"></div>
</div>
<div id="collapse<?=$productId ?>" class="panel-collapse collapse">
<div class="panel-body">

<div class=" col-md-4">
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
<input class="form-control prices" type="number" name="cantidades[<?=$productId ?>]" id="Cantidad" placeholder="Cantidad" value="0">
</div>

<div class="form-group ">
<label for="Costo" class="control-label">Costo del modelo</label>
<input class="form-control prices" type="number" name="costosMod[<?=$productId ?>]" id="CostoMod" value="0" placeholder="$">
</div>
    
 <div class="form-group ">
 <label for="Cantidad" class="control-label">Costo Final</label>
<input class="form-control prices" type="number" name="costosFinales[<?=$productId ?>]" id="CostoFinal" value="0" placeholder="$ Final">
</div> 
        </div>
</div>   
<div class=" col-md-8">
<div class="form">

    
      

    


<div class="col-md-12"><h5 class="headerSign">ELEMENTOS</h5></div> 
<?php 

  $elems_query="SELECT e.*, ce.Nombre FROM elemento e INNER JOIN catalogoelemento ce ON e.IDCatElem=ce.IDCatElem WHERE IDProducto=$productId";
  $getelems=mysqli_query($conexion, $elems_query);
 while($row2 = mysqli_fetch_array($getelems)){ 
  $idelem=$row2['IDElemento'];
  ?>
  
<div class ="col-md-12 center-block">

  <br>

<div class="panel panel-info">
<div class="panel-heading" id="panel-<?=$idelem ?>" style="position: relative; ">
<h4 class="panel-title">
<a data-toggle="collapse" href="#collapse-elem-<?=$idelem ?>"><?=$row2['Nombre'] ?></a>
</h4>
<div class="indicator" style="display: none;"><img src="../img/save.png"></div>
</div>
<div id="collapse-elem-<?=$idelem ?>" class="panel-collapse collapse">
<div class="panel-body">

    
<div class="row ">
<div class="col-md-2">
  <h5 class="headerSign" style="text-align: left;">    PROCESOS</h5>
</div>
<div class="col-md-10">
  <div class="dropdown">
<button type="button" onclick="drop(<?=$idelem ?>)" class="dropbtn">Agregar Proceso <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
  <div id="newproces-<?=$idelem ?>" class="dropdown-content">
  <?php 
  $getProcesQuery="SELECT * FROM catalogoproceso";
  $getProcessCat=mysqli_query($conexion, $getProcesQuery);
  while ($process=mysqli_fetch_assoc($getProcessCat)){
  
   ?>
    <a href="#" onclick="addProcess(<?=$idelem ?>,'<?=$process['Nombre'] ?>',<?=$process['CostoUnitario'] ?>)"><?=$process['Nombre'] ?></a>
    
    <?php } ?>
  </div>
</div>
</div>
<br> 
<br>  
<table id="input_fields_wrap_<?=$idelem ?>" class="input_fields_wrap" style="width: 98%;text-align: center;">
<tr>
<th>Titulo</th>

  <th>Proceso Ventas</th>
  <th>Proceso</th>
  <th>Costo</th>
  <th></th>
</tr>
<?php 

  $proces_query="SELECT p.*,cp.Nombre FROM proceso p INNER JOIN catalogoproceso cp ON p.IDCatPro=cp.IDCatPro WHERE IDElemento=$idelem";
  $getproces=mysqli_query($conexion, $proces_query);
 while($row3 = mysqli_fetch_array($getproces)){ 
  $idproces=$row3['IDCatPro'];
  $IDCatPro=$row3['IDCatPro'];
  ?>
 
  <tr>
  <td>
    <?=$row3['Nombre'] ?>
  </td>
  <td><select name="procesos-<?=$idelem ?>[]" value="<?= $idproces ?>">
  <option value="36" <?=($idproces==36)? 'selected' :'';?> >Armado </option>
        <option value="1" <?=($idproces==1)? 'selected' :'';?> >Caja </option>
        <option value="2" <?=($idproces==2)? 'selected' :'';?>>Calado </option>
        <option value="3" <?=($idproces==3)? 'selected' :'';?>>Celofan </option>
        <option value="4" <?=($idproces==4)? 'selected' :'';?>>Corte </option>
        <option value="5" <?=($idproces==5)? 'selected' :'';?>>Diseño </option>
        <option value="6" <?=($idproces==6)? 'selected' :'';?>>Doblez </option>
        <option value="7" <?=($idproces==7)? 'selected' :'';?>>Dummie </option>
        <option value="8" <?=($idproces==8)? 'selected' :'';?>>Empalme </option>
        <option value="9" <?=($idproces==9)? 'selected' :'';?>>Empaque </option>
        <option value="0" <?=($idproces==0)? 'selected' :'';?>>Grabado </option>
        <option value="11" <?=($idproces==11)? 'selected' :'';?>>Grapa </option>
        <option value="12" <?=($idproces==12)? 'selected' :'';?>>Hot Stamping </option>
        <option value="13" <?=($idproces==13)? 'selected' :'';?>>Idioma </option>
        <option value="14" <?=($idproces==14)? 'selected' :'';?>>Impresion Digital </option>
        <option value="15" <?=($idproces==15)? 'selected' :'';?>>Lacre </option>
        <option value="16" <?=($idproces==16)? 'selected' :'';?>>Laminado </option>
        <option value="17" <?=($idproces==17)? 'selected' :'';?>>Laton </option>
        <option value="18" <?=($idproces==18)? 'selected' :'';?>>Liston </option>
        <option value="19" <?=($idproces==19)? 'selected' :'';?> >Motivo</option>
        <option value="20" <?=($idproces==20)? 'selected' :'';?>>Offset </option>
        <option value="21" <?=($idproces==21)? 'selected' :'';?>>Papel </option>
        <option value="22" <?=($idproces==22)? 'selected' :'';?>>Pegado </option>
        <option value="23" <?=($idproces==23)? 'selected' :'';?>>Perforacion </option>
        <option value="24" <?=($idproces==24)? 'selected' :'';?>>Preprensa </option>
        <option value="25" <?=($idproces==25)? 'selected' :'';?>>Producto </option>
        <option value="26" <?=($idproces==26)? 'selected' :'';?>>Rotulacion </option>
        <option value="27" <?=($idproces==27)? 'selected' :'';?>>Sticker </option>
        <option value="28" <?=($idproces==28)? 'selected' :'';?>>Suaje </option>
        <option value="29" <?=($idproces==29)? 'selected' :'';?>>Tinta + Grabado </option>
        <option value="30" <?=($idproces==30)? 'selected' :'';?>>Tinta 1 </option>
        <option value="31" <?=($idproces==31)? 'selected' :'';?>>Tinta 2 </option>
        <option value="32 " <?=($idproces==32 )? 'selected' :'';?>>Tinta 3 </option>
        <option value="33" <?=($idproces==33)? 'selected' :'';?>>Tinta 4 </option>
        <option value="34" <?=($idproces==34)? 'selected' :'';?>>Tinta 5 </option>
        <option value="35" <?=($idproces==35)? 'selected' :'';?>>Tinta 6 </option>
  </select>
  </td>
  <td><select>
    <option>Labrador</option>
    <option>Ratonero</option>
    <option>Chilaquil</option>
  </select>
  </td>
  <td>$5
  <input type="hidden" class="prices" value="5">
  </td>
  <td><a href="#" class="remove_field" onclick="removeProcess(<?=$idelem ?>)">Quitar</a></td>
 </tr>
<?php } ?> 
</table>

      
</div>
        


</div>
</div>
</div>
</div>
<br>
  <?php } ?>           
</div>
        
</div>
        </form>


</div>
</div>
</div>
</div> 
<?php } ?>  

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

function drop(id) {
    document.getElementById("newproces-"+id).classList.toggle("show");
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
  
    
  function addProcess(id,sel,price){
    wrapper=$("#input_fields_wrap_"+id); 
    event.preventDefault();
        console.log(sel);
         
        
       
    
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
        var sec_options2=' <option disabled="true" selected="true">Elige el Proceso..</option>'+
                        '<option>Maria Luisa</option>'+
                        '<option>Marial Luisa 2</option>'+
                        '<option>Maria Luisa 3</option>'+
                        '<option>Esquela Sencilla</option>'+
                        '<option>Esquela Sencilla</option>'+
                        '<option>Esquela Doble</option>'+
                        '<option>Esquela Doble</option>'+
                        '<option>Esquela Triptico</option>'+
                        '<option>Esquela Triple</option>'+
                        '<option>Esquela Interior</option>'+
                        '<option>Esquela Interior</option>'+
                        '<option>Esquela Exterior</option>'+
                        '<option>Forro</option>'+
                        '<option>Hoja Interior 1</option>'+
                        '<option>Hoja Interior 2</option>'+
                        '<option>Hoja Interior 3</option>'+
                        '<option>Cintilla</option>'+
                        '<option>Cinturon</option>';
        var new_tr='<tr><td>'+sel+'</td>'+
                    '<td><select name="procesos-'+id+'[]">'+sec_options+'</select></td>'+
                    '<td><select disabled class="disabled" name="procesos['+id+']">'+sec_options2+'</select></td>'+
                    '<td>$'+price+'</td><input type="hidden" class="prices" value="'+price+'">'+
                    '<td><a href="#" onclick=removeProcess('+id+')>Quitar</a></td></tr>';

        

      if(x < max_fields){ 
            x++; 
            $(wrapper).append(new_tr); 
        }  
collectPrices();
    }
    function removeProcess(id){
     
      console.log('');
        event.preventDefault();
        $('#input_fields_wrap_'+id).find('tr:last').remove(); x--;
        collectPrices();
    }
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
    sum += parseFloat(this.value);
});
$('#total-amount').val(sum);
$('#CostoF').val(sum);



  }
  $('.prices').keyup(function() {
  collectPrices();
});

</script>
 
  
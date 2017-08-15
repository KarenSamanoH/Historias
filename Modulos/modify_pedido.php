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
  width: 25%!important;
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
   <div class="form-group col-xs-4"></div> 
<div class="form-group col-xs-4">
<label for="Pedido" class="control-label hidden">boton</label>
<input  type="submit" class="btn btn-info" id="Coti" name="Coti" value="Guardar cotización" >
</div>

</div>
</div>
</div>
</div>
<br>
<div class="container">
	<div class="tab-content" align="center">
<div class="tab-pane active col-xs-12" role="tabpanel" id="invitacion">


<div class="container col-lg-12">
<?php 
  while($row4 = mysqli_fetch_array($getprods))
{  $productId=$row4['IDProducto']; ?>
<div class="panel-group">
<div class="panel panel-info">
<div class="panel-heading" id="panel-<?=$productId ?>" style="position: relative;">
<h4 class="panel-title">
<a data-toggle="collapse" href="#collapse<?=$productId ?>">Modelo <?=$row4['Modelo'] ?></a>
</h4>
<div class="indicator" style="display: none;"><img src="../img/save.png"></div>
</div>
<div id="collapse<?=$productId ?>" class="panel-collapse collapse">
<div class="panel-body">

    <form id="<?=$productId ?>" name="<?=$productId ?>">
<div class="row col-md-8 col-md-offset-2">
<div class="form">

    
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
    


<div class="col-md-12"><h5 class="headerSign">ELEMENTOS</h5></div> 
<?php 

  $elems_query="SELECT e.*, ce.Nombre FROM elemento e INNER JOIN catalogoelemento ce ON e.IDCatElem=ce.IDCatElem WHERE IDProducto=$productId";
  $getelems=mysqli_query($conexion, $elems_query);
 while($row2 = mysqli_fetch_array($getelems)){ 
  $idelem=$row2['IDElemento'];
  ?>
  
<div class ="col-md-12 center-block">
<div class="line"><div class="separator">
  <?=$row2['Nombre'] ?></div>
  </div>
  <br>
<div id="Suaje-<?=$idelem ?>" class="checgroup">
         <div class="checkicon     defcheck" onclick="checking(<?=$idelem ?>,'Suaje-<?=$idelem ?>',<?=$productId ?>);">
          <input type="checkbox" class="chk" value="Suaje" name="procesos_<?=$idelem ?>[]">
         </div>
         <div class="checktext">Suaje</div>
<div id="iteration-Suaje-<?=$idelem ?>" class="iteration" style="display: none">1</div>          <div class="controls" style=" visibility: hidden;">
                  <div class="less" onclick="lessProcess('Suaje-<?=$idelem ?>')"></div>
         <div class="more" onclick="moreProcess('Suaje-<?=$idelem ?>','<?=$idelem ?>','Suaje')"></div>
       </div>
</div>
<div id="Serigrafia-<?=$idelem ?>" class="checgroup">
         <div class="checkicon     defcheck" onclick="checking(<?=$idelem ?>,'Serigrafia-<?=$idelem ?>',<?=$productId ?>);">
          <input type="checkbox" class="chk" value="Serigrafia" name="procesos_<?=$idelem ?>[]">
         </div>
         <div class="checktext">Serigrafia</div>
<div id="iteration-Serigrafia-<?=$idelem ?>" class="iteration" style="display: none">1</div>          <div class="controls" style=" visibility: hidden;">
                  <div class="less" onclick="lessProcess('Serigrafia-<?=$idelem ?>')"></div>
         <div class="more" onclick="moreProcess('Serigrafia-<?=$idelem ?>','<?=$idelem ?>','Serigrafia')"></div>
       </div>
</div>
<div id="Offset-<?=$idelem ?>" class="checgroup">
         <div class="checkicon     defcheck" onclick="checking(<?=$idelem ?>,'Offset-<?=$idelem ?>',<?=$productId ?>);">
          <input type="checkbox" class="chk" value="Offset" name="procesos_<?=$idelem ?>[]">
         </div>
         <div class="checktext">Offset</div>
<div id="iteration-Offset-<?=$idelem ?>" class="iteration" style="display: none">1</div>          <div class="controls" style=" visibility: hidden;">
                  <div class="less" onclick="lessProcess('Offset-<?=$idelem ?>')"></div>
         <div class="more" onclick="moreProcess('Offset-<?=$idelem ?>','<?=$idelem ?>','Offset')"></div>
       </div>
</div>
<div id="Digital-<?=$idelem ?>" class="checgroup">
         <div class="checkicon     defcheck" onclick="checking(<?=$idelem ?>,'Digital-<?=$idelem ?>',<?=$productId ?>);">
          <input type="checkbox" class="chk" value="Digital" name="procesos_<?=$idelem ?>[]">
         </div>
         <div class="checktext">Digital</div>
<div id="iteration-Digital-<?=$idelem ?>" class="iteration" style="display: none">1</div>          <div class="controls" style=" visibility: hidden;">
                  <div class="less" onclick="lessProcess('Digital-<?=$idelem ?>')"></div>
         <div class="more" onclick="moreProcess('Digital-<?=$idelem ?>','<?=$idelem ?>','Digital')"></div>
       </div>
</div>
<div id="LetterPress-<?=$idelem ?>" class="checgroup">
         <div class="checkicon     defcheck" onclick="checking(<?=$idelem ?>,'LetterPress-<?=$idelem ?>',<?=$productId ?>);">
          <input type="checkbox" class="chk" value="LetterPress" name="procesos_<?=$idelem ?>[]">
         </div>
         <div class="checktext">LetterPress</div>
<div id="iteration-LetterPress-<?=$idelem ?>" class="iteration" style="display: none">1</div>          <div class="controls" style=" visibility: hidden;">
                  <div class="less" onclick="lessProcess('LetterPress-<?=$idelem ?>')"></div>
         <div class="more" onclick="moreProcess('LetterPress-<?=$idelem ?>','<?=$idelem ?>','LetterPress')"></div>
       </div>
</div>
<div id="Encuadernado-<?=$idelem ?>" class="checgroup">
         <div class="checkicon     defcheck" onclick="checking(<?=$idelem ?>,'Encuadernado-<?=$idelem ?>',<?=$productId ?>);">
          <input type="checkbox" class="chk" value="Encuadernado" name="procesos_<?=$idelem ?>[]">
         </div>
         <div class="checktext">Encuadernado</div>
<div id="iteration-Encuadernado-<?=$idelem ?>" class="iteration" style="display: none">1</div>          <div class="controls" style=" visibility: hidden;">
                  <div class="less" onclick="lessProcess('Encuadernado-<?=$idelem ?>')"></div>
         <div class="more" onclick="moreProcess('Encuadernado-<?=$idelem ?>','<?=$idelem ?>','Encuadernado')"></div>
       </div>
</div>
<div id="Acabado-<?=$idelem ?>" class="checgroup">
         <div class="checkicon     defcheck" onclick="checking(<?=$idelem ?>,'Acabado-<?=$idelem ?>',<?=$productId ?>);">
          <input type="checkbox" class="chk" value="Acabado" name="procesos_<?=$idelem ?>[]">
         </div>
         <div class="checktext">Acabado</div>
<div id="iteration-Acabado-<?=$idelem ?>" class="iteration" style="display: none">1</div>          <div class="controls" style=" visibility: hidden;">
                  <div class="less" onclick="lessProcess('Acabado-<?=$idelem ?>')"></div>
         <div class="more" onclick="moreProcess('Acabado-<?=$idelem ?>','<?=$idelem ?>','Acabado')"></div>
       </div>
</div>
</div>
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
        $('#panel-'+idprod+' .indicator').show();
          $('#odete'+idorden).prop("disabled", false).val(idorden);
          $('#'+id+' .controls').css('visibility','visible');
          var $checkbox = $('#'+id).find('input:checkbox');
          var $checkboxicon = $('#'+id).find('div:first');
        $checkbox.prop('checked', !$checkbox.prop('checked'));
        $checkboxicon.toggleClass('checkicon-on');
        var ischk=$checkbox.is(':checked')
        var len=$("#inputs-"+idorden).find('input[type=checkbox]:checked').length;

        if (len<1) {
          $('#odete'+idorden).prop("disabled", true).val('');
        }
        
        if (!ischk) {
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
 
  
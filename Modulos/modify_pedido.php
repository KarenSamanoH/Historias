<?php include("../code/conexion.php");
$cotizaId=$_POST['id-cotizacion'];
$client=$_POST['client'];
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="../css/botones.css" rel="stylesheet" type="text/css"/>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="../css/historias.css" rel="stylesheet" type="text/css"/>
<link href="../css/modify.css" rel="stylesheet" type="text/css"/>
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>

<!-- Custom Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<!-- JS--> 
<style type="text/css">
  
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
<a class="page-scroll" data-toggle="modal" data-target="#ayuda" >Ayuda
<i class="fa fa-question-circle fa-spin fa-1x fa-fw" aria-hidden="true"></i>
</a>
</li>
<li>
<a class="page-scroll" href="../code/logout.php">Salir<span class="glyphicon glyphicon-log-out"></span></a>
</li>
</ul>
</div>

</div>

  <div class="box" style="border-color: white" align="right">

<!-- Modal -->
<div id="ayuda" class="modal fade" role="dialog">
  <div class="modal-dialog" align="center">

    <!-- Ayuda-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title ">¿En qué te puedo ayudar?</h4>
      </div>
      <div class="modal-body">
      <!-----Contenido del modal---->

  <div class="row">
      <div id="accordion" class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">
              <a href="#panel-1" data-parent="#accordion" data-toggle="collapse">¿Cómo agregar elementos?</a>
            </h2>
          </div>
          <div class="panel-collapse collapse" id="panel-1">
            <div class="panel-body">
<iframe width="560" height="315" src="https://www.youtube.com/embed/C7Rd_fbyX8o" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

</div>   


</nav>



<div class="col-xs-12 col-sm-12 ">
<div class="panel panel-default">
<div class="panel-heading resume-heading">
<div class="row">
<div class="col-lg-12">


<div class="col-xs-12 col-sm-12">



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

<div class="form-group col-xs-3">
<p style="margin: 0;">&nbsp</p>

<input  type="submit" class="btn btn-info" id="Coti" onclick="$('#general-form').submit();" name="Coti" value="Guardar cotización" >
</div>
<div class="form-group col-xs-3">
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
<h4 id="message" style="display: none;color: red;">Debes agregar al menos un producto</h4>
 <form id="general-form" method="post" onsubmit="sendAllData(event,<?=$client ?>);">
<div class="col-lg-12" id="container">
<input type="hidden" name="total-amount" id="total-amount">
<input type="hidden" name="id-cotiza"  value="<?=$cotizaId ?>">
<?php
if ($getdata['detalles']!='') {
  
$data= json_decode($getdata['detalles'],TRUE);
$details=($data!='')? $data : array();
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
</div><div class="model-details soft">
DESCUENTO: <?= $details[$key]['descuento']*100 ?>%
<input type="hidden" id="descu" name="descu" value="<?= $details[$key]['descuento'] ?>">
</div><div class="model-details soft">
CANTIDAD: <?= $details[$key]['cantidad'] ?>
<input type="hidden" id="cant" name="cant" value="<?=$details[$key]['cantidad'] ?>">
</div><div class="model-details soft">
  PRECIO: <?=$details[$key]['costofinal'] ?>
</div></a><div class="model-details">
  &nbsp <img src="../img/tf.png" onclick="removeModel(<?=$productId ?>)" title="Quitar este modelo" >
</div>
<input type="hidden" class="models" name="models[]" value="<?=$productId ?>">
<div class="indicator" style="display: none;"><img src="../img/save.png"></div>
</div>
<div id="collapse<?=$productId ?>" class="panel-collapse collapse">
<div class="panel-body panel-body-parent">

<div class=" col-md-4">
<img src="../img/default.jpg">
</div>   
<div class=" col-md-8" >


    
      

    



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
<div class="col-lg-12" id="elem-contain-<?=$productId ?>">
<?php 
  $elements=(isset($product['contenido']))? $product['contenido'] : array();
  if ($elements!='') {
    
  foreach ($elements as $key2 => $element) 
 { 
  
  $elem_query="SELECT* FROM catalogoelemento WHERE IDCatElem=$key2";
  $getelem=mysqli_query($conexion, $elem_query);
  $row2=mysqli_fetch_assoc($getelem);
  $idelem=$row2['IDCatElem'];
  $procesos=$element['procesos'];
  $datos=$element['datos'];
  ?>
  
<div class ="col-md-12 center-block" id="elem-<?=$productId ?>-<?=$idelem ?>">
 <input type="hidden" id="costo-ajuste-<?=$productId ?>-<?=$idelem; ?>" name="costo-ajuste-<?=$productId ?>[<?=$idelem; ?>]" value="<?=$datos['ajuste'] ?>">
 <input type="hidden" id="price-<?=$productId ?>-<?=$idelem; ?>" class="prices">
  <br>

<div class="panel panel-info">

<div class="panel-heading panel-elem" id="panel-<?=$idelem ?>" style="position: relative; background: #d9edf7;">
<a data-toggle="collapse" href="#collapse-elem-<?=$productId ?>-<?=$idelem ?>">
<h4 class="panel-title">
<?=$row2['Nombre'] ?>
</h4></a>
<div class="indicator" style=""><img src="../img/t.png" onclick="removeElement(<?=$idelem ?>,<?=$productId ?>)" title="Quitar este elemento"></div>
</div>
<div id="collapse-elem-<?=$productId ?>-<?=$idelem ?>" class="panel-collapse collapse">
<div class="panel-body">
<input type="hidden" name="elements-<?=$productId ?>[<?=$idelem; ?>]" value="<?=$idelem; ?>">
    
<div class="row ">
<div class="col-md-12"><h5 class="headerSign">Caracteristicas</h5></div> 
  <div class="col-md-6">



<div class="form-group">
<label for="Material" class="control-label">Material</label>
<select name="material-<?=$productId ?>-<?=$idelem; ?>" id="Nombre1" class="form-control" placeholder='Material' value="<?=$datos['material'] ?>" >
<?php echo $output; ?>
</select>
</div>
    


<div class="form-group">
 <label for="Alto" class="control-label">Alto</label>
<input class="form-control" type="number" name="alto-<?=$productId ?>-<?=$idelem; ?>" id="Alto" placeholder="Alto" value="<?=$datos['alto'] ?>" >
</div>

<div class="form-group">
<label for="Ancho" class="control-label">Ancho</label>
<input class="form-control" type="number" name="ancho-<?=$productId ?>-<?=$idelem; ?>" id="Ancho" placeholder="Ancho" value="<?=$datos['ancho'] ?>" >
</div>
    
</div>

    <div class="col-md-6"> 
        
        
       <div class="form-group">
           <label for="Cantidad" class="control-label">Cantidad</label>
<input class="form-control  Cantidad" type="number" name="cantidad-<?=$productId ?>-<?=$idelem; ?>" id="cantidad-<?=$productId ?>-<?=$idelem; ?>" placeholder="Cantidad" value="<?=$datos['cantidad'] ?>" onchange="calcByElement(<?=$productId ?>,<?=$idelem; ?>)">
</div>

<div class="form-group ">
<label for="Costo" class="control-label">Costo del papel</label>
<input class="form-control " type="number" name="papel-<?=$productId ?>-<?=$idelem; ?>" id="papel-<?=$productId ?>-<?=$idelem; ?>" value="<?=$datos['papel'] ?>"  placeholder="$">
</div>
   
 <div class="form-group ">
 <label for="Cantidad" class="control-label">Costo Final de Elemento</label>
<input class="form-control costo-elemento prices" type="number" name="costoFinal-<?=$productId ?>-<?=$idelem; ?>" id="costoFinal-<?=$productId ?>-<?=$idelem; ?>" value="<?=$datos['costoFinal'] ?>"  placeholder="$ Final" readonly>
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
    <a href="#" onclick="addProcess(<?=$idelem ?>,'<?=$process['Nombre'] ?>',<?=$process['CostoUnitario'] ?>,<?=$productId ?>,<?=$process['IDCatPro'] ?>,<?=$process['CostoCiento'] ?>,
<?=$process['CostoMillar'] ?>,<?=$process['CostoUnico'] ?>)"><?=$process['Nombre'] ?></a>
    
    <?php } ?>
  </div>
</div>
</div>
  
<table id="input_fields_wrap_<?=$productId ?>_<?=$idelem ?>" class="input_fields_wrap" style="width: 98%;text-align: center;">
<tr>
<th>Titulo</th>
  <th>Catalogo</th>
  <th>Costo</th>
  <th></th>
</tr>
<?php 

 if ($element['procesos']!='') {
   
  foreach($procesos as $key3 => $proces){

  $getProcesQuery="SELECT * FROM catalogoproceso WHERE IDCatPro=$proces";
  $getProcessCat=mysqli_query($conexion, $getProcesQuery);
   $row3=mysqli_fetch_assoc($getProcessCat);
  

  $idproces=$row3['IDCatPro'];
  $IDCatPro=$row3['IDCatPro'];
  $CostoUnitario=$row3['CostoUnitario'];
  ?>

  <tr id="proceso-<?=$productId ?>-<?=$idelem ?>-<?=$idproces ?>">
  <input type="hidden" name="procesos-<?=$productId ?>-<?=$idelem ?>[]" value="<?=$idproces ?>">
  <td>
    <?=$row3['Nombre'] ?>
  </td>
  
  <td><select name="catalogos-<?=$productId ?>-<?=$idelem ?>[]">
    <option>Conchita</option>
    <option>Galleta</option>
    <option>Lazo</option>
  </select>
  </td>
  <td>$<?=$CostoUnitario ?>
  <input type="hidden" class=" proces-<?=$productId ?>-<?=$idelem ?>" value="<?=$CostoUnitario ?>">
  <input type="hidden" class=" ciento-<?=$productId ?>-<?=$idelem ?>" value="<?=$row3['CostoCiento'] ?>">
  <input type="hidden" class=" millar-<?=$productId ?>-<?=$idelem ?>" value="<?=$row3['CostoMillar'] ?>">
  <input type="hidden" class=" unico-<?=$productId ?>-<?=$idelem ?>" value="<?=$row3['CostoUnico'] ?>">
  </td>
  <td><a href="#" class="remove_field" onclick="removeProcess(<?=$idelem ?>,<?=$productId ?>,<?=$idproces ?>)">Quitar</a></td>
 </tr>
<?php } }?> 
</table>

      
</div>
        


</div>
</div>
</div>
</div>

  <?php } } else{ ?>
  <p>Este producto no contiene elementos </p>
  <?php } ?> 
  </div>          

        
</div>
        


</div>
</div>
</div>
</div> 
<?php } }else{ ?>  
<p>No hay productos en esta cotizacion</p>
<?php }?>
     </div>
</form>
    
        </div>
    </div>
    
</div>
 


<div class="clearfix"></div>
</div>
</div>
 
<div class="success-modal">
  <div class="saveloader">
  
    <img src="../img/loader.gif">
    <p style="text-align: center; font-weight: bold;">Guardando..</p>
  </div>
  <div class="savesucces" style="display: none;">
  
    <img src="../img/success.png">
    <p style="text-align: center; font-weight: bold;">Listo!</p>
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
  
    

    
    function sendAllData(event,id){
      event.preventDefault();
        var valueArray = $('.models').map(function() {
    return this.value;
}).get();
      console.log(valueArray);
      if (valueArray=='') {
        $('#message').show();
        setTimeout(function(){ $('#message').hide(); }, 2000);
      }else{
        
                    showLoad();
                        $.ajax({  
                              
                             type:"POST",
                             url:"editEstimate.php",   
                             data:$('#general-form').serialize(),  
                               
                             success:function(data){
                              
                              //$('.tab-content').html(data);
                              

                               $('.saveloader').hide();
                             $('.savesucces').show();
                                
                               
                               setTimeout(function(){ location.href='Clientes.php?cotizacion='+id; }, 1000);
                                 
                               
                             }  
                        });
      }
              
    }

  function collectPrices(){
      var sum = 0;
$('.costo-elemento').each(function(){
  var val= this.value;
  if (val==''){ val=0;}
    sum += parseFloat(val);
});
var desc=$('#descu').val();
var conD = sum * parseFloat(desc);
var ConIva = (sum - conD) * 0.16;
 
var general=conD + ConIva;



$('#total-amount').val(general.toFixed(2));
$('#CostoF').val(general.toFixed(2));
console.log('collect prices');

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
        $(this).parents(".search-box").find('input[type="text"]').val('');
        $(this).parent(".result").empty();

    });
    
});

function fillData(id){
  

  var cant=$('#cant').val();
     $.ajax({  
                              
                             type:"POST",
                             url:"addmodel.php",   
                             data:{idmodelo:id,qty:cant},  
                               
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
  event.preventDefault();
   var cant=$('#cant').val();
   $.ajax({  
                              
                             type:"POST",
                             url:"addelem.php",   
                             data:{idelemento:id,producto:product,qty:cant},  
                               
                             success:function(data){
                              
                                  $('#elem-contain-'+product).append(data);
                                  collectPrices();  
                             }  
                        });
}
function removeProcess(id,product,proces){
     
      console.log('');
        event.preventDefault();
        //$('#input_fields_wrap_'+product+'_'+id).find('tr:last').remove(); x--;
        $('#proceso-'+product+'-'+id+'-'+proces).remove();
        collectPrices();
         calcByElement(product,id);
    }
  function addProcess(id,sel,price,product,idpro,ciento,millar,unico){
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
        var new_tr='<tr id="proceso-'+product+'-'+id+'-'+idpro+'"><td>'+sel+'</td>'+
    
        '<input type="hidden" name="procesos-'+product+'-'+id+'[]" value="'+idpro+'">'+
        '<input type="hidden" class="proces-'+product+'-'+id+'" value="'+idpro+'">'+
        '<input type="hidden" class="ciento-'+product+'-'+id+'" value="'+ciento+'">'+
        '<input type="hidden" class="millar-'+product+'-'+id+'" value="'+millar+'">'+
        '<input type="hidden" class="unico-'+product+'-'+id+'" value="'+unico+'">'+
                   /* '<td><select name="procesos-'+id+'[]">'+sec_options+'</select></td>'+ */
                    '<td><select  class="disabled" name="catalogos-'+product+'-'+id+'[]">'+sec_options2+'</select></td>'+ 
                    '<td>$'+price+'</td><input type="hidden" class="" value="'+price+'">'+
                    '<td><a href="#" onclick=removeProcess('+id+','+product+','+idpro+')>Quitar</a></td></tr>';

        

      if(x < max_fields){ 
            x++; 
            $(wrapper).append(new_tr); 
            calcByElement(product,id);
        }  
        
        collectPrices();

    }
    function drop(id,product) {
    document.getElementById("newproces-"+product+'-'+id).classList.toggle("show");
}
function removeElement(id,product){
     
      console.log('');
        event.preventDefault();
        $('#elem-'+product+'-'+id).remove();
        collectPrices();
    }

    function close_box()
      {
        $('.backdrop, .success-modal').animate({'opacity':'0'}, 300, 'linear', function(){
          $('.backdrop, .success-modal').css('display', 'none');
        });success-modal
      }
  function showLoad(){
        $('.backdrop, .success-modal').animate({'opacity':'.50'}, 300, 'linear');
          $('.success-modal').animate({'opacity':'1.00'}, 300, 'linear');
          $('.backdrop, .success-modal').css('display', 'block');
      }

      function calcByElement(product,element){
       
        var Descuento =  10;
        var IVA =  0.16;
        var costofinal = $('#costoFinal-'+product+'-'+element).val();
        var Cantidad = $('#cantidad-'+product+'-'+element).val();
        
       
        var papel =  $('#papel-'+product+'-'+element).val();
        var CAjuste = $('#costo-ajuste-'+product+'-'+element).val();
        var final=0;
       

        if (Descuento=='') {Descuento=0;}
        if (IVA=='') {IVA=0;}
        if (costofinal=='') {costofinal=0;}
        if (Cantidad=='') {Cantidad=0;}
       
        if (papel=='') {papel=0;}
        if (CAjuste=='') {CAjuste=0;}



        var costounitario = 0;
        $('.proces-'+product+'-'+element).each(function(){
          var val= this.value;
          if (val==''){ val=0;}
            costounitario += parseFloat(val);
        });
         var CostoCiento = 0;
        $('.ciento-'+product+'-'+element).each(function(){
          var val= this.value;
          if (val==''){ val=0;}
            CostoCiento += parseFloat(val);
        });
         var CostoMillar = 0;
        $('.millar-'+product+'-'+element).each(function(){
          var val= this.value;
          if (val==''){ val=0;}
            CostoMillar += parseFloat(val);
        });
        var CostoUnico = 0;
        $('.millar-'+product+'-'+element).each(function(){
          var val= this.value;
          if (val==''){ val=0;}
            CostoUnico += parseFloat(val);
        });
         var Costos = parseFloat(CostoMillar) + parseFloat(CostoCiento)  + parseFloat(CostoUnico);


        if (Cantidad >= 0 && Cantidad <= 100)

          { var total = parseFloat(CostoUnico) + parseFloat(CostoCiento) + parseFloat(CostoMillar) + (parseFloat(Cantidad)-100) * (parseFloat(CostoCiento)/100) + parseFloat(Cantidad) * parseFloat(costounitario) + parseFloat(papel);
            var CCA = parseFloat(Cantidad);

            var CanCos = parseFloat(Cantidad) * parseFloat(costounitario);
            var final = Costos + CCA + CanCos + parseFloat(papel) + .58;
           
           /*
            console.log('costo unico: '+CostoUnico);
             console.log('costo ciento: '+CostoCiento);
              console.log('costo millar: '+CostoMillar);
               console.log('costo unitario: '+costounitario);
                console.log('total total: '+total);
                console.log('costo CanCos: '+CanCos);
                console.log('costo final: '+final);
                console.log('Costos: '+Costos);
                console.log('CCA: '+CCA);
                console.log('costo papel: '+papel);
          */
          
            console.log('#costoFinal-'+product+'-'+element);
           $('#costoFinal-'+product+'-'+element).attr('value', final.toFixed(2));
           collectPrices();
          }

          else if (Cantidad >= 101 && Cantidad <= 999)
          {
            var final = parseFloat(CostoUnico) + parseFloat(CostoCiento) + parseFloat(CostoMillar) + (parseFloat(Cantidad)-100) * (parseFloat(CostoCiento)/100) + parseFloat(Cantidad) * parseFloat(costounitario) + parseFloat(papel); 
                    
                  $('#costoFinal-'+product+'-'+element).attr('value', final.toFixed(2));
            console.log('costo unico: '+CostoUnico);
             console.log('costo ciento: '+CostoCiento);
              console.log('costo millar: '+CostoMillar);
               console.log('costo unitario: '+costounitario);
                console.log('total total: '+total);
                console.log('costo CanCos: '+CanCos);
                console.log('costo final: '+final);
                console.log('Costos: '+Costos);
                console.log('CCA: '+CCA);
                console.log('costo papel: '+papel);
             collectPrices();
                }
      else if (Cantidad >= 1000 && Cantidad <= 20000){


              var final = parseFloat(CostoUnico) + parseFloat(CostoCiento) + parseFloat(CostoMillar) + ((parseFloat(Cantidad)-1000) * (parseFloat(CostoMillar)/1000)) + ((parseFloat(Cantidad)-100) * (parseFloat(CostoCiento)/100)) + (parseFloat(Cantidad) * parseFloat(costounitario)) + parseFloat(papel) + .58;
            


            $('#costoFinal-'+product+'-'+element).attr('value', final.toFixed(2));
           collectPrices();
}



      //$('#est-final').val(general.toFixed(2));

      }

</script>

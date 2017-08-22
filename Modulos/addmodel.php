<?php

include("../code/conexion.php");
    $idprod=$_POST['idmodelo'];


    $getelemquery="SELECT id_elemento_linea,IDCatElem FROM elementos_linea WHERE IDLinea=$idprod";
    $getelems=mysqli_query($conexion, $getelemquery);
    //print_r($getelems);
    
    while ($r=mysqli_fetch_assoc($getelems)) {
        $row[$r['id_elemento_linea']]=$r;
    }


foreach ($row as $key => $ro1) {
    
    $elements[]=$ro1['IDCatElem'];

        
        
        $id_elem=$ro1['id_elemento_linea'];
        
    $getprocsquery="SELECT IDCatPro FROM procesoslinea WHERE id_elemento_linea=$id_elem";
    $getprocs=mysqli_query($conexion, $getprocsquery);
    
    while ($row2=mysqli_fetch_assoc($getprocs)) {
        $processes[$ro1['IDCatElem']]['procesos'][]=$row2['IDCatPro'];

    }
    
}


$details=array($idprod =>array( 'contenido'=>$processes,'cantidad'=>8, 'descuento'=>8,'costofinal'=>8, 'papel'=>8) );


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
DESCUENTO: 
</div><div class="model-details soft">
CANTIDAD: <?= $details[$key]['cantidad'] ?>
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
<img src="../img/22.jpg">
</div>   
<div class=" col-md-8">
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
<div class="container col-lg-12" id="elem-contain-<?=$productId ?>">
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
  
<div class ="col-md-12 center-block" id="elem-<?=$productId ?>-<?=$idelem ?>">

  <br>

<div class="panel panel-info">

<div class="panel-heading panel-elem" id="panel-<?=$idelem ?>" style="position: relative; background: #d9edf7;"><a data-toggle="collapse" href="#collapse-elem-<?=$productId ?>-<?=$idelem ?>">
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
    <a href="#" onclick="addProcess(<?=$idelem ?>,'<?=$process['Nombre'] ?>',<?=$process['CostoUnitario'] ?>,<?=$productId ?>,<?=$process['IDCatPro'] ?>)"><?=$process['Nombre'] ?></a>
    
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
   <input type="hidden" name="procesos-<?=$productId ?>-<?=$idelem ?>[]" value="<?=$idproces ?>">
  <td><select name="catalogos-<?=$productId ?>-<?=$idelem ?>[]">
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
        
</div>
        </form>


</div>
</div>
</div>
</div> 
<?php }  ?>
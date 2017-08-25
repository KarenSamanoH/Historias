<?php

include("../code/conexion.php");
    $idelem=$_POST['idelemento'];
    $productId=$_POST['producto'];
$qty=$_POST['qty'];
    $getelemquery="SELECT * FROM catalogoelemento WHERE IDCatElem=$idelem";
    $getelems=mysqli_query($conexion, $getelemquery);
    //print_r($getelems);
    $query = "SELECT * FROM catalogomaterial";
$result = mysqli_query($conexion, $query);
$output = '';

while($row = mysqli_fetch_array($result))
{
 $output .= '<option value="'.$row["IDCatMat"].'">'.$row["Nombre1"].'</option>'; 
}
    ?>
    



<?php 
  
   

  
  
  $row2=mysqli_fetch_assoc($getelems);
  $idelem=$row2['IDCatElem'];
  

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
<select name="material-<?=$productId ?>-<?=$idelem; ?>" id="Nombre1" class="form-control" placeholder='Material' >
<?php echo $output; ?>
</select>
</div>
    


<div class="form-group">
 <label for="Alto" class="control-label">Alto</label>
<input class="form-control prices" type="number" name="alto-<?=$productId ?>-<?=$idelem; ?>" id="Alto" placeholder="Alto" value="0">
</div>

<div class="form-group">
<label for="Ancho" class="control-label">Ancho</label>
<input class="form-control prices" type="number" name="ancho-<?=$productId ?>-<?=$idelem; ?>" id="Ancho" placeholder="Ancho" value="0">
</div>
    
</div>

    <div class="col-md-6"> 
        
        
       <div class="form-group">
           <label for="Cantidad" class="control-label">Cantidad</label>
<input class="form-control  Cantidad" type="number" name="cantidad-<?=$productId ?>-<?=$idelem; ?>" id="cantidad-<?=$productId ?>-<?=$idelem; ?>" placeholder="Cantidad" value="<?=$qty ?>" onchange="calcByElement(<?=$productId ?>,<?=$idelem; ?>)">

</div>

<div class="form-group ">
<label for="Costo" class="control-label">Costo del papel</label>
<input class="form-control prices" type="number" name="costoMod-<?=$productId ?>-<?=$idelem; ?>" id="CostoMod" value="" placeholder="$">
</div>
    
 <div class="form-group ">
 <label for="Cantidad" class="control-label">Costo Final</label>
<input class="form-control prices" type="number" name="costoFinal-<?=$productId ?>-<?=$idelem; ?>" id="CostoFinal" value="" placeholder="$ Final">
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
    $procesbyelem="SELECT * FROM procesoslinea WHERE id_elemento_linea=$idelem ";
    $proc=mysqli_query($conexion,$procesbyelem);
    
    while ($procesos=mysqli_fetch_assoc($proc)) {
       
  
    $procesID=$procesos['IDCatPro'];
  $getProcesQuery="SELECT * FROM catalogoproceso WHERE IDCatPro=$procesID";
  $getProcessCat=mysqli_query($conexion, $getProcesQuery);
   $row3=mysqli_fetch_assoc($getProcessCat);
  

  $idproces=$row3['IDCatPro'];
  $IDCatPro=$row3['IDCatPro'];
  $CostoUnitario=$row3['CostoUnitario'];
  ?>
<input type="hidden" name="procesos-<?=$productId ?>-<?=$idelem ?>[]" value="<?=$idproces ?>">
  <tr id="proceso-<?=$productId ?>-<?=$idelem ?>-<?=$idproces ?>">
  <td>
    <?=$row3['Nombre'] ?>
  </td>
  
  <td><select name="catalogos-<?=$productId ?>-<?=$idelem ?>[]">
    <option>Conchita</option>
    <option>Galleta</option>
    <option>Lazo</option>
  </select>
  </td>
  <td><?=$CostoUnitario ?>
  <input type="hidden" class=" proces-<?=$productId ?>-<?=$idelem ?>" value="<?=$CostoUnitario ?>">
  <input type="hidden" class=" ciento-<?=$productId ?>-<?=$idelem ?>" value="<?=$row3['CostoCiento'] ?>">
  <input type="hidden" class=" millar-<?=$productId ?>-<?=$idelem ?>" value="<?=$row3['CostoMillar'] ?>">
  <input type="hidden" class=" unico-<?=$productId ?>-<?=$idelem ?>" value="<?=$row3['CostoUnico'] ?>">
  </td>
  <td><a href="#" class="remove_field" onclick="removeProcess(<?=$idelem ?>,<?=$productId ?>,<?=$idproces ?>)">Quitar</a></td>
 </tr>
<?php } ?> 
</table>

      
</div>
        


</div>
</div>
</div>
</div>

  <?php  ?>
 
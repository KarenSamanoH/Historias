<?php

$clientId=$_POST['clientId'];
   
?>

<?php include("../code/conexion.php");
$query = "SELECT * FROM descuento";
$result = mysqli_query($conexion, $query);
$descu = '';
while($row = mysqli_fetch_array($result))
{
 $descu .= '<option value="'.$row["Descuento"].'">'.$row["Nombre"].'</option>'; 
}
?>


<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
   
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                
                resultDropdown.html(data);
            });
        } else{
            
            
            resultDropdown.empty();
        }
    });
    
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>


<br>
<div style="position: relative;  background: #f9f9f9; height: 50px; border:solid 1px #ddd; border-radius: 3px; text-align: center;">
<div class="search-box">
    <input type="text"  autocomplete="off" placeholder="Ingresa el modelo a cotizar" />
        <div class="result"></div>
    </div>

</div>
<form id="new-estim" name="new" action="newEstimate.php" method="post" onsubmit="saveEstimate(<?=$clientId ?>);">
<div class="row" style="margin-top: 20px;">
<input type="hidden" name="clientid" value="<?=$clientId ?>">
<input type="hidden" name="current_date" value="<?=date("Y-m-d") ?>">
<input type="hidden" name="idprod" id="idprod">
                <div class="col-md-4">
                    <div class="form-group form-group-sm">
                        <label for="empresa1" class="control-label" >Modelo</label>
                        <input type="text" class="form-control" id="est-model" name="est-model" readonly="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contacto1" class="control-label" >Descripci?</label>
                        <input type="text" class="form-control" id="est-descrip" name="est-descrip" readonly="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cargo1" class="control-label">Familia</label>
                        <input type="text" class="form-control" id="est-family" name="est-family" readonly="">
                    </div>
                </div>
            
             <div class="col-md-4">
                    <div class="form-group">
                        <label for="rcf1" class="control-label">Costo Unico</label>
                        <input type="text" class="form-control" id="estcu" name="estcu" readonly="">
                    </div>
                </div>

           <div class="col-md-4">
                    <div class="form-group">
                        <label for="rcf1" class="control-label">Costo unitario</label>
                        <input type="text" class="form-control" id="est-1" name="est-1" readonly="">
                    </div>
                </div>
 
      <div class="col-md-4">
                    <div class="form-group">
                        <label for="rcf1" class="control-label">Costo por ciento</label>
                        <input type="text" class="form-control" id="est-100" name="est-100" readonly="">
                    </div>
                </div>

           
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="curp1" class="control-label">Costo por millar</label>
                        <input type="text" class="form-control" id="est-1000" name="est-1000" readonly="">
                    </div>
                </div>

        <div class="col-md-4">
                    <div class="form-group">
                        <label for="rcf1" class="control-label">Papel</label>
                        <input type="text" class="form-control" id="papel" name="papel" readonly="">
                    </div>
                </div>

                     <div class="col-md-4">
                    <div class="form-group">
                        <label for="rcf1" class="control-label">Costo por Ajuste</label>
                        <input type="text" class="form-control" id="CAjuste" name="CAjuste" readonly="">
                    </div>
                </div>
            
             <div class="col-md-4">
                    <div class="form-group">
                        <label for="colonia1" class="control-label">IVA</label>
                        <input type="text" class="form-control" id="est-iva" name="est-iva" readonly="">
                    </div>
            </div>
            

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado1" class="control-label">Fecha de Evento</label>
                        <input type="text" class="form-control" id="datepicker" name="event_date" required="true">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado1" class="control-label">Cantidad</label>
                        <input type="number" class="form-control" onkeyup="co()" name="qty" id="qty" placeholder="Cantidad" required="true">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="descuento" class="control-label">Descuento</label>
                        <select type="number" class="form-control" name="descu" id="descu" placeholder="Descuento" required="true">
                            <option value="">Seleccionar descuento</option>
                           <?php echo $descu; ?>
                        </select>
                    </div>
                </div>
            
               <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado1" class="control-label">Costo Final</label>

                        <input type="hidden" class="form-control" id="est-final" name="est-final" readonly="" required="true">
                        <h1 type="text" id="final" style="text-align: center;" ></h1>

                    </div>
                </div>

            
<input type="hidden" class="form-control" id="est-cu" name="est-cu" placeholder="RCF" readonly="">
<input type="hidden" class="form-control" id="est-lead" name="est-lead" placeholder="Calle" readonly="">
<input type="hidden" class="form-control" id="est-paper" name="est-paper" placeholder="CP" readonly="">

    </div>
    
    <div style="width: 100%; text-align: center;">
    	<button type="submit"  class="btn btn-success btn-lg" >Guardar Cotizacion </button></form>
    <button type="button" id="add_button" class="btn btn-info btn-lg" onclick="showEstimates(<?=$clientId?>);">Cancelar</button>
    </div>
    
<br>



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
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>




<script>

function co()
{
var Descuento =  document.getElementById("descu").value;
var IVA =  document.getElementById("est-iva").value;
var costofinal = document.getElementById("est-final").value;
var Cantidad = document.getElementById("qty").value;
var CostoCiento = document.getElementById("est-100").value;
var CostoMillar = document.getElementById("est-1000").value;
var CostoUnico = document.getElementById("estcu").value;
var costounitario = document.getElementById("est-1").value;
var papel =  document.getElementById("papel").value;
var CAjuste =  document.getElementById("CAjuste").value;
var final;
var Costos = parseFloat(CostoMillar) + parseFloat(CostoCiento)  + parseFloat(CostoUnico);


    if (Cantidad >= 0 && Cantidad <= 100)
    {

var CCA = parseFloat(Cantidad) * parseFloat(CAjuste);
var CanCos = parseFloat(Cantidad) * parseFloat(costounitario);
var total = Costos + CCA + CanCos + parseFloat(papel) + .58;
var conD = total * parseFloat(Descuento);
var ConIva = total * parseFloat(IVA);

var final = total - conD + ConIva;


      $('#final').html(final.toFixed(2));
      $('#est-final').val(final.toFixed(2));
    }

    else if (Cantidad >= 100 && Cantidad <= 1000)
    {

        var Ca100 = parseFloat(Cantidad) - 100;
        var CC100 = parseFloat(CostoCiento)/100;
        var CaC = parseFloat(Cantidad) * parseFloat(costounitario);
        var conD = total * parseFloat(Descuento);
       var ConIva = total * parseFloat(IVA);
      var total= Costos + (Ca100 * CC100 ) + CaC + parseFloat(papel) + .58;
      var final = total - conD + ConIva;
      $('#final').html(final.toFixed(2));
      $('#est-final').val(final.toFixed(2));
    }
else if (Cantidad >= 1000 && Cantidad <= 20000){


 var total = parseFloat(CostoUnico) + parseFloat(CostoCiento) + parseFloat(CostoMillar) + ((parseFloat(Cantidad)-1000) * (parseFloat(CostoMillar)/1000)) + ((parseFloat(Cantidad)-100) * (parseFloat(CostoCiento)/100)) + (parseFloat(Cantidad) * parseFloat(costounitario)) + parseFloat(papel) + .58;
 var conD = total * parseFloat(Descuento);
var ConIva = total * parseFloat(IVA);
 var final = total - conD + ConIva;


      $('#final').html(final.toFixed(2));
      $('#est-final').val(final.toFixed(2));

}

}


    


</script>


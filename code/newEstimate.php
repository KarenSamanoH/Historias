<?php

$clientId=$_POST['clientId'];
   
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
        <input type="text" autocomplete="off" placeholder="Ingresa el modelo a cotizar" />
        <div class="result"></div>
    </div>

</div>
<form id="new-estim"  method="post" onsubmit="saveEstimate(<?=$clientId ?>);">
<div class="row" style="margin-top: 20px;">
<input type="hidden" name="clientid" value="<?=$clientId ?>">
                <div class="col-md-4">
                    <div class="form-group form-group-sm">
                        <label for="empresa1" class="control-label" >Modelo</label>
                        <input type="text" class="form-control" id="est-model" name="est-model" placeholder="Empresa" readonly="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contacto1" class="control-label" >Descripcion</label>
                        <input type="text" class="form-control" id="est-descrip" name="est-descrip" placeholder="Contacto" readonly="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cargo1" class="control-label">Familia</label>
                        <input type="text" class="form-control" id="est-family" name="est-family" placeholder="Cargo" readonly="">
                    </div>
                </div>
            
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="rcf1" class="control-label">Costo unitario</label>
                        <input type="text" class="form-control" id="est-cu" name="est-cu" placeholder="RCF" readonly="">
                    </div>
                </div>
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="rcf1" class="control-label">Costo por ciento</label>
                        <input type="text" class="form-control" id="est-100" name="est-100" placeholder="RCF" readonly="">
                    </div>
                </div>
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="curp1" class="control-label">Costo por millar</label>
                        <input type="text" class="form-control" id="est-1000" name="est-1000" placeholder="Curp" readonly="">
                    </div>
                </div>
            
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="Calle" class="control-label">Tiempo lead</label>
                        <input type="text" class="form-control" id="est-lead" name="est-lead" placeholder="Calle" readonly="">
                    </div>
                </div>
            
             <div class="col-md-4">
                    <div class="form-group">
                        <label for="colonia1" class="control-label">IVA</label>
                        <input type="text" class="form-control" id="est-iva" name="est-iva" placeholder="Colonia" readonly="">
                    </div>
            </div>
            
             <div class="col-md-4">
                    <div class="form-group">
                        <label for="cp" class="control-label">Costo del papel</label>
                        <input type="text" class="form-control" id="est-paper" name="est-paper" placeholder="CP" readonly="">
                    </div>
                </div>
            
               <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado1" class="control-label">Costo Final</label>
                        <input type="text" class="form-control" id="est-final" name="est-final" placeholder="Estado" readonly="">
                    </div>
                </div>
            


    </div>
    
    <div style="width: 100%; text-align: center;">
    	<button type="submit"  class="btn btn-success btn-lg" >Guardar Cotizacion </button></form>
    <button type="button" id="add_button" class="btn btn-info btn-lg" onclick="showEstimates(<?=$clientId?>);">Cancelar</button>
    </div>
    
<br>
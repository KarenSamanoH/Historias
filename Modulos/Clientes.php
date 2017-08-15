<?php 


include("../code/conexion.php");
if( !session_id() )
    {
        session_start();
     
        
    }
    if(@$_SESSION['logged_in'] == true){

$query = "SELECT * FROM empresa";
$result = mysqli_query($conexion, $query);
$output = '';
while($row = mysqli_fetch_array($result))
{
 $output .= '<option value="'.$row["IDEmpresa"].'">'.$row["Empresa"].'</option>'; 
}
?>

<?php include("../code/conexion.php");
$query = "SELECT * FROM agente";
$result = mysqli_query($conexion, $query);
$mensaje = '';
while($row = mysqli_fetch_array($result))
{
 $mensaje .= '<option value="'.$row["IDAgente"].'">'.$row["Nombre"].'</option>'; 
}
?>


<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Historias en papel</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>  -->

<link href="../css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="../css/historias.css" rel="stylesheet" type="text/css"/>
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />-->

<script src="../bootgrid/jquery.bootgrid.min.js" type="text/javascript"></script>
<link href="../bootgrid/jquery.bootgrid.min.css" rel="stylesheet" type="text/css"/>
<script src="../bootgrid/jquery.bootgrid.js" type="text/javascript"></script>
<script src="../bootgrid/jquery.bootgrid.fa.min.js" type="text/javascript"></script>
<script src="../bootgrid/jquery.bootgrid.fa.js" type="text/javascript"></script>
<link href="../bootgrid/jquery.bootgrid.css" rel="stylesheet" type="text/css"/>
<!----Datapicker----->

<script src="../dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">

<!-- Custom Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<!-- JS--> 


 <style>
 .navbar{
  margin-bottom: 0!important;
  padding-top: 0!important;

 }
 #cliente_info td:first-child{
  width: 5px!important;
 }
 #cliente_info td:last-child{
  width: 290px!important;
 }
 #cliente_info button{
  display: inline-block;
 }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
   .tbuttons{
    width: 90px;
    display: inline-block;
   }
   .tbuttons button{
    padding: 6px 12px!important;
   }

   #estimates-table {
    border-collapse: collapse;
    width: 100%;

}

#estimates-table th, td {
    text-align: left;
    padding: 8px;
    border: 1px solid #ddd;
}
#estimates-table tr{
  
}

#estimates-table tr:nth-child(even){background: #f9f9f9}

 #estimates-table th {
    background-color: #fff;
    
}
#estimates-table tr:hover{
  background: #f2f2f2;
}
.estimate-actions{
  width: 100%;
  height: 60px;
}
.new-estimate{
  width: 60px!important;
  position: relative;
}
.search-box{
        width: 270px;
        position: relative;
        display: inline-block;
        font-size: 14px;
        margin-top: 8px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
        border-radius: 3px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
        background: #fff;
        -webkit-box-shadow: 2px 2px 3px 0px rgba(50, 50, 50, 0.31);
-moz-box-shadow:    2px 2px 3px 0px rgba(50, 50, 50, 0.31);
box-shadow:         2px 2px 3px 0px rgba(50, 50, 50, 0.31);
    }
    .result p:hover{
        background: #f2f2f2;
    }
    .new-est-form{
      width: 100%;
      height: 300px;
    }
  </style>
 </head>
<!--   Body starts here -->

     <body>  
         <div id="cotizacionModal" class="modal fade">
    <div class="modal-dialog">
     <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Cotizaciones de Cliente</h4>
    </div>
    <div class="modal-body estimate">      
    <div class="container col-lg-12">
  
   <p></p>
   </div>
 </div>
 </div>
 </div>
 </div>
         <nav id="mainNav" class="navbar navbar-default navbar-custom">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle</span>MenÃº<i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="../Modulos/Principal.php">Historias en Papel</a>
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
    
    <!-- modal agregar empresa -->
    <div id="AgregarEmpresa" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="empresa_form">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Agregar empresa</h4>
    </div>
    <div class="modal-body">      
    <div class="container col-lg-12">
  <div class="row">
    <h3 class="text-center">Datos de la empresa</h3>
  </div>
        <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-group-sm">
                        <label for="empresa1" class="control-label">Empresa <i class="fa fa-suitcase" aria-hidden="true"></i></label>
                        <input type="text" class="form-control" id="Empresa" name="Empresa" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contacto1" class="control-label">Contacto <i class="fa fa-phone-square" aria-hidden="true"></i></label>
                        <input type="text" class="form-control" id="Contacto" name="Contacto" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cargo1" class="control-label">Cargo <i class="fa fa-address-card" aria-hidden="true"></i></label>
                        <input type="text" class="form-control" id="Cargo" name="Cargo">
                    </div>
                </div>
            
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="rcf1" class="control-label">RCF <i class="fa fa-hashtag" aria-hidden="true"></i></label>
                        <input type="text" class="form-control" id="RFC" name="RFC" >
                    </div>
                </div>
            
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="rcf1" class="control-label">Ciudad</label>
                        <input type="text" class="form-control" id="Ciudad" name="ciudad">
                    </div>
                </div>
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="curp1" class="control-label">Curp</label>
                        <input type="text" class="form-control" id="CURP" name="CURP" >
                    </div>
                </div>
            
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="Calle" class="control-label">Calle</label>
                        <input type="text" class="form-control" id="Calle" name="Calle" >
                    </div>
                </div>
            
             <div class="col-md-4">
                    <div class="form-group">
                        <label for="colonia1" class="control-label">Colonia</label>
                        <input type="text" class="form-control" id="Colonia"  name="Colonia" >
                    </div>
            </div>
            
             <div class="col-md-4">
                    <div class="form-group">
                        <label for="cp" class="control-label">CP</label>
                        <input type="text" class="form-control" id="CP" name="CP">
                    </div>
                </div>
            
               <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado1" class="control-label">Estado</label>
                        <input type="text" class="form-control" id="Estado" name="Estado" >
                    </div>
                </div>
            


    </div>   
    </div>
    </div>
    <div class="modal-footer">      
     <input type="hidden" name="IDEmpresa" id="IDEmpresa" />
     <input type="hidden" name="operation" id="operation2" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Agregar" />
    </div>
   </div>
  </form>
 </div>
</div>
 <!-- termina modal agregar empresa -->

  <div style="width:100%;">
  <div style="width: 60%; display: inline-block;">
    <h1 align="center">Informaci�n del cliente</h1>
  </div>
  <div style="width: 39%; display: inline-block;">
  <h1 style="text-align: right;">
     <button type="button" id="add_button" data-toggle="modal" data-target="#AgregarModal" class="btn btn-info btn-lg">Agregar Cliente  <i class="fa fa-user-plus" aria-hidden="true"></i></button>
 <button type="button" id="empresa_button" data-toggle="modal" data-target="#AgregarEmpresa" class="btn btn-success btn-lg">Agregar Empresa <i class="fa fa-suitcase" aria-hidden="true"></i></button>
 </h1>
  </div>
   
   
   </div>
   <p></p>
  </div>
   
   
   <div class="table-responsive">
    <table id="cliente_info" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th data-column-id="IDCliente" data-type="numeric">ID cliente</th>  
       <th data-column-id="Empresa">Empresa</th>
       <th data-column-id="Nombre1">Nombre</th>
       <th data-column-id="Telefono">Telefono</th>
       <th data-column-id="TipoEvento">Evento</th>
       <th data-column-id="commands" data-formatter="commands" data-sortable="false">Acciones</th>
      </tr>
     </thead>
    </table>
   </div>

</body>
</html>


<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#product_form')[0].reset();
  $('.modal-title').text("Agregar cliente");
  $('#action').val("Agregar");
  $('#operation').val("Agregar");
 });

 var Tablacliente = $('#cliente_info').bootgrid({
  ajax: true,
  rowSelect: true,
  post: function()
  {
   return{
    id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
   };
  },
  url: "../code/fetch.php",
  formatters: {
   "commands": function(column, row)
   {
    return "<div class=tbuttons><button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.IDCliente+"'>Editar</button></div>" + 
    "<div class=tbuttons> <button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.IDCliente+"'>Eliminar</button></div>"+ 
    "<div class=tbuttons> <button type='button' onclick='showEstimates("+row.IDCliente+");' class='btn btn-info btn-xs cotiza' data-row-id='"+row.IDCliente+"'>Cotizaciones</button></div>";
   }
  }
 });
 
 
 
 <!---cliente--->

$(document).on('submit', '#product_form', function(event){
  event.preventDefault();
  var IDEmpresa = $('#IDEmpresa').val();
  var Nombre1 = $('#Nombre1').val();
  var TipoEvento = $('#TipoEvento').val();
  var Nombre2 = $('#Nombre2').val();
  var Telefono = $('#Telefono').val();
  var Celular1 = $('#Celular1').val();
  var Celular2 = $('#Celular2').val();
  var Email1 = $('#Email1').val();
  var FechaAlta = $('#FechaAlta').val();
  var Direccion = $('#Direccion').val();

  
  
  var form_data = $(this).serialize();
  if(IDEmpresa != '' && Nombre1 != '' && TipoEvento !='')
  {
   $.ajax({
    url:"../code/insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     swal(data);
     $('#product_form')[0].reset();
     $('#AgregarModal').modal('hide');
     $('#cliente_info').bootgrid('reload');
    }
   })
  }
  else
  {
   swal("Rellena los campos que se te piden", "", "warning")
  }
 });
 

 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  Tablacliente.find(".update").on("click", function(event)
  {
    

   var IDCliente = $(this).data("row-id");
   console.log(IDCliente);
    $.ajax({
    url:"../code/fetch_single.php",
    method:"POST",
    data:{IDCliente:IDCliente},
    dataType:"json",
    success:function(data)
    {
      console.log(data);
$('#AgregarModal').modal('show');
$('#IDEmpresa').val(data.IDEmpresa);
$('#Nombre1').val(data.Nombre1);
$('.modal-title').text("Editar cliente");
$('#IDCliente').val(data.IDCliente);
$('#TipoEvento').val(data.TipoEvento);
$('#action').val("Editar");
$('#operation').val("Editar");
$('#Nombre2').val(data.Nombre2);
$('#TipoEvento').val(data.TipoEvento);
$('#Telefono').val(data.Telefono);
$('#Celular1').val(data.Celular1);
$('#Celular2').val(data.Celular2);
$('#Email1').val(data.Email1);
$('#FechaAlta').val(data.FechaAlta);
$('#IDAgente').val(data.IDAgente);
$('#Direccion').val(data.Direccion);


     
    }
   });
  });

  
 });

 
 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  Tablacliente.find(".delete").on("click", function(event)
  {
   if(swal("Eliminar cliente?", "No se podra recurar el registro", "warning"))
   {
    var IDCliente = $(this).data("row-id");
    console.log(IDCliente);
    $.ajax({
     url:"../code/delete.php",
     method:"POST",
     data:{IDCliente:IDCliente},
     success:function(data)
     {
      swal(data);
      $('#cliente_info').bootgrid('reload');
     }
    })
   }
   else{
    return false;
   }
  });
 }); 
});

function showEstimates(id){
$('#cotizacionModal').modal('show');
$('.modal-dialog').css('width','80%');
    $.ajax({
    url:"../code/getEstimate.php",
    method:"POST",
    data:{clientId:id},
    success:function(data)
    {
     
     $('.estimate').html(data);
     
    }
   })
}
function newEstimate(id){
  $.ajax({
    url:"../code/newEstimate.php",
    method:"POST",
    data:{clientId:id},
    success:function(data)
    {
     
     $('.estimate').html(data);
     
    }
   })
}
function fillData(id){
  var model=JSON.parse($('#model-'+id).val());
$('#est-model ').val(model.Modelo);
$('#est-descrip ').val(model.Descripcion);
$('#est-family ').val(model.Familia);
$('#est-cu ').val(model.CostoUnico);
$('#est-100').val(model.CostoCiento);
$('#est-1000 ').val(model.CostoMillar);
$('#est-lead').val(model.TiempoLead);
$('#est-iva').val(model.IVA);
$('#est-paper').val(model.CostoPapel);
$('#est-final').val(model.CostoFinal);
  
$('#final-amount').html('$'+model.CostoFinal);







  console.log(model.CostoFinal);
}
function modifiEstimate(idc){
  console.log(idc);
  
    $('#send-'+idc).html('<input type="hidden" value='+idc+' name="id-cotizacion">').submit();
   
}
function saveEstimate(id){
  var final=$('#est-final').val();

  if (final!=='') {
    event.preventDefault();
$.ajax({  
                      
                     type:"POST",
                     url:"saveEstimate.php",   
                     data:$('#new-estim').serialize(),  
                       
                     success:function(data){ 
                        
                          showEstimates(id);
                          //$('.search-box').html(data);
                           
                         
                     }  
                });  
}else{
  swal('faltan datos');
  event.preventDefault();
  return false;
}
  
}

</script>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#empresa_button').click(function(){
  $('.modal-title').text("Agregar empresa");
  $('#action').val("Agregar");
  $('#operation2').val("Add");
 });

 
 $(document).on('submit', '#empresa_form',function(event){
  event.preventDefault();
  var Empresa = $('#Empresa').val();
  var Contacto = $('#Contacto').val();
  var Cargo = $('#Cargo').val();
  var CURP = $('#CURP').val();
  var RFC = $('#RFC').val();
  var Calle = $('#Calle').val();
  var Ciudad = $('#Ciudad').val();
  var Estado = $('#Estado').val();
  var CP = $('#CP').val();
  var Colonia = $('#Colonia').val();
  
  var form_data = $(this).serialize();
  if(Empresa != '')
  {
   $.ajax({
    url:"../code/insertempresa.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     swal(data);
     $('#empresa_form')[0].reset();
     $('#AgregarEmpresa').modal('hide');
     $('#cliente_info').bootgrid('reload');
    }
   })
  }
  else
  {
   swal("Falta informaci�n");
  }
  });
   });
 
 </script>

 


<div id="AgregarModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="product_form">
  
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Agregar cliente</h4>
    </div>
    <div class="modal-body ">
    
     
<div class="col-md-4">
<div class="form-group">
<label>Seleccionar empresa <i class="fa fa-suitcase" aria-hidden="true"></i></label>
<select name="IDEmpresa" id="IDEmpresa" class="form-control">
<option value="">Seleccionar empresa</option>
<?php echo $output; ?>
</select>
</div>
</div>
     
        
        
        <div class="col-md-4">
<div class="form-group">
<label>Seleccionar agente <i class="fa fa-user-secret" aria-hidden="true"></i></label>
<select name="IDAgente" id="IDAgente"  class="form-control">
<option value="">Seleccionar agente</option>
<?php echo $mensaje; ?>
</select>
</div>
</div>


        <div class="col-md-4">
                    <div class="form-group">
   <label>Tipo de Evento <i class="fa fa-gift" aria-hidden="true"></i></label>
     <select name="TipoEvento" id="TipoEvento" class="form-control">
      <option value="">Tipo de Evento</option>
      <optgroup label="Fiestas">
                      <option>XV AÃ±os</option>
                      <option>Bautizos</option>
                      <option>Primera comunion</option>
                      <option>CumpleaÃ±os</option>
                      </optgroup>
                     <optgroup label="Bodas">
                      <option>Boda de oro</option>
                      <option>Boda de plata</option>
                      <option>Boda de diamante</option>
                     </optgroup>
                     <optgroup label="Eventos"></optgroup>
                     <option>Promocionales</option>
                     <option>Campa�as publicitarias</option>
                     </select>
                    </div>
        </div>

<div class="col-md-4">
<div class="form-group">
<label>Primer Nombre <i class="fa fa-user" aria-hidden="true"></i></label>
<input type="text" name="Nombre1" id="Nombre1" class="form-control" />
</div>
</div>


       
      
   
<div class="col-md-4">
<div class="form-group">
<label for="nombre2" class="control-label">Segundo nombre <i class="fa fa-user-plus" aria-hidden="true"></i></label>
<input type="text" class="form-control" name="Nombre2" id="Nombre2" >
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="telefono1" class="control-label">Telefono <i class="fa fa-phone" aria-hidden="true"></i></label>
<input  type="text" class="form-control" name="Telefono" id="Telefono" >
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="celular1" class="control-label">Celular <i class="fa fa-mobile" aria-hidden="true"></i></label>
<input type="text" class="form-control" name="Celular1" id="Celular1" >
</div>
</div>


<div class="col-md-4">
<div class="form-group">
<label for="celular2" class="control-label">Otro celular <i class="fa fa-mobile" aria-hidden="true"></i></label>
<input type="text" class="form-control" name="Celular2" id="Celular2">
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label for="comentarios" class="control-label">Direccion <i class="fa fa-map-marker" aria-hidden="true"></i></label>
<input type="text" class="form-control" name="Direccion" id="Direccion" >
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="Emai1" class="control-label">Email <i class="fa fa-envelope" aria-hidden="true"></i></label>
<input type="text" class="form-control" name="Email1" id="Email1" >
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label for="fechaA" class="control-label">Fecha de Alta <i class="fa fa-calendar" aria-hidden="true"></i></label>
<input type="text" class="form-control" name="FechaAlta" id="datepicker" >
</div>
</div>




       
    <div class="modal-footer">
        
     <input type="hidden" name="IDCliente" id="IDCliente" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Agregar" />
    </div>
   </div>
  </form>
 </div>
</div>


<!---Modal de la Empresa---->



<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      

<?php }else{
        echo '
    <script>
        alert("Inicia Sesion para entrar a esta pagina");
        self.location.replace("../index.php");
    </script>';
    }?>



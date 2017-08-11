<?php include("../code/conexion.php");
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

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

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


<!-- Custom Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<!-- JS--> 


 <style>

   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
  </style>
 </head>
<!--   ---Body starts here---->

     <body>  
         
         <nav id="mainNav" class="navbar navbar-default navbar-custom">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle</span>Menú<i class="fa fa-bars"></i>
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
                        <a class="page-scroll" href="../index.php">Salir<span class="glyphicon glyphicon-log-out"></span></a>
                    </li>
                </ul>
            </div>
       
        </div>

    </nav>
    

  <div class="container responsive">
   <h1 align="center">Información del cliente</h1>
   <br />
   <div align="right">
    <button type="button" id="add_button" data-toggle="modal" data-target="#AgregarModal" class="btn btn-info btn-lg">Agregar Cliente  <i class="fa fa-user-plus" aria-hidden="true"></i></button>
   </div>
   <p></p>
   
     <div align="right">
    <button type="button" id="empresa_button" data-toggle="modal" data-target="#AgregarEmpresa" class="btn btn-success btn-lg">Agregar Empresa <i class="fa fa-suitcase" aria-hidden="true"></i></button>
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
    return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.IDCliente+"'>Editar</button>" + 
    "&nbsp; <button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.IDCliente+"'>Eliminar</button>"+ 
    "&nbsp; <button type='button' class='btn btn-info btn-xs show' data-row-id='"+row.IDCliente+"'>Pedido</button>";
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
  var Fax = $('#Fax').val();
  var Celular1 = $('#Celular1').val();
  var Celular2 = $('#Celular2').val();
  var Email1 = $('#Email1').val();
  var FechaAlta = $('#FechaAlta').val();
  var Comentarios = $('#Comentarios').val();
  var Expo = $('#Expo').val();
  var FechaExpo = $('#FechaExpo').val();
  var TipoCliente = $('#TipoCliente').val();
  
  
  var form_data = $(this).serialize();
  if(IDEmpresa != '' && Nombre1 != '' && Telefono != '' && TipoEvento !='')
  {
   $.ajax({
    url:"../code/insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     alert(data);
     $('#product_form')[0].reset();
     $('#AgregarModal').modal('hide');
     $('#cliente_info').bootgrid('reload');
    }
   })
  }
  else
  {
   alert("Se requieren todos los campos");
  }
 });
 

 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  Tablacliente.find(".update").on("click", function(event)
  {

   var IDCliente = $(this).data("row-id");
    $.ajax({
    url:"../code/fetch_single.php",
    method:"POST",
    data:{IDCliente:IDCliente},
    dataType:"json",
    success:function(data)
    {
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
$('#Fax').val(data.Fax);
$('#Celular1').val(data.Celular1);
$('#Celular2').val(data.Celular2);
$('#Email1').val(data.Email1);
$('#FechaAlta').val(data.FechaAlta);
$('#IDAgente').val(data.IDAgente);
$('#Comentarios').val(data.Comentarios);
$('#TipoCliente').val(data.TipoCliente);
$('#Expo').val(data.Expo);
$('#FechaExpo').val(data.FechaExpo);
     
    }
   });
  });
 });

 
 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  Tablacliente.find(".delete").on("click", function(event)
  {
   if(confirm("Seguro quieres eliminar este cliente?"))
   {
    var IDCliente = $(this).data("row-id");
    console.log(IDCliente);
    $.ajax({
     url:"../code/delete.php",
     method:"POST",
     data:{IDCliente:IDCliente},
     success:function(data)
     {
      alert(data);
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




</script>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#empresa_button').click(function(){
  $('.modal-title').text("Agregar empresa");
  $('#action').val("Add");
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
     alert(data);
     $('#empresa_form')[0].reset();
     $('#AgregarEmpresa').modal('hide');
     $('#cliente_info').bootgrid('reload');
    }
   })
  }
  else
  {
   alert("Empresa vacio");
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
<label>Seleccionar empresa</label>
<select name="IDEmpresa" id="IDEmpresa" class="form-control">
<option value="">Seleccionar empresa</option>
<?php echo $output; ?>
</select>
</div>
</div>
        
        <div class="col-md-4">
<div class="form-group">
<label>Seleccionar agente</label>
<select name="IDAgente" id="IDAgente"  class="form-control">
<option value="">Seleccionar agente</option>
<?php echo $mensaje; ?>
</select>
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label>Nombre</label>
<input type="text" name="Nombre1" id="Nombre1" class="form-control" />
</div>
</div>


       
        <div class="col-md-4">
                    <div class="form-group">
   <label>Tipo de Evento</label>
     <select name="TipoEvento" id="TipoEvento" class="form-control">
      <option value="">Tipo de Evento</option>
      <optgroup label="Fiestas">
                      <option>XV Años</option>
                      <option>Bautizos</option>
                      <option>Primera comunión</option>
                      <option>Cumpleaños</option>
                      </optgroup>
                     <optgroup label="Bodas">
                      <option>Boda de oro</option>
                      <option>Boda de plata</option>
                      <option>Boda de diamante</option>
                     </optgroup>
                     <optgroup label="Eventos"></optgroup>
                     <option>Promocionales</option>
                     <option>Campañas publicitarias</option>
                     </select>
                    </div>
        </div>
      
   
<div class="col-md-4">
<div class="form-group">
<label for="nombre2" class="control-label">Nombre 2</label>
<input type="text" class="form-control" name="Nombre2" id="Nombre2" placeholder="Nombre 2">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="telefono1" class="control-label">Teléfono</label>
<input  type="text" class="form-control" name="Telefono" id="Telefono" placeholder="Teléfono">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="celular1" class="control-label">Celular 1</label>
<input type="text" class="form-control" name="Celular1" id="Celular1" placeholder="Celular 1">
</div>
</div>


<div class="col-md-4">
<div class="form-group">
<label for="Emai1" class="control-label">Email 1</label>
<input type="text" class="form-control" name="Email1" id="Email1" placeholder="Email 1">
</div>
</div>


<div class="col-md-4">
<div class="form-group">
<label for="fechaA" class="control-label">Fecha de Alta</label>
<input type="text" class="form-control" name="FechaAlta" id="FechaAlta" placeholder="Fecha de Alta">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="comentarios" class="control-label">Comentarios</label>
<input type="text" class="form-control" name="Comentarios" id="Comentarios" placeholder="Comentarios">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="credito" class="control-label">Fax</label>
<input type="text" class="form-control" name="Fax" id="Fax" placeholder="Fax">
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label for="celular2" class="control-label">Celular 2</label>
<input type="text" class="form-control" name="Celular2" id="Celular2" placeholder="Celular 2">
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label for="Email2" class="control-label">Expo</label>
<input type="text" class="form-control" name="Expo" id="Expo" placeholder="Expo">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="Email2" class="control-label">Fecha Expo</label>
<input type="text" class="form-control" name="FechaExpo" id="Email2" placeholder="FechaExpo">
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
                        <label for="empresa1" class="control-label">Empresa</label>
                        <input type="text" class="form-control" id="Empresa" name="Empresa" placeholder="Empresa">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contacto1" class="control-label">Contacto</label>
                        <input type="text" class="form-control" id="Contacto" name="Contacto" placeholder="Contacto">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cargo1" class="control-label">Cargo</label>
                        <input type="text" class="form-control" id="Cargo" name="Cargo" placeholder="Cargo">
                    </div>
                </div>
            
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="rcf1" class="control-label">RCF</label>
                        <input type="text" class="form-control" id="RFC" name="RFC" placeholder="RCF">
                    </div>
                </div>
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="rcf1" class="control-label">Ciudad</label>
                        <input type="text" class="form-control" id="Ciudad" name="ciudad" placeholder="RCF">
                    </div>
                </div>
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="curp1" class="control-label">Curp</label>
                        <input type="text" class="form-control" id="CURP" name="CURP" placeholder="Curp">
                    </div>
                </div>
            
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="Calle" class="control-label">Calle</label>
                        <input type="text" class="form-control" id="Calle" name="Calle" placeholder="Calle">
                    </div>
                </div>
            
             <div class="col-md-4">
                    <div class="form-group">
                        <label for="colonia1" class="control-label">Colonia</label>
                        <input type="text" class="form-control" id="Colonia"  name="Colonia" placeholder="Colonia">
                    </div>
            </div>
            
             <div class="col-md-4">
                    <div class="form-group">
                        <label for="cp" class="control-label">CP</label>
                        <input type="text" class="form-control" id="CP" name="CP" placeholder="CP">
                    </div>
                </div>
            
               <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado1" class="control-label">Estado</label>
                        <input type="text" class="form-control" id="Estado" name="Estado" placeholder="Estado">
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
      


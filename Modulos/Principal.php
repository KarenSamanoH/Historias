<?php

if( !session_id() )
    {
        session_start();
     
        
    }
    if(@$_SESSION['logged_in'] != true){
        echo '
    <script>
        alert("Inicia Sesion para entrar a esta pagina");
        self.location.replace("../index.php");
    </script>';
    }else{
?>


<!DOCTYPE html>
<html lang="en">
<!---Autor: Samano Herrejon Karen Nancy----->
 <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Historias en papel</title>
<link href="../css/font-awesome.css" rel="stylesheet" type="text/css"/>

    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
   <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
      <!-- Theme CSS -->    
      <link href="../css/historias.css" rel="stylesheet" type="text/css"/>
 </head>
   <!-----Body starts here------>
   <body id="page-top">
       
        <!-- Navigation stars here-->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- funtional toogle-->
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
                        <a class="page-scroll" href="#Pedido.php">Pedido<span class="glyphicon glyphicon-book"></span></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="Reportar.php">Reportar un problema<span class="glyphicon glyphicon-exclamation-sign"></span></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../index.php">Salir<span class="glyphicon glyphicon-log-out"></span></a>
                    </li>
                </ul>
            </div>
            <!--navbar-collapse -->
        </div>
        <!--container-fluid -->
    </nav>
   
        <!-- Header stars here -->
    <header>
        <div class="container">
            <div class="intro-text">
               
            </div>
        </div>
    </header>
       
         <!-- Services Section stars here -->
<!--    <section id="clientes">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="section-heading">clientes</h>
                   
                </div>
            </div>-->
           <!--Forms stars here-->

            
 <!---tab stars here--->    
<!-- 
           <section style="background:#ffffff;">
              
        <div class="container">
            <div class="row">
                <div class="board">
                   
                    <div class="board-inner">
                    <ul class="nav nav-tabs" id="myTab">
                    <div class="liner"></div>
                     <li class="active">
                     <a href="#cliente" data-toggle="tab" title="Nuevo cliente">
                      <span class="round-tabs one">
                              <i class="glyphicon glyphicon-user"></i>
                      </span> 
                  </a></li>

                  <li><a href="#buscar" data-toggle="tab" title="Buscar cliente">
                     <span class="round-tabs two">
                         <i class="glyphicon glyphicon-search"></i>
                     </span> 
           </a>
                 </li>
                 <li><a href="#consultar" data-toggle="tab" title="Consultar pedido">
                     <span class="round-tabs three">
                          <i class="glyphicon glyphicon-book"></i>
                     </span> </a>
                     </li>
                     </ul></div>
                    
                    -Finish tab-

                    <div class="tab-content">
                       
      <div class="tab-pane fade in active" id="cliente">
     <div class="container col-lg-12">
  <div class="panel panel-success">
    <div class="panel-heading">Agregar nuevo cliente</div>
    <div class="panel-body" id="AgregarC">
        <form method="POST" action="AgregarC">
              <label class="custom-control custom-radio">
  <input id="raboda" name="radio" type="radio" class="custom-control-input">
  <span class="custom-control-indicator"></span>
  <span class="custom-control-description">Boda</span>
</label>
<label class="custom-control custom-radio">
  <input id="raotros" name="radio" type="radio" class="custom-control-input">
  <span class="custom-control-indicator"></span>
  <span class="custom-control-description">Otros</span>
</label>  
        
        
        
        <div class="col-lg-12 right">        
        <button id="registrar" class="btn btn-success right">Registrar</button>     
        </div>
        
   <div class="container col-lg-12">
	<div class="row">
		<h2>Datos del cliente</h2>
	</div>
    <form action="#">
        <div class="row">
            
            
            <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="evento1" class="control-label">Tipo de Evento</label>
                        <input type="text" class="form-control" id="evento" placeholder="Tipo de evento">
                      <select class="selectpicker form-control" id="evento">
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
                     </select>

                    </div>
                </div>
            
            
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="nombre1" class="control-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="apellido1" class="control-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" placeholder="Apellido">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nombre2" class="control-label">Nombre 2</label>
                        <input type="text" class="form-control" id="nombre2" placeholder="Nombre 2">
                    </div>
                </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="apellido2" class="control-label">Apellido 2</label>
                        <input type="text" class="form-control" id="apellido2" placeholder="Apellido 2">
                    </div>
                </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefono1" class="control-label">Teléfono</label>
                        <input type="text" class="form-control" id="curp" placeholder="Teléfono">
                    </div>
                </div>
            
              <div class="col-md-3">
                    <div class="form-group">
                        <label for="celular1" class="control-label">Celular 1</label>
                        <input type="text" class="form-control" id="celular1" placeholder="Celular 1">
                    </div>
            </div>
            

            <div class="col-md-3"">
  <div id="datetimepicker2" class="input-append">
    <input data-format="MM/dd/yyyy HH:mm:ss PP" type="text"></input>
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  </div>
</div>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker2').datetimepicker({
      language: 'en',
      pick12HourFormat: true
    });
  });
</script>
            
             <div class="col-md-3">
                    <div class="form-group">
                        <label for="Emai1" class="control-label">Email 1</label>
                        <input type="text" class="form-control" id="email1" placeholder="Email 1">
                    </div>
            </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="Calle1" class="control-label">Calle</label>
                        <input type="text" class="form-control" id="calle" placeholder="Calle">
                    </div>
                </div>
            
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="colonia1" class="control-label">Colonia</label>
                        <input type="text" class="form-control" id="Colonia" placeholder="Colonia">
                    </div>
            </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="cp" class="control-label">CP</label>
                        <input type="text" class="form-control" id="CP" placeholder="Estado">
                    </div>
                </div>
            
               <div class="col-md-3">
                    <div class="form-group">
                        <label for="estado1" class="control-label">Estado</label>
                        <input type="text" class="form-control" id="estado" placeholder="Estado">
                    </div>
                </div>
            
             <div class="col-md-3">
                    <div class="form-group">
                        <label for="Ciudad1" class="control-label">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" placeholder="Ciudad">
                    </div>
                </div>
            
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="fax1" class="control-label">Fax</label>
                        <input type="text" class="form-control" id="fax" placeholder="Fax">
                    </div>
            </div>
            
          
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="celular2" class="control-label">Celular 2</label>
                        <input type="text" class="form-control" id="celular2" placeholder="Celular 2">
                    </div>
            </div>
            
           
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="Email2" class="control-label">Email 2</label>
                        <input type="text" class="form-control" id="email2" placeholder="Email 2">
                    </div>
            </div>
        
    </form>
</div>     
-Formularios generales       
 -Formularios de la empresa--
<div class="conteiner col-lg-12">
    
    <label class="custom-control custom-radio">
  <input data-toggle="collapse" id="radio2" name="radio" data-target="#empresa" type="radio" class="custom-control-input">
 <span class="custom-control-indicator"></span>
  Empresa<div id="empresa" class="collapse">
 <span class="custom-control-description"></span>
</label>  


 -Formularios de la empresa--
        
        <div class="container col-lg-12">
	<div class="row">
		<h2>Datos adicionales de la empresa</h2>
	</div>
    <form action="#">
        <div class="row">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="empresa1" class="control-label">Empresa</label>
                        <input type="text" class="form-control" id="empresa" placeholder="Empresa">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="contacto1" class="control-label">contacto</label>
                        <input type="text" class="form-control" id="contacto" placeholder="Contacto">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cargo1" class="control-label">Cargo</label>
                        <input type="text" class="form-control" id="cargo" placeholder="Cargo">
                    </div>
                </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="rcf1" class="control-label">RCF</label>
                        <input type="text" class="form-control" id="rcf" placeholder="RCF">
                    </div>
                </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="curp1" class="control-label">Curp</label>
                        <input type="text" class="form-control" id="curp" placeholder="Curp">
                    </div>
                </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="Calle" class="control-label">Calle</label>
                        <input type="text" class="form-control" id="calle" placeholder="Calle">
                    </div>
                </div>
            
             <div class="col-md-3">
                    <div class="form-group">
                        <label for="colonia1" class="control-label">Colonia</label>
                        <input type="text" class="form-control" id="Colonia" placeholder="Colonia">
                    </div>
            </div>
            
             <div class="col-md-3">
                    <div class="form-group">
                        <label for="cp" class="control-label">CP</label>
                        <input type="text" class="form-control" id="CP" placeholder="Estado">
                    </div>
                </div>
            
               <div class="col-md-3">
                    <div class="form-group">
                        <label for="estado1" class="control-label">Estado</label>
                        <input type="text" class="form-control" id="estado" placeholder="Estado">
                    </div>
                </div>
            
             <div class="col-md-3">
                    <div class="form-group">
                        <label for="Ciudad1" class="control-label">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" placeholder="Ciudad">
                    </div>
                </div>
            
                
           
    </form>

</div>
    
</div>
 
 Terminan los datos de la empresa-

</div>    
</div>
</div>
        </form>
</div>
  </div>
     </div>
          
                </div>
                            
                       
                      
                        
         Aqui empieza el apartado de busqueda-               
    <div class="tab-pane fade in " id="buscar">
      <div class="container col-lg-12">
  <div class="panel panel-warning">
    <div class="panel-heading">Buscar cliente</div>
    <div class="panel-body">
      
     <div class="container col-lg-12 center-block">      
          <label for="buscar" class="control-label col-lg-4">Buscar cliente</label>
           <input type="text" class="form-control col-lg-4" id="buscar" placeholder="Buscar cliente">
        <button id="registrar" class="btn btn-warning right col-lg-4" data-toggle="collapse" data-target="#datos">Buscar</button>     
        </div> 
        
        <div class="container col-lg-12 center-block">  
        <div id="datos" class="collapse">

                    <div class="row datos">
            
            
                     <h2 class="center">Datos del cliente</h2>
                     <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="evento1" class="control-label">Tipo de Evento</label>
                        <input type="text" class="form-control" id="evento" placeholder="Tipo de evento">
                      <select class="selectpicker form-control" id="evento">
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
                     </select>

                    </div>
                </div>
            
            
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="nombre1" class="control-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="apellido1" class="control-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" placeholder="Apellido">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nombre2" class="control-label">Nombre 2</label>
                        <input type="text" class="form-control" id="nombre2" placeholder="Nombre 2">
                    </div>
                </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="apellido2" class="control-label">Apellido 2</label>
                        <input type="text" class="form-control" id="apellido2" placeholder="Apellido 2">
                    </div>
                </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefono1" class="control-label">Teléfono</label>
                        <input type="text" class="form-control" id="curp" placeholder="Teléfono">
                    </div>
                </div>
            
              <div class="col-md-3">
                    <div class="form-group">
                        <label for="celular1" class="control-label">Celular 1</label>
                        <input type="text" class="form-control" id="celular1" placeholder="Celular 1">
                    </div>
            </div>
            
             <div class="col-md-3">
                    <div class="form-group">
                        <label for="Emai1" class="control-label">Email 1</label>
                        <input type="text" class="form-control" id="email1" placeholder="Email 1">
                    </div>
            </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="Calle1" class="control-label">Calle</label>
                        <input type="text" class="form-control" id="calle" placeholder="Calle">
                    </div>
                </div>
            
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="colonia1" class="control-label">Colonia</label>
                        <input type="text" class="form-control" id="Colonia" placeholder="Colonia">
                    </div>
            </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="cp" class="control-label">CP</label>
                        <input type="text" class="form-control" id="CP" placeholder="Estado">
                    </div>
                </div>
            
               <div class="col-md-3">
                    <div class="form-group">
                        <label for="estado1" class="control-label">Estado</label>
                        <input type="text" class="form-control" id="estado" placeholder="Estado">
                    </div>
                </div>
            
             <div class="col-md-3">
                    <div class="form-group">
                        <label for="Ciudad1" class="control-label">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" placeholder="Ciudad">
                    </div>
                </div>
            
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="fax1" class="control-label">Fax</label>
                        <input type="text" class="form-control" id="fax" placeholder="Fax">
                    </div>
            </div>
            
          
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="celular2" class="control-label">Celular 2</label>
                        <input type="text" class="form-control" id="celular2" placeholder="Celular 2">
                    </div>
            </div>
            
           
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="Email2" class="control-label">Email 2</label>
                        <input type="text" class="form-control" id="email2" placeholder="Email 2">
                    </div>
            </div>
       
</div>     
            --Termina la parte del cliente--
            
             <div class="container col-lg-12">
	<div class="row">
		<h2>Datos adicionales de la empresa</h2>
	</div>
        <div class="row">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="empresa1" class="control-label">Empresa</label>
                        <input type="text" class="form-control" id="empresa" placeholder="Empresa">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="contacto1" class="control-label">contacto</label>
                        <input type="text" class="form-control" id="contacto" placeholder="Contacto">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cargo1" class="control-label">Cargo</label>
                        <input type="text" class="form-control" id="cargo" placeholder="Cargo">
                    </div>
                </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="rcf1" class="control-label">RCF</label>
                        <input type="text" class="form-control" id="rcf" placeholder="RCF">
                    </div>
                </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="curp1" class="control-label">Curp</label>
                        <input type="text" class="form-control" id="curp" placeholder="Curp">
                    </div>
                </div>
            
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="Calle" class="control-label">Calle</label>
                        <input type="text" class="form-control" id="calle" placeholder="Calle">
                    </div>
                </div>
            
             <div class="col-md-3">
                    <div class="form-group">
                        <label for="colonia1" class="control-label">Colonia</label>
                        <input type="text" class="form-control" id="Colonia" placeholder="Colonia">
                    </div>
            </div>
            
             <div class="col-md-3">
                    <div class="form-group">
                        <label for="cp" class="control-label">CP</label>
                        <input type="text" class="form-control" id="CP" placeholder="Estado">
                    </div>
                </div>
            
               <div class="col-md-3">
                    <div class="form-group">
                        <label for="estado1" class="control-label">Estado</label>
                        <input type="text" class="form-control" id="estado" placeholder="Estado">
                    </div>
                </div>
            
             <div class="col-md-3">
                    <div class="form-group">
                        <label for="Ciudad1" class="control-label">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" placeholder="Ciudad">
                    </div>
                </div>
            
            
            Terinan los datos del cliente
     
     </div>                
    </div>
    </div>       
    </div> 
      </div>       
     </div>
   </div>
  
    </div>
    
                        
                          --Empiza la consulta de pedido--
                          
                         <div class="tab-pane fade in " id="consultar">
                    <div class="container col-lg-12">
                <div class="panel panel-info">
                  <div class="panel-heading">Consultar pedido</div>
                  <div class="panel-body">

                   <div class="container col-lg-12 center-block">      
                        <label for="consultar" class="control-label col-lg-4">Consultar pedido</label>
                         <input type="text" class="form-control col-lg-4" id="buscar" placeholder="Consultar pedido">
                      <button id="consultar" class="btn btn-info right col-lg-4">consultar</button>     
                      </div>    
                        
                        
                      
                  </div>
                  </div>    
                  </div>
                   </div>
                       
                      
                           el content tab trermina aqui -  
                        <div class="clearfix"></div>
                        </div>
                   
                    </section>
                      </form> 
       
       
       
       
      jQuery   
-->     <script src="../js/jquery.js" type="text/javascript"></script>
<!--     Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <script src="../js/Historias.js" type="text/javascript"></script>
    
 
       
   </body>
        </html>
        
        <?php
        
}
        ?>



 

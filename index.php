<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>     
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
<title>Login</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/default.css" rel="stylesheet" type="text/css"/>
        <link href="css/alertify.css" rel="stylesheet" type="text/css"/>
        
</head>
<body style="background-color:#0b0b61;">

<div class="row" id="pwd-container">
<div class="col-md-4"></div>
<div class="col-md-4">
<section class="login-form">
<form method="POST" role="login">
<img src="img/header-bg.jpg" class="img-responsive" alt="Historias"/>
 <input type="text" id="user" placeholder="Usuario" class="form-control input-lg" />
 <input type="password" class="form-control input-lg" id="password" placeholder="Contraseña" />
<button type="button" id="entrarSistema" class="btn btn-lg btn-primary btn-block">Ingresar</button>
</form>
<div class="form-links">
<a href="http://www.historiasenpapel.com" style="color:WHITE;">Página Oficial</a>
</div>
</section>  
</div>
<div class="col-md-4"></div>
</body>
</html>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/alertify.js" type="text/javascript"></script>
<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function(){
            console.log('ready');
		$('#entrarSistema').click(function(){
                    console.log('click');
			 if($('#user').val()==""){
				alertify.alert("Error !","Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Error !","Debes agregar la contraseña");
				return false;
			} 
                        
                        cadena = "user=" + $('#user').val()+
                                "&password=" + $('#password').val();
                        
                        console.log(cadena);
                        $.ajax({                            
                            type:"POST",
                            url: "code/login.php",
                            data: cadena,
                            success: function (r){
                                console.log(r);
                                if (r==1){
                                    
                                   window.location="Modulos/Principal.php"; 
                              
                                }else{
                                    
                                  alertify.alert("ERROR ! :(","Cuenta o contraseña incorrectos", function(){ alertify.success("Vuelva a intentarlo"); });
                                }
                                
                            }
                            
                            
                        });
                    
		});	
	});
</script>




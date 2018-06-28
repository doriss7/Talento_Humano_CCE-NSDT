
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GESTALHUM</title>
    <link href="estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilos/css/sb-admin.css" rel="stylesheet"> 
    <link href="estilos/css/plugins/morris.css" rel="stylesheet"> 
    <link href="estilos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body >

    <div id="wrapper" >
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Nombre del modulo -->
                <a class="navbar-brand">GESTION DE TALENTO HUMANO</a>
            </div>
                             
          
        </nav>
        </div>
        <nav class="navbar navbar-inverse " role="navigation">
              <div class="container-fluid">            
                <div class="row">
                    <div class="col-lg-12">                    
                           <div class="col-md-6">
                           <!-- Imagen del Login -->
                            <img src="login.jpg" alt="" width="600" height="400">
                            </div>
                            <div class="col-md-4">
                              <h5>&nbsp;</h5> 
                            	<h3 class="page-header">
                               
 	<form role="form" onSubmit="javascript:valida()" name="login" action="php/login.php" method="post" id="login">
		  <div class="form-group">
		    <label for="username"><i class="fa fa-user"></i> USUARIO</label>
            <input type="text"  class="form-control" id="username" name="username" placeholder="USUARIO" autofocus required  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">   
            <h5>&nbsp;</h5>  
        	<label for="password"><i class="fa fa-key"></i> PASSWORD</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="PASSWORD" required>         
		 	<h5>&nbsp;</h5>
            <button type="submit" class="btn btn-default"> LOGIN</button>
         	<button name="Restablecer" class="btn btn-default" type="reset" >LIMPIAR</button>
    </form>
   		</h3>
                            </div>                     
                    </div>
                </div>                
            </div>
        </div>
        </nav>
    <!-- jQuery -->
    <script src="estilos/js/bootstrap.min.js"></script> 

    <!-- Morris Charts JavaScript -->
    <script src="estilos/js/plugins/morris/raphael.min.js"></script>
    <script src="estilos/js/plugins/morris/morris.min.js"></script>
    <script src="estilos/js/plugins/morris/morris-data.js"></script>
</body>

</html>


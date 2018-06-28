<?php
session_start();	
include ("../php/conexion.php");
$sql1= "select * from solicitudes where estado='PENDIENTE'";	
						
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GETALHUM</title>

    <!-- Bootstrap Core CSS -->
    <link href="../estilos/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../estilos/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../estilos/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../estilos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"  href="paneldecontrol.php">GETALHUM</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                    <a href="#" ><i class="fa fa-user"></i> HOLA <?php echo $_SESSION["usuario"]?></a>
                   
                </li>
                <li>
                   <a href="../php/logout.php" ><i class="fa fa-fw fa-power-off"></i> SALIR</a>
                   
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="nomina.php" class="h4"><i class="fa fa-backward"></i> REGRESAR</a>
                    </li>
                                         
            </div>
            <!-- /.navbar-collapse -->
        </nav>

<div id="page-wrapper">
	<div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
         
            <div >

            <div class="row" >
			<form enctype="multipart/form-data" role="form" id="registroempleado" onSubmit="javascript:valida()" name="registroempleado" action="../php/registroempleado.php" method="post">
		    <div class="col-md-4">
            <label for="canton">NOMBRE:</label>
            <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="INGRESE NOMBRE"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="col-md-4">
            <label for="canton">APELLIDO:</label>
            <input required type="text" class="form-control" id="apellido" name="apellido" placeholder="INGRESE APELLIDO"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">             
            </div>
            <div class="col-md-4">
            <label for="canton">CEDULA:</label>
            <input required type="text" class="form-control" id="cedula" name="cedula" placeholder="INGRESE CEDULA"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">             
            </div>
            <div class="col-md-4">
            <label for="canton">EDAD:</label>
            <input required type="text" class="form-control" id="edad" name="edad" placeholder="INGRESE EDAD"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">             
            </div>
            <div class="col-md-4">
            <label for="estadocivil">ESTADO CIVIL:</label>
                                <select name="estadocivil" form="registroempleado" class="form-control" size="1">
                              
                                <option value="SOLTERO">SOLTERO</option>
                                <option value="CASADO">CASADO</option>
                                <option value="VIUDO">VIUDO</option>
                                <option value="DIVORCIADO">DIVORCIADO</option>
                                <option value="UNION LIBRE">UNION LIBRE</option>
                            </select>            
            </div>
            
            <div class="col-md-4">
            <label for="comentario">NACIONALIDAD</label>
		    <input required type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="INGRESAR NACIONALIDAD"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="col-md-4">
            <label for="comentario">DIRECCIÓN</label>
		    <input required type="text" class="form-control" id="direccion" name="direccion" placeholder="INGRESAR DIRECCIÓN"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="col-md-4">
            <label for="comentario">EMAIL</label>
		    <input required type="text" class="form-control" id="email" name="email" placeholder="INGRESAR EMAIL"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="col-md-4">
            <label for="comentario">TELEFONO</label>
		    <input required type="text" class="form-control" id="telefono" name="telefono" placeholder="INGRESAR TELEFONO"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="col-md-4">
            <label for="comentario">FECHA DE INGRESO</label>
		    <input required type="date" class="form-control" id="fechaini" name="fechaini" placeholder="FECHA DE INGRESO"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="col-md-4">
            <label for="comentario">CARGO</label>
		    <input required type="text" class="form-control" id="cargo" name="cargo" placeholder="INGRESAR CARGO APLICADO"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
            <div class="col-md-4">
            <label for="comentario">REMUNERACIÓN</label>
		    <input required type="text" class="form-control" id="remuneracion" name="remuneracion" placeholder="INGRESAR REMUNERACIÓN"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
			<div class="col-md-12">
            <label for="comentario">FOTO</label>
		    <input required name="userfile" type="file"  class="btn btn-default">
            </div>
			<div class="col-md-12">
            <p>&nbsp; </p>
		  <button type="submit" class="btn btn-default">REGISTRAR EMPLEADO</button>
          </div>
		</form>
        </div> 
      </div>
   </div>
</div>


    <!-- jQuery -->
    <script src="../estilos/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../estilos/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../estilos/js/plugins/morris/raphael.min.js"></script>
    <script src="../estilos/js/plugins/morris/morris.min.js"></script>
    <script src="../estilos/js/plugins/morris/morris-data.js"></script>
	



</body>

</html>
<?php
session_start();	
include ("../php/conexion.php");
$sql1= "select * from solicitudes where cedula=\"$_SESSION[cedula]\" and estado=\"PENDIENTE\"";		
			
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
                        <a href="paneldecontrol.php" class="h4"><i class="fa fa-backward"></i> REGRESAR</a>
                    </li>
                  
                                           
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div >

            <div class="row">
			<form role="form" id="solicitar" onSubmit="javascript:valida()" name="solicitar" action="../php/solicitar.php" method="post">
		    <div class="col-md-2">
            <label for="motivo">Motivo</label>
                            <select name="motivo" form="solicitar" class="form-control" size="1">
                                <option value="VACACIONES">Vacaciones</option>
                                <option value="BODA">Boda</option>
                                <option value="MATERNIDAD">Maternidad</option>
                                <option value="PATERNIDAD">Paternidad</option>
                                <option value="DEFUNCION">Defuncion</option>
                                <option value="ENFERMEDAD">Enfermedad</option>
                                <option value="MUDANZA">Mudanza</option>
                            </select>
            </div>
            <div class="col-md-2">
		    <label for="fechaini">Fecha Inicio</label>
		    <input type="date" class="form-control" id="fechaini" name="fechaini" placeholder="" required>
            </div>
            <div class="col-md-2">
            <label for="fechafin">Fecha Final</label>
		    <input type="date" class="form-control" id="fechafin" name="fechafin" placeholder="" required>
		    </div>
            <div class="col-md-6">
            <label for="comentario">Observaciones</label>
		    <input type="text" class="form-control" id="observacion" name="observacion" placeholder="Añadir comentario (opcional)"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            <input type="hidden" class="form-control" id="cedula" name="cedula" value="<?php echo $_SESSION["cedula"]?>">
            <input type="hidden" class="form-control" id="estado" name="estado" value="<?php echo 'PENDIENTE'?>">
		    </div>
			<div class="col-md-12">
            <p>&nbsp; </p>
		  <button type="submit" class="btn btn-default">Solicitar permiso</button>
          </div>
		</form>
        <div class="col-md-12">
        <?php $query = $con->query($sql1);?>
           <table class="table table-striped table-inverse">
           
  <thead>
  <p>&nbsp; </p>
  <tr><h4><strong>Solicitudes Pendientes</strong></h4></tr>
    <tr>
      <th>Desde</th>
      <th>Hasta</th>
      <th>Motivo</th>
      <th>Observacion</th>
      <th>Estado</th>
    </tr>
  </thead>
  <tbody>
  
<?php while ($r=$query->fetch_array()) {?>
    <tr>
      <td><?php echo $r['fechaini'];?></td>
      <td><?php echo $r['fechafin'];?></td>
      <td><?php echo $r['motivo'];?></td>
      <td><?php echo $r['observacion'];?></td>
      <td><?php echo $r['estado'];?></td>
      <td> <form role="form" onSubmit="javascript:valida()" name="cancelar" action="../php/cancelarsolicitud.php" method="post" id="cancelar" class="fa fa-se">
                            <button type="submit" class="">Cancelar</button>
                            <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
           </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
          </div>
                        
                    </div>
                </div>                   
            </div>
        </div>
    </div>
    
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>

</html>
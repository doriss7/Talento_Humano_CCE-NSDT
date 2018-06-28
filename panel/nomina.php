<?php
session_start();	
include ("../php/conexion.php");

/*$sql1= "select * from solicitudes where cedula=\"$_SESSION[cedula]\"";*/	

$sql1= "select * from empleados";	
						
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
    <link href="../estilos/css/bootstrap.min.css" rel="stylesheet">
    <link href="../estilos/css/sb-admin.css" rel="stylesheet">
    <link href="../estilos/css/plugins/morris.css" rel="stylesheet">
    <link href="../estilos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"  href="paneldecontrol.php">GETALHUM</a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li>
                    <a href="../panel/perfiles.php" ><i class="fa fa-user"></i> HOLA <?php echo $_SESSION["usuario"]?></a>
                </li>
                <li>
                   <a href="../php/logout.php" ><i class="fa fa-fw fa-power-off"></i> SALIR</a>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                     <li class="active">
                        <a href="paneldecontrol.php" class="h4"><i class="fa fa-backward"></i> REGRESAR</a>
                    </li>
                    <li>
                        <a href="nuevoempleado.php" class="h4"><i class="fa fa-user"></i> NUEVO</a>
                    </li>
                    <!--<li>
                        <a href="buscarempleado.php" class="h4"><i class="fa fa-search"></i> BUSCAR</a>
                    </li>  -->                      
            </div>
          </nav>

<div id="page-wrapper">
	<div class="container-fluid">
      <div class="row">        
           <div class="col-lg-2">          
           </div>
          <div class="col-lg-12">
           <?php $query = $con->query($sql1);?>            
           <table class="table table-striped table-inverse">
           <thead>
    		<tr>
      		<th>Cedula</th>
      		<th>Nombre</th>
      		<th>Cargo</th>
      		<th>Email</th>
      		<th>Telefono</th>
    	   </tr>
  		   </thead>
<tbody>  
<?php while ($r=$query->fetch_array()) {?>
    <tr>
        <?php 
			$sql2= "select * from empleados where cedula=\"$r[cedula]\"";
			$query2 = $con->query($sql2);
			while ($r2=$query2->fetch_array()) {
		?>
    
      <td><?php echo $r['cedula'];?></td>
      <td><?php echo $r2['nombre'];?> &nbsp; <?php echo $r2['apellido'];}?></td>
      <td><?php echo $r['cargo'];?></td>
      <td><?php echo $r['email'];?></td>
      <td><?php echo $r['telefono'];?></td>
      <td>
      	  <form role="form" onSubmit="javascript:valida()" name="aceptar" action="../panel/perfiles.php" method="post" id="aceptar">
          <input type="hidden" id="cedula" name="cedula" value="<?php echo $r['cedula'];?>">
          <button type="submit" class="">Mas Información</button>
          </form>
      </td>
    </tr>
    <?php } ?>
</tbody>
</table>
          </div>
          <div class="col-lg-12">   
          </div>
      </div>
   </div>
</div>
    <script src="../estilos/js/jquery.js"></script>
    <script src="../estilos/js/bootstrap.min.js"></script>
    <script src="../estilos/js/plugins/morris/raphael.min.js"></script>
    <script src="../estilos/js/plugins/morris/morris.min.js"></script>
    <script src="../estilos/js/plugins/morris/morris-data.js"></script>

</body>
</html>

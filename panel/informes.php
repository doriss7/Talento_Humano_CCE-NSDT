<?php
session_start();	
include ("../php/conexion.php");

$sql1= "select *,max(id) as mayor from solicitudes where cedula=\"$_SESSION[cedula]\" and estado='ACEPTADA'";	
$query = $con->query($sql1);
while ($r=$query->fetch_array()) {
$mayor=$r['mayor'];	
}

$sql1= "select *from solicitudes where id=\"$mayor\"";						
?>
<!DOCTYPE html>
<html lang="en">

<head>
<style type="text/css">
@media print {
    div,a {display:block}
    .ver {display:block}
    .nover {display:none}
}
</style>

<script>
function impre(num) {
    document.getElementById(num).className="ver";
    print();
    document.getElementById(num).className="nover";
}
</script>

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
    <link href="../estilos/css/fullcalendar.min.css" rel="stylesheet" type="text/css">
    <link href="../estilos/css/fullcalendar.print.css" rel="stylesheet" type="text/css" media="print">
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
                    <!--<li>
                        <a href="#" class="h4"><i class="fa fa-calendar-o"></i> ULTIMA SOLICITUD</a>
                    </li>-->
                    <li>
                        <a href="#" onclick="impre('perfil');return false" class="h4"><i class="fa fa-print"></i> IMPRIMIR</a>
                   
                    </li> 
                    <li>
                        <hr><a href="historial.php" class="h4"><i class="fa fa-history"></i> HISTORIAL</a>
                    </li>
                                           
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        
<div id="page-wrapper" >
	<div class="container-fluid">
      <div class="row">
      <div class="col-lg-12" align="rigth"><h5>Ultima solicitud aceptada. Imprimir esta solicitud, hacer firmar de jefe de personal y entregarla  en guardinía.<hr></h5></div>
      </div>
    </div>
</div>


<div id="page-wrapper" >
	<div class="container-fluid">
      <div class="row" id="perfil">
          
           <div class="col-lg-12" align="center"><h3><strong>SOLICITUD DE PERMISO</strong><hr></h3></div>
           <div class="col-lg-12" align="rigth">
           <?php 
		    $query = $con->query($sql1);
			$sql2= "select * from empleados where cedula=\"$_SESSION[cedula]\"";
			$query2 = $con->query($sql2);
			while ($r2=$query2->fetch_array()) {
			?>
     		<h4><strong>NOMBRE:</strong>&nbsp<?php echo $r2['nombre'];?> &nbsp; <?php echo $r2['apellido'];}?></h4>
           </div>
           <div class="col-lg-5" align="rigth"><h4><strong>DIAS SOLICITADOS:</strong>&nbsp;
           <?php while ($r=$query->fetch_array()) { 
		   
		   function dias_transcurridos($fecha_i,$fecha_f)
					{
						$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
						$dias 	= abs($dias); $dias = floor($dias);		
						return $dias;
					}
			echo dias_transcurridos($r['fechaini'],$r['fechafin']);
			?></h4>
           </div>
           <div class="col-lg-4" align="rigth"><h4><strong>INICIO:</strong> &nbsp;<?php echo $r['fechaini'];?></h4></div>
           <div class="col-lg-3" align="rigth"><h4><strong>FIN:</strong> &nbsp;<?php echo $r['fechafin'];?></h4></div>
           <div class="col-lg-12" align="center"><h3><strong>DETALLE</strong><hr></h3></div>
           <div class="col-lg-12" align="rigth"><h4><strong>MOTIVO:</strong> &nbsp;<?php echo $r['motivo'];?></h4></div>
           <div class="col-lg-12" align="rigth"><h4><strong>OBSERVACIONES:</strong> &nbsp;<?php echo $r['observacion'];?></h4></div>
           <div class="col-lg-12">&nbsp;</div>
           <div class="col-lg-12">&nbsp;</div>
           <div class="col-lg-12" align="center"><h4>
           <table>
           <tr>
           <td><h4><hr>JEFE DE PERSONAL</h4></td>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td><h4><hr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; EMPLEADO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></td>
           </tr>
           </table>
           </h4></div>
		 <?php } ?>
         </div>
      </div>
   </div>
</div>
    <!-- jQuery -->
    <script src="../estilos/js/jquery.js"></script>
    <script src="../estilos/js/bootstrap.min.js"></script>
    <script src="../estilos/js/plugins/morris/raphael.min.js"></script>
    <script src="../estilos/js/plugins/morris/morris.min.js"></script>
    <script src="../estilos/js/plugins/morris/morris-data.js"></script>
    <script src="..estilos/bootstrap3/js/bootstrap.min.js"></script>
</body>

</html>

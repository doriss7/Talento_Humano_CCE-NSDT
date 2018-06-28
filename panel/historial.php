<?php
session_start();	
include ("../php/conexion.php");

$sql1= "select * from solicitudes where cedula=\"$_SESSION[cedula]\"";


if($_SESSION["tipo"]=='USUARIO'){
	$newtipo = 1;
}	
if($_SESSION["tipo"]=='ADMINISTRADOR'){
	$newtipo = 2;
}					
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
    <link href="../estilos/css/fullcalendar.min.css" rel="stylesheet" type="text/css">
    <link href="../estilos/css/fullcalendar.print.css" rel="stylesheet" type="text/css" media="print">

</head>

<script>


	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '2017-01-12',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo json_encode($thejson); ?>
		});
		
	});

</script>
<script src='../estilos/js/moment.min.js'></script>
<script src='../estilos/css/fullcalendar.min.js'></script>

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
                        <a href="informes.php" class="h4"><i class="fa fa-backward"></i> REGRESAR</a>
                    </li>                   
            </div>
            <!-- /.navbar-collapse -->
        </nav>

<div id="page-wrapper">
	<div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
         
           <div class="col-lg-2">
         
          </div>
          <div class="col-lg-12">
           <?php $query = $con->query($sql1);?>
            
           <table class="table table-striped table-inverse">
           
  <thead>
  <tr><h3>HISTORIAL DE SOLICITUDES</h3></tr>
    <tr>
      <th>Motivo</th>
      <th>Observacion</th>
      <th>Desde</th>
      <th>Hasta</th>
      <th>Estado</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  
<?php while ($r=$query->fetch_array()) {?>
    <tr>
      <td><?php echo $r['motivo'];?></td>
      <td><?php echo $r['observacion'];?></td>
      <td><?php echo $r['fechaini'];?></td>
      <td><?php echo $r['fechafin'];?></td>
      <td><?php echo $r['estado'];?></td>
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


    <!-- jQuery -->
    <script src="../estilos/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../estilos/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../estilos/js/plugins/morris/raphael.min.js"></script>
    <script src="../estilos/js/plugins/morris/morris.min.js"></script>
    <script src="../estilos/js/plugins/morris/morris-data.js"></script>
    <script src="../estilos/bootstrap3/js/bootstrap.min.js"></script>
	


</body>

</html>

<?php
session_start();	
include ("../php/conexion.php");

$sql= "select * from empleados where cedula=\"$_POST[cedula]\"";	
						
?>
<!DOCTYPE html>
<html lang="en">
<head>

///*funcion para imprimir el perfil del empleado*/
<style type="text/css">
@media print {
    div {page-break-inside: avoid;}
    div,a {display:block}
    .ver {display:block}
    .nover {display:none}
}
</style>

<script>
function imprimir(num) {
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
                    <a href="#" ><i class="fa fa-user"></i> HOLA <?php echo $_SESSION["usuario"]?></a>
                </li>
                <li>
                   <a href="../php/logout.php" ><i class="fa fa-fw fa-power-off"></i> SALIR</a>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                     <li class="active">
                        <a href="nomina.php" class="h4"><i class="fa fa-backward"></i> REGRESAR</a>
                    </li>
                    <li>
                        <a href="nuevoempleado.php" class="h4"><i class="fa fa-user"></i> NUEVO</a>
                    </li>
                    <li>
                        <a href="#" onclick="imprimir('perfil');return false" class="h4"><i class="fa fa-print"></i> IMPRIMIR</a>
                   
                    </li>                      
            </div>
          </nav>
<?php



$result = $con->query($sql); //usamos la conexion para dar un resultado a la variable

if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
while ($row = $result->fetch_array(MYSQLI_ASSOC))
{
	
?>	

<div id="page-wrapper">
<div id="perfil">
	<div class="container-fluid">
      <div class="row">
      	<div class="col-lg-12" align="center"><h1>PERFIL DEL EMPLEADO</h1><hr></div>
      </div>
      <div class="row" align="center"> 
      <div class="col-lg-12">
           <table>        
			<tr><td>
			<?php echo "<img WIDTH='200' HEIGHT='200' src='data:imagen/jpeg;base64,".base64_encode($row["foto"])."'/> ";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>            
            <td>
            <table>
          	<tr><td><strong>&raquo;NOMBRES:</strong></td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $row['nombre'];?>&nbsp;<?php echo $row['apellido'];?></td>  
          	<tr><td><strong>&raquo;CEDULA:</strong></td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $row['cedula'];?></td></tr>
            <tr><td><strong>&raquo;EDAD:</strong></td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $row['edad'];?></td></tr>
            <tr><td><strong>&raquo;ESTADO CIVIL:</strong></td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $row['estadocivil'];?></td></tr>
          	<tr><td><strong>&raquo;NACIONALIDAD:</strong></td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $row['nacionalidad'];?></td></tr>
            <tr><td><strong>&raquo;DIRECCIÓN:</strong></td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $row['direccion'];?></td></tr>
            <tr><td><strong>&raquo;EMAIL:</strong></td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $row['email'];?></td></tr>
            <tr><td><strong>&raquo;TELEFONO:</strong></td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $row['telefono'];?></td></tr>
            <tr><td><strong>&raquo;CARGO:</strong></td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $row['cargo'];?></td></tr>
            <tr><td><strong>&raquo;FECHA DE INICIO:</strong></td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $row['fechaini'];?></td></tr>
            <tr><td><strong>&raquo;REMUNERACIÓN:</strong></td><td>&nbsp;&nbsp;&nbsp;</td><td><?php echo $row['remuneracion'];?></td></tr>
            </table>
          	</td>
            </tr>
            </table>
      </div>
      </div>      
   </div>
</div>
<?php }} ?>
       

   <script src="../estilos/js/jquery.js"></script>
    <script src="../estilos/js/bootstrap.min.js"></script>
    <script src="../estilos/js/plugins/morris/raphael.min.js"></script>
    <script src="../estilos/js/plugins/morris/morris.min.js"></script>
    <script src="../estilos/js/plugins/morris/morris-data.js"></script>

</body>
</html>

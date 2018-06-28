<?php 
include "conexion.php";
$sql1= "update solicitudes set estado=\"ACEPTADA\" where id=\"$_POST[id]\"";	
$query = $con->query($sql1);
						if($query!=null){
print "<script>alert(\"Solicitud procesada correctamente\");window.location='../panel/paneldecontrol.php';</script>";
						}
?>
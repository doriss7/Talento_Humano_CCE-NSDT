<?php 
include "conexion.php";
$sql1= "update solicitudes set estado=\"RECHAZADA\" where id=\"$_POST[id]\"";	
$query = $con->query($sql1);
						if($query!=null){
print "<script>alert(\"Solicitud rechazada correctamente\");window.location='../panel/paneldecontrol.php';</script>";
						}
?>
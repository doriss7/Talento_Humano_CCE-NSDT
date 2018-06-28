<?php 
include "conexion.php";

$sql1="delete from solicitudes where id=\"$_POST[id]\"";
$query = $con->query($sql1);
			if($query!=null){
print "<script>alert(\"Solicitud cancelada exitosamente.\");window.location='../panel/solicitardias.php';</script>";
}
?>
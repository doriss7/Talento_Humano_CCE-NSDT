<?php
include "conexion.php";

		
	
$sql = "insert into solicitudes(id,cedula,fechaini,fechafin,motivo,observacion,estado) value 				(null,\"$_POST[cedula]\",\"$_POST[fechaini]\",\"$_POST[fechafin]\",\"$_POST[motivo]\",\"$_POST[observacion]\",\"$_POST[estado]\");";

						$query = $con->query($sql);
						if($query!=null){
						print "<script>alert(\"Solicitud procesada correctamente\");window.location='../panel/solicitardias.php';</script>";
						}
	

?>
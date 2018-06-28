<?php
include "conexion.php";

$imagenEscapes=$con->real_escape_string(file_get_contents($_FILES["userfile"]["tmp_name"]));
$found=false;
$found1=false;
	$sql1= "select * from empleados where cedula=\"$_POST[cedula]\"";
	$query = $con->query($sql1);
	while ($r=$query->fetch_array()) {
			$found=true;
				break;
			}
		if($found){
			print "<script>alert(\"Cedula ya registrado.\");window.location='../panel/nuevoempleado.php';</script>";
		}else{
			$sql1= "select * from empleados where email=\"$_POST[email]\"";
			$query = $con->query($sql1);
			while($r=$query->fetch_array()){
				$found1=true;
				break;
			}
			if($found1){
				print "<script>alert(\"Email ya registrado.\");window.location='../panel/nuevoempleado.php';</script>";
			}else{
$sql = "INSERT INTO `talentohumano`.`empleados` (`cedula`, `nombre`, `apellido`, `edad`, `nacionalidad`, `estadocivil`, `direccion`, `email`, `telefono`, `foto`, `fechaini`, `cargo`, `remuneracion`) VALUES (\"$_POST[cedula]\",\"$_POST[nombre]\",\"$_POST[apellido]\",\"$_POST[edad]\", \"$_POST[nacionalidad]\",\"$_POST[estadocivil]\",\"$_POST[direccion]\",\"$_POST[email]\",\"$_POST[telefono]\",'".$imagenEscapes."',\"$_POST[fechaini]\", \"$_POST[cargo]\",\"$_POST[remuneracion]\");";

$sql2 = "INSERT INTO `talentohumano`.`usuarios` (`id`, `cedula`, `usuario`, `password`, `tipo`) VALUES (null,\"$_POST[cedula]\", \"$_POST[email]\",\"$_POST[cedula]\", 'USUARIO');";

$query = $con->query($sql);
$query1 = $con->query($sql2);
	if($query!=null){
		if($query1!=null){
		print "<script>alert(\"Registro exitoso.\");window.location='../panel/nomina.php';</script>";
		}
	}
				}
		}
	


?>
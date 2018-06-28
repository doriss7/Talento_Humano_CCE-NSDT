<?php
if(!empty($_POST))
{
	if(isset($_POST["username"]) &&isset($_POST["password"]))
	{
		if($_POST["username"]!=""&&$_POST["password"]!="")
		{
		include "conexion.php";
		$user_id=null;
		$sql1= "select * from usuarios where (usuario=\"$_POST[username]\") and password=\"$_POST[password]\"";

			$query = $con->query($sql1);
			while ($r=$query->fetch_array())
			{
			$usuario=$r["usuario"];
			$user_id=$r["id"];
			$cedula=$r["cedula"];
			$tipo=$r["tipo"];
			break;
			}
			
			if($user_id==null)
			{
				print "<script>alert(\"USUARIO O PASSWORD INCORRECTOS.\");window.location='../index.php';</script>";
			}else{
			session_start();
			$_SESSION["user_id"]=$user_id;
			$_SESSION["usuario"]=$usuario;
			$_SESSION["cedula"]=$cedula;
			$_SESSION["tipo"]=$tipo;
				/*if($tipo=='ADMINISTRADOR'){*/
				print "<script>window.location='../panel/paneldecontrol.php';</script>";			
				/*}else{
					print "<script>window.location='../panel/solicitardias1.php';</script>";
					}*/
			}
			}
		}
}

?>
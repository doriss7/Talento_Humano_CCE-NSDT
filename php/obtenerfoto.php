<?php
include "conexion.php";


    // Consulta de búsqueda de la imagen.
	
	$sql="SELECT* from empleados";

	$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable

if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
while ($row = $result->fetch_array(MYSQLI_ASSOC))
{

echo "src='data:foto/jpeg;base64,".base64_encode($row["foto"]). "'";
}
}
else
{
echo "<CENTER><font color='white'>No hubo resultados</font></CENTER>";
}

$conexion->close(); //cerramos la conexión

?>
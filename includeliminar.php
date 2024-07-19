<?php
$codigo=$_POST['codigo'];
if (empty($codigo)) 
{
	echo "<p>no puede estar vacio</p>";
}else{
	if (!is_numeric($codigo)) 
	{
		echo "<p>tiene que ser un numero</p>";
	}else{
		$SQL= "delete from $tabla where $codigos=$codigo";
		$consul = mysqli_query($enlace,$SQL);
		//Verificamos que la consulta sea exitosa
		if($consul == false){
		echo "Error al consultar datos: ".mysqli_error($enlace);
		}else{
		echo "Los datos se han consultado correctamente ";
		}
	}
}
?>
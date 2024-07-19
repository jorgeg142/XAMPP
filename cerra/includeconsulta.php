<?php
$codigo=$_POST['codigo'];
	$SQL= "select * from $tabla where $codigos=$codigo";
$consul = mysqli_query($enlace,$SQL);
//Verificamos que la consulta sea exitosa
if($consul == false){
echo "Error al consultar datos: ".mysqli_error($enlace);
}else{
echo "Los datos se han consultado correctamente ";
	}
?>
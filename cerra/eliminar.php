<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body style="background-color:#3fc5f0; background-size: cover; background-repeat: no-repeat; background-position: center center;background-attachment:fixed ";>
<div style="width:40%;margin-left:auto; margin-right:auto">
<h1>Para eliminar un registro</h1><br>
<form action="eliminar.php" method="POST">
Seleccione una tabla:<br>
<select name="tabla">
	<option> ninguno </option>
<option value="producto">producto</option>
<option value="det_producto">det_producto</option>
<option value="factura">factura</option>
<option value="det_servicio">det_servicio</option>
<option value="servicio">servicio</option>
</select>    <input type="submit" value="eliminar todos los datos" class="btn btn-danger" name="eliminartodo"><br>
ponga el codigo: <br>
codigo<br><INPUT TYPE="text" NAME="codigo" class="form-control"><BR>
<input type="submit" value="eliminar un registro" class="btn btn-warning" name="enter"><br><br>
<INPUT TYPE="submit" VALUE="volver a pag anterior" class="btn btn-primary" name="volver"><br>
<?php
$server='localhost';
	$user="id11576017_cerrajeria";
	$contra='jorge142';
	$based="id11576017_cerrajeria";
	$enlace = mysqli_connect($server,$user,$contra,$based);
	if(!$enlace){
		echo"Error de conexión: ".mysqli_connect_error();
	}else{
		echo "conectado a: $based <br>";
	}
//---------------------------------------------------
	if (isset($_POST['enter'])) 
{
	$tabla=$_POST['tabla'];
	switch ($tabla) {
		case 'producto':
			$codigos='cod_producto';
			include ('includeliminar.php');
			include('impresionproducto.php');
		break;
		case 'det_producto':
			$codigos='cod_producto';
			include ('includeliminar.php');
			include('impresiondetproduc.php');
		break;
		case 'factura':
			$codigos='num_factura';
			include ('includeliminar.php');
			include('impresionfactura.php');
		break;
		case 'det_servicio':
			$codigos='servicio_cod_servicio';
			include ('includeliminar.php');
			include('impresiondelservicio.php');
		break;
		case 'servicio':
			$codigos='cod_servicio';
			include ('includeliminar.php');
			include('impresionservicio.php');
		break;
	}
}
if (isset($_POST['volver'])) 
{
	echo "<script>location.href='index.php';</script>";
}
//---------------------------------------------
if (isset($_POST['eliminartodo'])) 
{
	$tabla=$_POST['tabla'];
	$query = "delete from $tabla";
	$consul = mysqli_query($enlace,$query);
	//Verificamos que la consulta sea exitosa
	if($consul == false){
	echo "Error al eliminar datos: ".mysqli_error($enlace);
	}else{
	echo "Los datos se han eliminado correctamente ";
	}
//--------------------------------------------------------
$tabla=$_POST['tabla'];
	switch ($tabla) 
	{
		case 'producto':
			include('impresionproducto.php');
		break;
		case 'det_producto':
			include('impresiondetproduc.php');
		break;
		case 'factura':
			include('impresionfactura.php');
		break;
		case 'det_servicio':
			include('impresiondelservicio.php');
		break;
		case 'servicio':
			include('impresionservicio.php');
		break;
		
	}
}
?>
</body>
</html>
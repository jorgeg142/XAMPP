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
	<h1>Seleccione una categoria</h1>
<form action="autoconsulta.php" method="POST">
<INPUT TYPE="submit" VALUE="Servicio" name="servicio"class="btn btn-success" style='width:150px; height:90px'> <INPUT TYPE="submit" VALUE="Producto" name="producto" class="btn btn-success" style='width:150px; height:90px'><br><br><INPUT TYPE="submit" VALUE="volver a pag anterior" class="btn btn-secondary" name="volver">
</INPUT>
</INPUT>
<?php
	$server='localhost';
	$user="root";
	$contra='';
	$based="cerrajeria_houdini";
	$enlace = mysqli_connect($server,$user,$contra,$based);
	if(!$enlace){
		echo"Error de conexión: ".mysqli_connect_error();
	}else{
		echo "Conectado a: $based <br>";
	}
	//------------------------------------------------------------
if (isset($_POST['producto'])) 
{
	header("Location:autoproduconsulta.php");
}
if (isset($_POST['servicio'])) 
{
	header("Location:autoservicioconsul.php");
}
if (isset($_POST['volver'])) 
{
	header('Location:consultar.php');
}
?>
</div>
</body>
</html>
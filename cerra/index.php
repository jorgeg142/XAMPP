<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body style="background-color:#3fc5f0; background-size: cover; background-repeat: no-repeat; background-position: center center;background-attachment:fixed ";;>
		
	<div style="width:40%;margin-left:auto; margin-right:auto">
	<h1><p style="color:white";> Cerrajeria Houdini</p></h1>
<b><p style="color:white";>Que quiere hacer?</p></b>
	<a href="consultar.php" >
<img src="imagen/consulta3.jpg" width="107" alt="consulta" height="107" title="click para consultar">
consultar
</a>
<a href="insertar.php" >
<img src="imagen/registrar.jpg" width="100" alt="insertar" height="100" title="clisc para insertar un registro">
insertar
<br>
</a>
<a href="actualizar.php" >
<img src="imagen/actsinfondo1.png" width="107" alt="insertar" height="107" title="click para modificar un registro">
modificar
</a>
<a href="eliminar.php" >
<img src="imagen/elimina.jpg" width="107" alt="insertar" height="107" title="click para eliminar un registro">
eliminar
</a>
<br>
<!-------------------------------------------------------->
	<form action="index.php" method="POST">
<b><p style="color:white";>Imprimir tablas</p></b>
<input type="submit" value="consultar todo" class="btn btn-info"name="imprimir">
<input type="submit" value="no consultar" class="btn btn-info"name="nada"><br>
</form>
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
if(isset($_POST['imprimir'])) 
{
	include("impresiontabla.php");
}
?>
</div>
</body>
</html>
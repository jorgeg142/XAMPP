<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<body style="background-color:#3fc5f0; background-size: cover; background-repeat: no-repeat; background-position: center center;background-attachment:fixed ";>
<div style="width:40%;margin-left:auto; margin-right:auto">
<h1>Para modificar un dato</h1><br>
seleccione una opcion
<form action="updatespecproduc.php" method="POST">
<input type="checkbox" name="pp"/>precio_producto<?php if(!empty($_POST['pp'])) {include('form1.php'); } ?><br/>
<input type="checkbox" name="dp" value="SI"/>desc_producto<?php if(!empty($_POST['dp'])) {include('form2.php'); } ?><br/>
<input type="checkbox" name="cap" value="SI"/>cant_producto<?php if(!empty($_POST['cap'])) {include('form3.php'); } ?><br/>
<input type="submit" value="seleccionar" name="seleccionar" class="btn btn-success"><br>
ingrese codigo del producto<INPUT TYPE="text" NAME="cp"class="form-control"><BR>
<input type="submit" value="modificar" name="ok" class="btn btn-warning"><br>
<br><br><INPUT TYPE="submit" VALUE="volver a pag anterior" class="btn btn-primary" name="volver"></BR>
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
if (isset($_POST['ok'])) 
{
	$cp=$_POST['cp'];
	if (empty($cp)) 
	{
		echo "<div class='alert alert-danger'>no puede estar vacio</div>";
	}else{
		if (!is_numeric($cp)) 
		{
			echo "<div class='alert alert-danger'>debe ingresar numero</div>";
		}else{
				if (isset($_POST['f1']))
				{
					$f1=$_POST['f1'];
				}
				if (!empty($f1)) 
				{
					if (!is_numeric($fi)) 
					{
						echo "<br>tiene que ser numerico";
					}else{
					$query = "update producto set precio_producto='$f1'where cod_producto='$cp'";
					$consul = mysqli_query($enlace,$query);
					if($consul == false){
					echo "Error al modificar datos: ".mysqli_error($enlace);
					}else{
					echo "Los datos se han modificado correctamente ";
					}
				}
				}
				if (isset($_POST['f2']))
				{
					$f2=$_POST['f2'];
				}
				if (!empty($f2)) 
				{
					if (!is_numeric($f2)) 
					{
						echo "<br>tiene que ser numerico";
					}else{
					$query = "update producto set desc_producto='$f2'where cod_producto='$cp'	";
					$consul = mysqli_query($enlace,$query);
					if($consul == false){
					echo "Error al modificar datos: ".mysqli_error($enlace);
					}else{
					echo "<br>Los datos se han modificado correctamente ";
					}
				}
				}
				if (isset($_POST['f3']))
				{
					$f3=$_POST['f3'];
				}
				if (!empty($f3)) 
				{
					if (!is_numeric($f3)) 
					{
						echo "<br>tiene que ser numerico";
					}
					$query = "update producto set cant_producto='$f3'where cod_producto='$cp'";
					$consul = mysqli_query($enlace,$query);
					if($consul == false){
					echo "Error al modificar datos: ".mysqli_error($enlace);
					}else{
					echo "<br>Los datos se han modificado correctamente ";
				}
			}
		}
	}
include 'impresionproducto.php';
}			
if (isset($_POST['volver'])) 
{
	header('Location:actualizar.php');
}
if (isset($_POST['seleccionar'])) 
{
	include 'impresionproducto.php';	
}
?>
</body>
</html>
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
	<h1>ingrese datos a modificar</h1>
	<FORM ACTION="updateproduc.php" METHOD="POST">
aqui ponga: <br>
cod_producto<br><INPUT TYPE="text" NAME="cp" class="form-control"placeholder="ingrese codigo a modificar"><BR>
precio_producto<br><INPUT TYPE="text" NAME="pp"class="form-control"placeholder="ingrese precio a modificar"><BR>
desc_producto<br><INPUT TYPE="text" NAME="dp"class="form-control"placeholder="ingrese descuento a modificar"><BR>
cant_producto<br><INPUT TYPE="text" NAME="cap"class="form-control"placeholder="ingrese cantidad a modificar"><BR>
<INPUT TYPE="submit" VALUE="modificar" class="btn btn-warning" name="btn">
<br><br><input type="submit" value="imprimir" class="btn btn-info" name="imprimir">
<br><br><INPUT TYPE="submit" VALUE="volver a pag anterior" class="btn btn-secondary" name="volver"><br><br>
<INPUT TYPE="submit" VALUE="volver a pag principal" class="btn btn-primary" name="volverp">
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
//---------------------------------------------------
if (isset($_POST['btn'])) 
{
	$cp=$_POST['cp'];
	if (empty($cp)) 
	{
		echo "<p>tiene que ingresar un numero</p>";
	}else{
		if (!is_numeric($cp)) 
		{
			echo "<p>tiene que ser numero</p>";
		}else{
			$pp=$_POST['pp'];
			if (empty($pp)) 
			{
				echo "<p>tiene que ingresar un numero</p>";
			}else{
				if (!is_numeric($pp)) 
				{
					echo "<p>tiene que ser numero</p>";
				}else{
						$dp=$_POST['dp'];
						if (empty($dp)) 
						{
							echo "<p>tiene que ingresar un numero</p>";
						}else{
							if (!is_numeric($dp)) 
								{
								echo "<p>tiene que ser numero</p>";
								}else{
									$cap=$_POST['cap'];
									if (empty($cap)) {
										echo "<p>ingrese un numero</p>";
									}else{
										if (!is_numeric($cap)) 
											{
											echo "<p>tiene que ser numero</p>";
											}else{

												$query = "update producto set precio_producto='$pp',desc_producto='$dp',cant_producto='$cap' where cod_producto='$cp'";
												$consul = mysqli_query($enlace,$query);
												//Verificamos que la consulta sea exitosa
												if($consul == false){
												echo "Error al modificar datos: ".mysqli_error($enlace);
												}else{
												echo "Los datos se han modificado correctamente ";
												}
											}
										}
									}
								}
							}
						}
					}
				}

}
if (isset($_POST['volver'])) 
{
	echo "<script>location.href='actualizar.php';</script>";
}
if (isset($_POST['volverp'])) 
{
	echo "<script>location.href='index.php';</script>";
}
if (isset($_POST['imprimir'])) 
{
	include("impresionproducto.php");
}
	?>
</div>
</body>
</html>
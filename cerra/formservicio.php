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
	<h1>ingrese datos</h1>
	<FORM ACTION="formservicio.php" METHOD="POST">
aqui ponga:<br>
cod_servicio<br><INPUT TYPE="text" NAME="cs"class="form-control"><BR>
nom_servicio<br><INPUT TYPE="text" NAME="ns" class="form-control"><BR>
precio_servicio<br><INPUT TYPE="text" NAME="ps"class="form-control"><BR>
desc_servicio<INPUT TYPE="text" NAME="ds"class="form-control"><BR>
<INPUT TYPE="submit" VALUE="Enviar" class="btn btn-success" name="btn">
<br><br><input type="submit" value="imprimir" class="btn btn-info" name="imprimir"><br><br>
<INPUT TYPE="submit" VALUE="volver a pag anterior" class="btn btn-secondary" name="volver"><br><br>
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
	$cs=$_POST['cs'];
	if (empty($cs)) 
	{
		echo "<p>tiene que ingresar un numero</p>";
	}else{
		if (!is_numeric($cs)) 
		{
			echo "<p>tiene que ser numero</p>";
		}else{
			$ns=$_POST['ns'];
			if (empty($ns)) 
			{
				echo "<p>tiene que ingresar una palabra</p>";
			}else{
				if (is_numeric($ns)) 
				{
					echo "<p>tiene que ser palabras</p>";
				}else{
					$ps=$_POST['ps'];
						if (empty($ps)) 
						{
							echo "<p>tiene que ingresar un numero</p>";
						}else{
							if (!is_numeric($ps)) 
								{
								echo "<p>tiene que ser numero</p>";
								}else{
									$ds=$_POST['ds'];
									if (empty($ds)) {
										echo "<p>ingrese un numero</p>";
									}else{
										if (!is_numeric($ds)) 
											{
											echo "<p>tiene que ser numero</p>";
											}else{
												$query = "insert into servicio values ('$cs', '$ns','$ps','$ds')";
												$consul = mysqli_query($enlace,$query);
												//Verificamos que la consulta sea exitosa
												if($consul == false){
												echo "Error al insertar datos: ".mysqli_error($enlace);
												}else{
												echo "Los datos se han insertado correctamente ";
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
	echo "<script>location.href='insertar.php';</script>";
}
if (isset($_POST['imprimir'])) 
{
	include("impresionservicio.php");
}
if (isset($_POST['volverp'])) 
{
	echo "<script>location.href='index.php';</script>";
}
	?>
</div>
</body>
</html>

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
	<FORM ACTION="updatedelservicio.php" METHOD="POST">
aqui ponga: <br>
servicio_cod_servicio<br><INPUT TYPE="text" NAME="scs"class="form-control"placeholder="ingrese codigo servicio a modificar"><BR>
factura_num_factura<br><INPUT TYPE="text" NAME="fnf"class="form-control"placeholder="ingrese numero de factura a modificar"><BR>
cant_venta_s<br><INPUT TYPE="text" NAME="cv"class="form-control"placeholder="ingrese cantidad de ventas a modificar"><BR>
<INPUT TYPE="submit" VALUE="modificar" class="btn btn-warning" name="btn">
<br><br><input type="submit" value="imprimir" class="btn btn-info" name="imprimir"><br><br>
<INPUT TYPE="submit" VALUE="volver a pag anterior" class="btn btn-secondary" name="volver"><br><br>
<INPUT TYPE="submit" VALUE="volver a pag principal" class="btn btn-primary" name="volverp">
</form>
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
//---------------------------------------------------
if (isset($_POST['btn'])) 
{
	$scs=$_POST['scs'];
	if (empty($scs)) 
	{
		echo "<p>tiene que ingresar un numero</p>";
	}else{
		if (!is_numeric($scs)) 
		{
			echo "<p>tiene que ser numero</p>";
		}else{
			$fnf=$_POST['fnf'];
			if (empty($fnf)) 
			{
				echo "<p>tiene que ingresar un numero</p>";
			}else{
				if (!is_numeric($fnf)) 
				{
					echo "<p>tiene que ser numero</p>";
				}else{
					$cv=$_POST['cv'];
					if (empty($cv)) 
						{
							echo "<p>tiene que ingresar un numero</p>";
						}else{
							if (!is_numeric($cv)) 
								{
								echo "<p>tiene que ser numero</p>";
								}else{
									$query = "update det_servicio set factura_num_factura='$fnf',cant_venta_s='cv' where servicio_cod_servicio='$scs'";
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
if (isset($_POST['volver'])) 
{
	header('Location: actualizar.php');
}
if (isset($_POST['volverp'])) 
{
	header('location:pagina web.php');
}
if (isset($_POST['imprimir'])) 
{
	include("impresiondelservicio.php");
}
	?>
</div>
</body>
</html>
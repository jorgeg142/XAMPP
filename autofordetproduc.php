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
<FORM ACTION="autofordetproduc.php" METHOD="POST">
aqui ponga:<br>
cod_producto<br><INPUT TYPE="text" NAME="cp"class="form-control"><BR>
num_factura<br><INPUT TYPE="text" NAME="nf"class="form-control"><BR>
cant_venta_p<INPUT TYPE="text" NAME="cv"class="form-control"><BR>
<INPUT TYPE="submit" VALUE="Enviar" class="btn btn-success" name="btn1">
<br><br><input type="submit" value="imprimir" class="btn btn-info" name="imprimir"><br><br>
<INPUT TYPE="submit" VALUE="volver a pag principal" class="btn btn-primary" name="volverp">
</p>
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
//-----------------------------------------------------------
if (isset($_POST['btn1'])) 
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
				$nf=$_POST['nf'];
				if (empty($nf)) 
				{
					echo "<p>tiene que ingresar un numero</p>";
				}else{
					if (!is_numeric($nf)) 
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
										$query = "insert into det_producto values ('$cp','$nf','$cv')";
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
if (isset($_POST['volver'])) 
{
	header('Location: insertar.php');
}
if (isset($_POST['imprimir'])) 
{
	include("impresionproducto.php");
	echo "tabla producto";
	include("impresionfactura.php");
	echo "tabla factura";
	include("impresiondetproduc.php");
	echo "tabla det_producto";
}
if (isset($_POST['volverp'])) 
{
	header('location:pagina web.php');
}
?>	
</div>
</body>
</html>

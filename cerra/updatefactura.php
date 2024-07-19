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
	<FORM ACTION="updatefactura.php" METHOD="POST">
aqui ponga: <br>
num_factura<br><INPUT TYPE="text" NAME="nf"class="form-control"placeholder="ingrese numero de factura a modificar"><BR>
fecha_factura<br><INPUT TYPE="text" NAME="ff"class="form-control"placeholder="ingrese fecha de factura a modificar dd/mm/yyyy"><BR>
<INPUT TYPE="submit" VALUE="modificar" class="btn btn-warning" name="btn"><br><br>
<input type="submit" value="imprimir" class="btn btn-info" name="imprimir">
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
	$nf=$_POST['nf'];
	if (empty($nf)) 
	{
		echo "<p>tiene que agregar un numero de factura";
	}else{
		if (!is_numeric($nf))
		{
			echo "<p>tiene que ser un numero</p>";
		}else{
			$fecha=$_POST['ff'];
			$f=explode('/', $fecha);
			if(count($f) == 3 && checkdate($f[1], $f[0], $f[2])){
				$ff=$f[2]."-".$f[0]."-".$f[1];
				$query = "update factura set fecha_factura='$ff' where num_factura='$nf'";
				$consul = mysqli_query($enlace,$query);
				//Verificamos que la consulta sea exitosa
					if($consul == false){
						echo "Error al midificar datos: ".mysqli_error($enlace);
					}else{
						echo "Los datos se han modificado correctamente ";
					}
					}else{
    						echo 'la fecha esta mal';
    				}

		}
	}
}
 //---------------------------------
if (isset($_POST['volver'])) 
{
	echo "<script>location.href='actualizar.php';</script>";
}
if (isset($_POST['imprimir'])) 
{
	include("impresionfactura.php");
}
if (isset($_POST['volverp'])) 
{
	echo "<script>location.href='index.php';</script>";
}
	?>
</div>
</body>
</html>
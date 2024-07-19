<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body style="background-color:#3fc5f0; background-size: cover; background-repeat: no-repeat; background-position: center center;background-attachment:fixed";>
<div style="width:40%;margin-left:auto; margin-right:auto">
<h1>ingrese datos</h1>
	<FORM ACTION="autoservicioconsul.php" METHOD="POST">
<p>aqui ponga:</p>
<p>cod_servicio</p><INPUT TYPE="text" NAME="cs"class="form-control"></INPUT>
<p>num_factura</p><INPUT TYPE="text" NAME="nf"class="form-control"></INPUT><br>
<INPUT TYPE="submit" VALUE="consultar" class="btn btn-info" name="consultar"><br><br><INPUT TYPE="submit" VALUE="volver a pag anterior" class="btn btn-secondary" name="volver"><br><br>
<INPUT TYPE="submit" VALUE="volver a pag principal" class="btn btn-primary" name="volverp">
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
if (isset($_POST['consultar'])) 
{
	$cs=$_POST['cs'];
	if (empty($cs)) 
	{
		echo "<p>ingrese un numero</p>";
	}else{
		if (!is_numeric($cs)) 
		{
			echo "<p>tiene que ser numero</p>";
			}else{
			$nf=$_POST['nf'];
				if (empty($nf)) 
				{
				echo "<p>ingrese un numero</p>";
				}else{
				if (!is_numeric($nf)) 
				{
				echo "<p>tiene que ser numero</p>";
				}else{
					$SQL= "Select nom_servicio,precio_servicio,desc_servicio,cant_venta_s,fecha_factura from servicio s,det_servicio d,factura f where $cs=cod_servicio and $cs=d.servicio_cod_servicio and $nf=f.num_factura";
					$consul = mysqli_query($enlace,$SQL);
					//Verificamos que la consulta sea exitosa
					if($consul == false){
					echo "Error al consultar datos: ".mysqli_error($enlace);
					}else{
					echo "Los datos se han consultado correctamente ";
					$Result=$enlace->query($SQL);
						if (!$Result) 
							{
								echo "error: ".$SQL;
							}
						echo "<div style='padding:10px; background-color:white;line-height:1.4;' width='124px';>";
						echo"<table border='2'>";
						echo "</div>";
						echo"<tr>";
						echo"<th>nombre del servicio</th><th>precio del servicio</th><th>descuento</th><th>cantidad de ventas de servicios</th><th>fecha de la factura</th>";
						echo"</tr>";
						$tab=mysqli_fetch_array($Result);
						for ($i=0; $i <$tab ; $i++) 
						{ 
							echo"<tr>";
							echo"<td>".$tab['nom_servicio']."</td>"."<td>".$tab['precio_servicio']."</td>".
							"<td>".$tab['desc_servicio']."</td><td>".
							$tab['cant_venta_s']."</td><td>".$tab['fecha_factura']."</td><td>";
							echo"</tr>";
							$tab=mysqli_fetch_array($Result);
						}
					}
				}
			}
		}
	}
}
if (isset($_POST['volver'])) 
{
	header('Location:autoconsulta.php');
}
if (isset($_POST['volverp'])) 
{
	header('location:pagina web.php');
}
?>
</div>
</body>
</html>
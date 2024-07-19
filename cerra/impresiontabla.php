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

<?php
$SQL="select * from producto";
	$Result=$enlace->query($SQL);
	if (!$Result) 
		{
			echo "error: ".$SQL;
		}
	echo "<div style='padding:10px; background-color:white;line-height:1.4;' width='124px';>";
	echo"<table border='2'>";
	echo "</div>";
	echo"<tr>";
	echo"<th>cod_producto</th><th>precio_producto</th><th>desc_producto</th><th>cant_producto</th>";
	echo"</tr>";
	$tab=mysqli_fetch_array($Result);
	for ($i=0; $i <$tab ; $i++) 
	{ 
		echo"<tr>";
		echo"<td>".$tab['cod_producto']."</td>"."<td>".$tab['precio_producto']."</td>".
		"<td>".$tab['desc_producto']."</td><td>".
		$tab['cant_producto']."</td><td>";
		echo"</tr>";
		$tab=mysqli_fetch_array($Result);
	}
	echo "<br>";
	//---------------------------------------------------------------------------------------
	$SQL="select * from det_producto";
	$Result=$enlace->query($SQL);
	if (!$Result) 
		{
			echo "error: ".$SQL;
		}
	echo"<table border='2'>";
	echo"<tr>";
	echo"<th>cod_producto</th><th>num_factura</th><th>cant_venta_p</th>";
	echo"</tr>";
	$tab=mysqli_fetch_array($Result);
	for ($i=0; $i <$tab ; $i++) 
	{ 
		echo"<tr>";
		echo"<td>".$tab['cod_producto']."</td>"."<td>".$tab['num_factura']."</td>".
		"<td>".$tab['cant_venta_p']."</td><td>";
		echo"</tr>";
		$tab=mysqli_fetch_array($Result);
	}
	echo "<br>";
	//----------------------------------------------------------------------
	$SQL="select * from factura";
	$Result=$enlace->query($SQL);
	if (!$Result) 
		{
			echo "error: ".$SQL;
		}
	echo"<table border='2'>";
	echo"<tr>";
	echo"<th>num_factura</th><th>fecha_factura</th>";
	echo"</tr>";
	$tab=mysqli_fetch_array($Result);
	for ($i=0; $i <$tab ; $i++) 
	{ 
		echo"<tr>";
		echo"<td>".$tab['num_factura']."</td>"."<td>".$tab['fecha_factura']."</td>".
		"<td>";
		echo"</tr>";
		$tab=mysqli_fetch_array($Result);
	}
echo "<br>";
	$SQL="select * from det_servicio";
	$Result=$enlace->query($SQL);
	if (!$Result) 
		{
			echo "error: ".$SQL;
		}
	echo"<table border='2'>";
	echo"<tr>";
	echo"<th>servicio_cod_servicio</th><th>factura_num_factura</th><th>cant_venta_s
</th>";
	echo"</tr>";
	$tab=mysqli_fetch_array($Result);
	for ($i=0; $i <$tab ; $i++) 
	{ 
		echo"<tr>";
		echo"<td>".$tab['servicio_cod_servicio']."</td>"."<td>".$tab['factura_num_factura']."</td>".
		"<td>".$tab['cant_venta_s']."</td><td>";
		echo"</tr>";
		$tab=mysqli_fetch_array($Result);
	}
	echo "<br>";
	$SQL="select * from servicio";
	$Result=$enlace->query($SQL);
	if (!$Result) 
		{
			echo "error: ".$SQL;
		}
	echo"<table border='2'>";
	echo"<tr>";
	echo"<th>cod_servicio</th><th>nom_servicio</th><th>precio_servicio</th><th>desc_servicio
</th>";
	echo"</tr>";
	$tab=mysqli_fetch_array($Result);
	for ($i=0; $i <$tab ; $i++) 
	{ 
		echo"<tr>";
		echo"<td>".$tab['cod_servicio']."</td>"."<td>".$tab['nom_servicio']."</td>".
		"<td>".$tab['precio_servicio']."</td><td>".
		$tab['desc_servicio']."</td><td>";
		echo"</tr>";
		$tab=mysqli_fetch_array($Result);
	}
	echo "<br>";
	?>
</body>
</html>
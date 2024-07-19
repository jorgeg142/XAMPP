<?php
$Result=$enlace->query($SQL);
	if (!$Result) 
		{
			echo "error: ".$SQL;
		}
		echo "<div style='padding:10px; background-color:white;line-height:1.4;' width='124px';>";
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
?>
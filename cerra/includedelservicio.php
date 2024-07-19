<?php
$Result=$enlace->query($SQL);
	if (!$Result) 
		{
			echo "error: ".$SQL;
		}
		echo "<div style='padding:10px; background-color:white;line-height:1.4;' width='124px';>";
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
	?>
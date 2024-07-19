<?php
$Result=$enlace->query($SQL);
	if (!$Result) 
		{
			echo "error: ".$SQL;
		}
		echo "<div style='padding:10px; background-color:white;line-height:1.4;' width='124px';>";
	echo"<table border='2'>";
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
?>
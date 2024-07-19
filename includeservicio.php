<?php
$SQL="select * from servicio";
	$Result=$enlace->query($SQL);
	if (!$Result) 
		{
			echo "error: ".$SQL;
		}
		echo "<div style='padding:10px; background-color:white;line-height:1.4;' width='124px';>";
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
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
	<form action="actualizar.php" method="POST">
<h1>Para modificar un registro</h1><br>
Seleccione una tabla:<br>
<select name="actu">
	<option> ninguno </option>
<option value="producto">producto</option>
<option value="det_producto">det_producto</option>
<option value="factura">factura</option>
<option value="det_servicio">det_servicio</option>
<option value="servicio">servicio</option>
</select>
<br><br><input type="submit" value="modificar todo un registro" class="btn btn-success" name="up">
<br><br><input type="submit" value="volver a pag anterior" class="btn btn-primary" name="volver">
<!-------------------------------------------------------->
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
	//------------------------------------------------------------
	if (isset($_POST['up'])) 
{
	$update=$_POST['actu'];
	switch ($update) {
    case "producto":
        echo "<script>location.href='updateproduc.php';</script>";
        break;
    case 'det_producto':
    echo "<script>location.href='updatedetproduc.php';</script>";
        break;
    case 'factura':
    echo "<script>location.href='updatefactura.php';</script>";
        break;
    case 'det_servicio';
    echo "<script>location.href='updatedelservicio.php';</script>";
    break;
    case 'servicio';
    echo "<script>location.href='updateservicio.php';</script>";
    break;
}
}
if (isset($_POST['volver'])) 
{
    echo "<script>location.href='index.php';</script>";
}
?>
</div>
</body>
</html>
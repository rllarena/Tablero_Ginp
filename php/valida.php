<?php require_once('../conn/connect.php'); ?>
<?php date_default_timezone_set('America/Mexico_City'); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Valida</title>
</head>
<body>
<?php
	$Usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : '';
	$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
	$query = "SELECT * FROM usuarios WHERE Usuario='$Usuario' AND Pwd=md5('$Password')";
	$resultado=$connect->query($query);
	$resultados=$connect->query($query);
	$rows = $resultados->fetch_assoc();
	$ExpedienteUser = trim($rows["Expediente"]);
	$NombreCompletoUser = trim($rows["NombreCompleto"]);
	$Area = trim($rows["Area"]);
	$Usuario = trim($rows["Usuario"]);
	$TipoCuentaUser = trim($rows["TipoCuenta"]);

	if ($row = $resultado->fetch_row())
		{
			header('Refresh:0; url=../menu.php?ExpedienteUser='.$ExpedienteUser.' & NombreCompletoUser='.$NombreCompletoUser.' & Area='.$Area.' & Usuario='.$Usuario.' & TipoCuentaUser='.$TipoCuentaUser);
		}
		else{
			header('Location: ../login.php');
	}
?>
</body>
</html>

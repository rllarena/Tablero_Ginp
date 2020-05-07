<?php require_once('../conn/connect.php') ?>
<?php
date_default_timezone_set('America/Mexico_City');
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1"/>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<title>Registro de Actividades</title>
</head>
<body>
<?php
	$nombre="";
	$guardado="";
	$sufijo="";

	$Tarea = strtoupper(isset($_POST['nTareaActividad']) ? $_POST['nTareaActividad'] : '');
	//echo "nTareaActividad: ".$Tarea."<br>";

	$AvanceActividad = strtoupper(isset($_POST['AvanceActividad']) ? $_POST['AvanceActividad'] : '');
	//echo "AvanceActividad: ".$AvanceActividad."<br>";

	$EstatusActividad = strtoupper(isset($_POST['EstatusActividad']) ? $_POST['EstatusActividad'] : '');
	//echo "EstatusActividad: ".$EstatusActividad."<br>";

	$AreaActividad = strtoupper(isset($_POST['AreaActividad']) ? $_POST['AreaActividad'] : '');
	//echo "AreaActividad: ".$AreaActividad."<br>";

	$FechaInicioActividad = strtoupper(isset($_POST['FechaInicioActividad']) ? $_POST['FechaInicioActividad'] : '');
	//echo "FechaInicioActividad: ".$FechaInicioActividad."<br>";

	$FechaVencimientoActividad = strtoupper(isset($_POST['FechaVencimientoActividad']) ? $_POST['FechaVencimientoActividad'] : '');
	//echo "FechaVencimientoActividad: ".$FechaVencimientoActividad."<br>";

	$FechaCierreActividad = strtoupper(isset($_POST['FechaCierreActividad']) ? $_POST['FechaCierreActividad'] : '');
	//echo "FechaCierreActividad: ".$FechaCierreActividad."<br>";

	$PrioridadActividad = isset($_POST['PrioridadActividad']) ? $_POST['PrioridadActividad'] : '';
	//echo "PrioridadActividad: ".$PrioridadActividad."<br>";

	$ProyectoActividad = isset($_POST['ProyectoActividad']) ? $_POST['ProyectoActividad'] : '';
	//echo "ProyectoActividad: ".$ProyectoActividad."<br>";

	$ResponsableActividad = isset($_POST['ResponsableActividad']) ? $_POST['ResponsableActividad'] : '';
	//echo "ResponsableActividad: ".$ResponsableActividad."<br>";

	$ColaboradorActividad = isset($_POST['ColaboradorActividad']) ? $_POST['ColaboradorActividad'] : '';
	//echo "ColaboradorActividad: ".$ColaboradorActividad."<br>";

	$NotasActividad = isset($_POST['NotasActividad']) ? $_POST['NotasActividad'] : '';
	//echo "NotasActividad: ".$NotasActividad."<br>";

	$AdjuntoActividad = isset($_POST['AdjuntoActividad']) ? $_POST['AdjuntoActividad'] : '';
	//echo "AdjuntoActividad: ".$AdjuntoActividad."<br>";

	$Usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : '';
	//echo "Usuario: ".$Usuario."<br>";

	$Area = utf8_decode(strtoupper(isset($_POST['Area']) ? $_POST['Area'] : ''));
	//echo "AreaCdt: ".$Area."<br>";

	$TipoCuentaUser = isset($_POST['TipoCuentaUser']) ? $_POST['TipoCuentaUser'] : '';
	//echo "TipoCuentaUser: ".$TipoCuentaUser."<br>";

	$ExpedienteUser = isset($_POST['ExpedienteUser']) ? $_POST['ExpedienteUser'] : '';
	//echo "ExpedienteUser: ".$ExpedienteUser."<br>";

	$NombreCompletoUser = isset($_POST['NombreCompletoUser']) ? $_POST['NombreCompletoUser'] : '';
	//echo "NombreCompletoUser: ".$NombreCompletoUser."<br>";

	$FechaMovimiento = date('Y-m-d', time());
	//echo "FechaMovimiento: ".$FechaMovimiento."<br>";

	$FechaMovimiento_HMS = date('Y-m-d H:i:s', time());
	//echo "FechaMovimiento_HMS: ".$FechaMovimiento_HMS."<br>";

	$AnioMovimiento = date('Y', time());
	//echo "AnioMovimiento: ".$AnioMovimiento."<br>";

	// ********************** A Q U I ***************************
	//$nombre=utf8_decode($_FILES['AdjuntoActividad']['name']);
	$nombre=$_FILES['AdjuntoActividad']['name'];
	if(strlen($nombre)>0){
		$queryn = "SELECT count(*) FROM actividades WHERE Tarea='$Tarea'";
		$resultadon=$connect->query($queryn);
		$rown = $resultadon->fetch_row();
		//$next_activ = 1+(int)$rown[0];
		$sufijo = $Tarea."_Actividad_".$AnioMovimiento;

		$query = "UPDATE actividades set AvancePorcentaje='$AvanceActividad', Colaborador='$ColaboradorActividad',
		Notas='$NotasActividad', AdjuntoActividad='$sufijo', FechaActividad='$FechaMovimiento_HMS' WHERE Tarea='$Tarea'";
	}else{
		$query = "UPDATE actividades set AvancePorcentaje='$AvanceActividad', Colaborador='$ColaboradorActividad',
		Notas='$NotasActividad', FechaActividad='$FechaMovimiento_HMS' WHERE Tarea='$Tarea'";
	}


	//$guardado=$_FILES['AdjuntoGinpOficio_proyn']['tmp_name'];
	$guardado=$_FILES['AdjuntoActividad']['tmp_name'];

	//echo '<h1>guardado: '.$guardado.'</h1>';
	$PathConAreaCDT='docs-Adj_Actividades';//.$AreaCdt;
	$PathConAreaCDTConFile=$PathConAreaCDT.'/'.$sufijo.'.pdf';

/*desde aqui*/

	if(!file_exists('../'.$PathConAreaCDT)){
	  mkdir('../'.$PathConAreaCDT,0777,true);
	  if(file_exists('../'.$PathConAreaCDT)){
	    if(move_uploaded_file($guardado,'../'.$PathConAreaCDTConFile)){
	      //echo "archivo guardado con exito";
				//header('Refresh:0; url=../menublur.php?AreaCdt='.$AreaCdt.' & Usuario='.$Usuario. ' & entradas='.$entradas);
	    }else{
	      //echo "archivo no se pudo guardar";
	    }
	  }
	}else{
	  if(move_uploaded_file($guardado,'../'.$PathConAreaCDTConFile)){
	    //echo "archivo guardado con exito<br>";
			//header('Refresh:0; url=../menublur.php?AreaCdt='.$AreaCdt.' & Usuario='.$Usuario. ' & entradas='.$entradas);
	  }else{
	    //echo "archivo no se pudo guardar<br>";
	  }
	}

	/*$query = "UPDATE actividades set AvancePorcentaje='$AvanceActividad', Colaborador='$ColaboradorActividad',
	Notas='$NotasActividad', AdjuntoActividad='$sufijo', FechaActividad='$FechaMovimiento' WHERE Tarea='$Tarea'";*/

	//print($query);

	$resultado=$connect->query($query);

	//descomentar
	header('Refresh:0; url=../menu.php?ExpedienteUser='.$ExpedienteUser.' & NombreCompletoUser='.$NombreCompletoUser.' & Area='.$Area.' & Usuario='.$Usuario.' & TipoCuentaUser='.$TipoCuentaUser);
?>
</body>
</html>

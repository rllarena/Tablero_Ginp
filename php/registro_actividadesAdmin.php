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

	$TareaActividadAdmin = strtoupper(isset($_POST['TareaActividadAdmin']) ? $_POST['TareaActividadAdmin'] : '');
	//echo "TareaActividadAdmin: ".$TareaActividadAdmin."<br>";




	$Tarea = strtoupper(isset($_POST['nTareaActividadAdmin']) ? $_POST['nTareaActividadAdmin'] : '');
	//echo "nTareaActividad: ".$Tarea."<br>";

	$AvanceActividad = strtoupper(isset($_POST['AvanceActividadAdmin']) ? $_POST['AvanceActividadAdmin'] : '');
	//echo "AvanceActividad: ".$AvanceActividad."<br>";

	$EstatusActividad = strtoupper(isset($_POST['EstatusActividadAdmin']) ? $_POST['EstatusActividadAdmin'] : '');
	//echo "EstatusActividad: ".$EstatusActividad."<br>";

	$AreaActividad = strtoupper(isset($_POST['AreaActividadAdmin']) ? $_POST['AreaActividadAdmin'] : '');
	//echo "AreaActividad: ".$AreaActividad."<br>";



	$NuevaTareaActividad = strtoupper(isset($_POST['NuevaTareaActividadAdmin']) ? $_POST['NuevaTareaActividadAdmin'] : '');
	//echo "NuevaTareaActividad: ".$NuevaTareaActividad."<br>";




	$FechaInicioActividad = strtoupper(isset($_POST['FechaInicioActividadAdmin']) ? $_POST['FechaInicioActividadAdmin'] : '');
	//echo "FechaInicioActividad: ".$FechaInicioActividad."<br>";

	$FechaVencimientoActividad = strtoupper(isset($_POST['FechaVencimientoActividadAdmin']) ? $_POST['FechaVencimientoActividadAdmin'] : '');
	//echo "FechaVencimientoActividad: ".$FechaVencimientoActividad."<br>";

	$FechaCierreActividad = strtoupper(isset($_POST['FechaCierreActividadAdmin']) ? $_POST['FechaCierreActividadAdmin'] : '');
	//echo "FechaCierreActividad: ".$FechaCierreActividad."<br>";

	$PrioridadActividad = isset($_POST['PrioridadActividadAdmin']) ? $_POST['PrioridadActividadAdmin'] : '';
	//echo "PrioridadActividad: ".$PrioridadActividad."<br>";

	$ProyectoActividad = isset($_POST['ProyectoActividadAdmin']) ? $_POST['ProyectoActividadAdmin'] : '';
	//echo "ProyectoActividad: ".$ProyectoActividad."<br>";

	$ResponsableActividad = isset($_POST['ResponsableActividadAdmin']) ? $_POST['ResponsableActividadAdmin'] : '';
	//echo "ResponsableActividad: ".$ResponsableActividad."<br>";

	$ColaboradorActividad = isset($_POST['ColaboradorActividadAdmin']) ? $_POST['ColaboradorActividadAdmin'] : '';
	//echo "ColaboradorActividad: ".$ColaboradorActividad."<br>";

	$NotasActividad = isset($_POST['NotasActividadAdmin']) ? $_POST['NotasActividadAdmin'] : '';
	//echo "NotasActividad: ".$NotasActividad."<br>";

	$AdjuntoActividad = isset($_POST['AdjuntoActividadAdmin']) ? $_POST['AdjuntoActividadAdmin'] : '';
	//echo "AdjuntoActividad: ".$AdjuntoActividad."<br>";

	$Usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : '';
	//echo "Usuario: ".$Usuario."<br>";

	$Area = isset($_POST['Area']) ? $_POST['Area'] : '';
	//echo "Area: ".$Area."<br>";

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
		$nombre=$_FILES['AdjuntoActividadAdmin']['name'];


		$querynt = "SELECT count(*) FROM actividades";
		$resultadont=$connect->query($querynt);
		$rownt = $resultadont->fetch_row();
		$next_activ = 1+(int)$rownt[0];


		$queryn = "SELECT count(*) FROM actividades WHERE Tarea='$Tarea'";
		$resultadon=$connect->query($queryn);
		$rown = $resultadon->fetch_row();
		//$next_activ = 1+(int)$rown[0];
		$sufijo = $Tarea."_AdjOficioGinp_".$AnioMovimiento;


		$pos = strpos($TareaActividadAdmin, "SELECCIONE UNA ACTIVIDAD");
		if ($pos=='' and strlen($pos)==0){
			//echo "ACTUALIZAR<br>";
			if(strlen($nombre)>0){
				//echo "ACTUALIZAR con archivo  <br>";

				$query = "UPDATE actividades set PrioridadDeLaActividad='$PrioridadActividad',
				FechaInicio='$FechaInicioActividad', FechaVencimiento='$FechaVencimientoActividad', FechaCierre='$FechaCierreActividad',
				FechaActividad='$FechaMovimiento_HMS', AvancePorcentaje='$AvanceActividad', Notas='$NotasActividad', Responsable='$ResponsableActividad',
				Area='$AreaActividad', Colaborador='$ColaboradorActividad', AdjuntoGinpOficio='$sufijo', 	ClaveProyecto='$ProyectoActividad' WHERE Tarea='$Tarea'";
			}else{
				//echo "ACTUALIZAR sin archivo <br>";
				$query = "UPDATE actividades set PrioridadDeLaActividad='$PrioridadActividad',
				FechaInicio='$FechaInicioActividad', FechaVencimiento='$FechaVencimientoActividad', FechaCierre='$FechaCierreActividad',
				FechaActividad='$FechaMovimiento_HMS', AvancePorcentaje='$AvanceActividad', Notas='$NotasActividad', Responsable='$ResponsableActividad',
				Area='$AreaActividad', Colaborador='$ColaboradorActividad', ClaveProyecto='$ProyectoActividad' WHERE Tarea='$Tarea'";
			}
		}else{
			//echo "INSERTAR<br>";
			$query = "INSERT INTO actividades (Tarea, Actividad, PrioridadDeLaActividad, FechaInicio, FechaVencimiento,
				FechaCierre, FechaActividad, AvancePorcentaje, Notas, Responsable, Area, Colaborador, AdjuntoGinpOficio, ClaveProyecto)
				values('$next_activ', '$NuevaTareaActividad', '$PrioridadActividad', '$FechaInicioActividad', '$FechaVencimientoActividad',
				'$FechaCierreActividad', '$FechaMovimiento_HMS', '$AvanceActividad', '$NotasActividad', '$ResponsableActividad', '$AreaActividad',
				'$ColaboradorActividad', '$sufijo', '$ProyectoActividad')";
		}


	/*if(strlen($nombre)>0){
		$sufijo = $Tarea."_AdjOficioGinp_".$AnioMovimiento;
		$query = "UPDATE actividades set PrioridadDeLaActividad='$PrioridadActividad',
		FechaInicio='$FechaInicioActividad', FechaVencimiento='$FechaVencimientoActividad', FechaCierre='$FechaCierreActividad',
		FechaActividad='$FechaMovimiento', AvancePorcentaje='$AvanceActividad', Notas='$NotasActividad', Responsable='$ResponsableActividad',
		Area='$AreaActividad', Colaborador='$ColaboradorActividad', AdjuntoGinpOficio='$sufijo', 	ClaveProyecto='$ProyectoActividad' WHERE Tarea='$Tarea'";
	}else{
		$query = "UPDATE actividades set PrioridadDeLaActividad='$PrioridadActividad',
		FechaInicio='$FechaInicioActividad', FechaVencimiento='$FechaVencimientoActividad', FechaCierre='$FechaCierreActividad',
		FechaActividad='$FechaMovimiento', AvancePorcentaje='$AvanceActividad', Notas='$NotasActividad', Responsable='$ResponsableActividad',
		Area='$AreaActividad', Colaborador='$ColaboradorActividad', ClaveProyecto='$ProyectoActividad' WHERE Tarea='$Tarea'";
	}*/

//echo $query;
	//$guardado=$_FILES['AdjuntoGinpOficio_proyn']['tmp_name'];
	$guardado=$_FILES['AdjuntoActividadAdmin']['tmp_name'];

	//echo '<h1>guardado: '.$guardado.'</h1>';
	$PathConAreaCDT='docs-Adj_OficioGinp';//.$AreaCdt;
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

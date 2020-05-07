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
	
<title>Registro de Proyectos</title>
</head>
<body>
<?php
	$nombre="";
	$guardado="";
	$nomFileNvoProyOfGinp="";
	$Adjuntonpe="";

	$Usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : '';
	//echo "Usuario: ".$Usuario."<br>";

	$AreaCdt = isset($_POST['AreaCdt']) ? $_POST['AreaCdt'] : '';
	//echo "AreaCdt: ".$AreaCdt."<br>";

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



	$Proyecto_Nuevonpe = strtoupper(isset($_POST['Proyecto_Nuevonpe']) ? $_POST['Proyecto_Nuevonpe'] : '');
	//echo "Proyecto_Nuevonpe: ".$Proyecto_Nuevonpe."<br>";

	$Clave_Proyectonpe = strtoupper(isset($_POST['Clave_Proyectonpe']) ? $_POST['Clave_Proyectonpe'] : '');
	//echo "Clave_Proyectonpe: ".$Clave_Proyectonpe."<br>";

	$Tiponpe = strtoupper(isset($_POST['Tiponpe']) ? $_POST['Tiponpe'] : '');
	//echo "Tiponpe: ".$Tiponpe."<br>";

	$Responsable_Proyectonpe = strtoupper(isset($_POST['Responsable_Proyectonpe']) ? $_POST['Responsable_Proyectonpe'] : '');
	//echo "Responsable_Proyectonpe: ".$Responsable_Proyectonpe."<br>";

	$Colaborador_Proyectonpe = strtoupper(isset($_POST['Colaborador_Proyectonpe']) ? $_POST['Colaborador_Proyectonpe'] : '');
	//echo "Colaborador_Proyectonpe: ".$Colaborador_Proyectonpe."<br>";

	$FechaInicio_Proyectonpe = isset($_POST['FechaInicio_Proyectonpe']) ? $_POST['FechaInicio_Proyectonpe'] : '';
	//echo "FechaInicio_Proyectonpe: ".$FechaInicio_Proyectonpe."<br>";

	$FechaVencimiento1_Proyectonpe = isset($_POST['FechaVencimiento1_Proyectonpe']) ? $_POST['FechaVencimiento1_Proyectonpe'] : '';
	//echo "FechaVencimiento1_Proyectonpe: ".$FechaVencimiento1_Proyectonpe."<br>";

	$FechaVencimiento2_Proyectonpe = isset($_POST['FechaVencimiento2_Proyectonpe']) ? $_POST['FechaVencimiento2_Proyectonpe'] : '';
	//echo "FechaVencimiento2_Proyectonpe: ".$FechaVencimiento2_Proyectonpe."<br>";

	$Adjuntonpe=$_FILES['Adjuntonpe']['name'];
	//echo "Adjuntonpe: ".$Adjuntonpe."<br>";


		//$AreaCdt = $_GET["AreaCdt"];
		if ($TipoCuentaUser=='admin'){
				if (isset($_POST['CdtAnalisisnpe']) ? $_POST['CdtAnalisisnpe'] : ''=='on') {
					$CdtAnalisisnpe = 'SI';
				} else {
					$CdtAnalisisnpe = '';
				}
				if (isset($_POST['CdtDifusionnpe']) ? $_POST['CdtDifusionnpe'] : ''=='on') {
					$CdtDifusionnpe = 'SI';
				} else {
					$CdtDifusionnpe = '';
				}
				if (isset($_POST['CdtLedanpe']) ? $_POST['CdtLedanpe'] : ''=='on') {
					$CdtLedanpe = 'SI';
				} else {
					$CdtLedanpe = '';
				}
				if (isset($_POST['CdtInformaticanpe']) ? $_POST['CdtInformaticanpe'] : ''=='on') {
					$CdtInformaticanpe = 'SI';
				} else {
					$CdtInformaticanpe = '';
				}
				if (isset($_POST['CdtIdpnpe']) ? $_POST['CdtIdpnpe'] : ''=='on') {
					$CdtIdpnpe = 'SI';
				} else {
					$CdtIdpnpe = '';
				}
				if (isset($_POST['CdtDisanpe']) ? $_POST['CdtDisanpe'] : ''=='on') {
					$CdtDisanpe = 'SI';
				} else {
					$CdtDisanpe = '';
				}
				if (isset($_POST['CdtTetranpe']) ? $_POST['CdtTetranpe'] : ''=='on') {
					$CdtTetranpe = 'SI';
				} else {
					$CdtTetranpe = '';
				}
				if (isset($_POST['CdtTelemandonpe']) ? $_POST['CdtTelemandonpe'] : ''=='on') {
					$CdtTelemandonpe = 'SI';
				} else {
					$CdtTelemandonpe = '';
				}
				if (isset($_POST['CdtMejoraContnpe']) ? $_POST['CdtMejoraContnpe'] : ''=='on') {
					$CdtMejoraContnpe = 'SI';
				} else {
					$CdtMejoraContnpe = '';
				}
			}



	// ********************** A Q U I ***************************
	//$nombre=utf8_decode($_FILES['AdjuntoGinp']['name']);
	$nombre=$_FILES['Adjuntonpe']['name'];
	//echo '<h1>nombre: '.$nombre.'</h1>';
	if(strlen($nombre)>0){
		$nomFileNvoProyOfGinp = "OficioGINP_NvoProy_".$Clave_Proyectonpe."_".$FechaMovimiento;
	}

	//$guardado=$_FILES['AdjuntoGinpOficio_proyn']['tmp_name'];
	$guardado=$_FILES['Adjuntonpe']['tmp_name'];

	//echo '<h1>guardado: '.$guardado.'</h1>';
	$PathConAreaCDT='docs-OficioGINPAltaProy';//.$AreaCdt;
	$PathConAreaCDTConFile=$PathConAreaCDT.'/'.$nomFileNvoProyOfGinp.'.pdf';

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

	/*$queryn = "SELECT count(*) from entradasua WHERE UA='SI'";
	$resultadon=$connect->query($queryn);
	$rown = $resultadon->fetch_row();
	$entradas = $rown[0];*/

	//checa movimientos
		//if ($TipoCuentaUser=='admin'){
		$querymov = "SELECT * FROM proyectos WHERE Clave_Proyecto='$Clave_Proyectonpe'";
	//}else{
		//$querymov = "SELECT * FROM proyectos WHERE $AreaCdt='SI' AND Clave_Proyecto='$Clave_Proyectonpe'";
	//}
		print($querymov);

		$resultadomov=$connect->query($querymov);

		$resultados=$connect->query($querymov);
		$rowsmov = $resultados->fetch_assoc();
		$QueryRefProy = $rowsmov["Clave_Proyecto"];
		//echo "<br>";
		//echo "QueryRefProy: ".$QueryRefProy." len: ".strlen($QueryRefProy);
		//echo "<br>";
		//echo "Clave_Proyecto: ".$Clave_Proyectonpe." len: ".strlen($Clave_Proyectonpe);

		//$AreaCdt = $_GET["AreaCdt"];
		if ($TipoCuentaUser=='admin'){

			if ($Clave_Proyectonpe==$QueryRefProy) {
				$query = "UPDATE proyectos set Proyecto='$Proyecto_Nuevonpe', Responsable='$Responsable_Proyectonpe',
				Colaborador='$Colaborador_Proyectonpe', ANALISIS='$CdtAnalisisnpe', DIFUSION='$CdtDifusionnpe', LEDA='$CdtLedanpe',
				INFORMATICA='$CdtInformaticanpe', IDP='$CdtIdpnpe', DISA='$CdtDisanpe', TETRA='$CdtTetranpe', TELEMANDO='$CdtTelemandonpe', MEJORA='$CdtMejoraContnpe',
				NombreUsuarioMovimiento='$NombreCompletoUser', FechaInicio='$FechaInicio_Proyectonpe',
				FechaVencimiento1='$FechaVencimiento1_Proyectonpe', FechaVencimiento2='$FechaVencimiento2_Proyectonpe',
				Tipo='$Tiponpe', Movimiento='CAMBIO', FechaMovimiento='$FechaMovimiento_HMS', AdjuntoGinp='$nomFileNvoProyOfGinp'
				WHERE Clave_Proyecto='$Clave_Proyectonpe'";

				} else {
		  		//echo '<h1>otro anio, movimiento alta</h1><br>';
					$query = "INSERT INTO proyectos (Clave_Proyecto, Proyecto, ANALISIS, DIFUSION, LEDA, INFORMATICA, IDP, DISA, TETRA, TELEMANDO, MEJORA,
					Responsable, Colaborador, NombreUsuarioMovimiento, FechaInicio, FechaVencimiento1, FechaVencimiento2, Tipo, Movimiento, FechaMovimiento, AdjuntoGinp)
					VALUES('$Clave_Proyectonpe', '$Proyecto_Nuevonpe', '$CdtAnalisisnpe', '$CdtDifusionnpe', '$CdtLedanpe', '$CdtInformaticanpe',
					'$CdtIdpnpe', '$CdtDisanpe', '$CdtTetranpe', '$CdtTelemandonpe', '$CdtMejoraContnpe', '$Responsable_Proyectonpe', '$Colaborador_Proyectonpe', '$NombreCompletoUser',
					'$FechaInicio_Proyectonpe', '$FechaVencimiento1_Proyectonpe', '$FechaVencimiento2_Proyectonpe', '$Tiponpe', 'ALTA', '$FechaMovimiento_HMS',
					'$nomFileNvoProyOfGinp')";
				}
			}else{
				if ($Clave_Proyectonpe==$QueryRefProy) {
					$query = "UPDATE proyectos set Proyecto='$Proyecto_Nuevonpe', Responsable='$Responsable_Proyectonpe',
					Colaborador='$Colaborador_Proyectonpe', NombreUsuarioMovimiento='$NombreCompletoUser',
					FechaInicio='$FechaInicio_Proyectonpe', FechaVencimiento1='$FechaVencimiento1_Proyectonpe',
					FechaVencimiento2='$FechaVencimiento2_Proyectonpe', Tipo='$Tiponpe', Movimiento='CAMBIO',
					FechaMovimiento='$FechaMovimiento_HMS', AdjuntoGinp='$nomFileNvoProyOfGinp' WHERE Clave_Proyecto='$Clave_Proyectonpe'";
					} else {
			  		//echo '<h1>otro anio, movimiento alta</h1><br>';
						$query = "INSERT INTO proyectos (Clave_Proyecto, Proyecto, $AreaCdt, Responsable, Colaborador, NombreUsuarioMovimiento,
						FechaInicio, FechaVencimiento1, FechaVencimiento2, Tipo, Movimiento, FechaMovimiento, AdjuntoGinp)
						VALUES('$Clave_Proyectonpe', '$Proyecto_Nuevonpe', 'SI', '$Responsable_Proyectonpe', '$Colaborador_Proyectonpe', '$NombreCompletoUser',
						'$FechaInicio_Proyectonpe', '$FechaVencimiento1_Proyectonpe', '$FechaVencimiento2_Proyectonpe', '$Tiponpe', 'ALTA', '$FechaMovimiento_HMS',
						'$nomFileNvoProyOfGinp')";
					}
			}
	print($query);

	$resultado=$connect->query($query);

	//descomentar
	header('Refresh:0; url=../menu.php?ExpedienteUser='.$ExpedienteUser.' & NombreCompletoUser='.$NombreCompletoUser.' & AreaCdt='.$AreaCdt.' & Usuario='.$Usuario.' & TipoCuentaUser='.$TipoCuentaUser);

	//ANTES header('Refresh:0; url=../menu.php?AreaCdt='.$AreaCdt.' & Usuario='.$Usuario. ' & entradas='.$entradas);/
?>

</body>
</html>

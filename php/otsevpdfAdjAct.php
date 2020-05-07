<?php require_once('../conn/connect.php') ?>
<?php
date_default_timezone_set('America/Mexico_City');
?>

 <html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Archivo adjunto</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

		<script type="text/javascript">
			history.forward();
		</script>
		<style media="screen">
		.tab-pane{
  	height:100%;
  	overflow-y:scroll;
  	width:100%;
		}
		.my-custom-scrollbar {
		position: relative;
		height: 100%;/*Height table StatusOTs*/
		overflow: auto;
		}
		.table-wrapper-scroll-y {
		display: block;
		}
		.my-custom-scrollbarQc {
		position: relative;
		height: 471px;/*Height table QueryOTs*/
		overflow: auto;
		}
		.my-custom-scrollbarAdjDocProy {
		position: relative;
		height: 100%;/*Height table QueryOTs*/
		overflow: auto;
		}
		body {
		padding-top: 0px;
		padding-bottom: 20px;
		overflow:hidden;
		background-color:  #cfcfcf;
		}
		/*Estilo para bullet Ok*/
		.dot {
  		height: 25px;
  		width: 25px;
  		background-color: #4db332;/*Green*/
  		border-radius: 50%;
  		display: inline-block;
		}
		</style>
	</head>
	<body>

    <div class="">
    	<input class="form-control" type="hidden" value="<?php echo trim($_GET["ExpedienteUser"]); ?>" name="ExpedienteUser" id="ExpedienteUser">
    	<input class="form-control" type="hidden" value="<?php echo trim($_GET["NombreCompletoUser"]); ?>" name="NombreCompletoUser" id="NombreCompletoUser">
    	<input class="form-control" type="hidden" value="<?php echo trim($_GET["Area"]); ?>" name="Area" id="Area">
    	<input class="form-control" type="hidden" value="<?php echo trim($_GET["Usuario"]); ?>" name="Usuario" id="Usuario">
    	<input class="form-control" type="hidden" value="<?php echo trim($_GET["TipoCuentaUser"]); ?>" name="TipoCuentaUser" id="TipoCuentaUser">
    </div>

    <?php
    $openf = isset($_GET['openf']) ? $_GET['openf'] : '';
    $Area = utf8_encode(trim($_GET["Area"]));
    $Usuario=trim($_GET['Usuario']);
    $TipoCuentaUser=trim($_GET['TipoCuentaUser']);
    $NombreCompletoUser=trim($_GET['NombreCompletoUser']);
    $ExpedienteUser=trim($_GET['ExpedienteUser']);
    $AnioMovimiento = date('Y', time());

    $Adjunto_Actividad = '../docs-Adj_Actividades/'.$openf.'.pdf';
    //echo "../menu.php?ExpedienteUser=".$ExpedienteUser." & NombreCompletoUser=".$NombreCompletoUser." & Area=".$Area." & Usuario=".$Usuario." & TipoCuentaUser=".$TipoCuentaUser;
    $href="../menu.php?ExpedienteUser=".$ExpedienteUser." & NombreCompletoUser=".$NombreCompletoUser." & Area=".$Area." & Usuario=".$Usuario." & TipoCuentaUser=".$TipoCuentaUser;
    ?>

    <div id="cabecera_izquierda">
          <img src="../img/header4.png" width="100%" id="header">
    </div>
    <div class="container col-sm-12">
			<div class="form-group row"><br>
				<div style="text-align:right" class="col-sm-12">
					<a style="color:#8B008B" href="../login.php"><strong><u>Cerrar sesi&oacuten</u></strong></a>
				</div>
			</div>
		</div>
		<nav>
		  <div class="nav navbar-light nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link" href="<?php echo $href ;?>"><font color="#2E2EFE"><strong><u>Regresar</u></strong></font></a>
		  </div>
		</nav>
		<div class="container col-sm-12">
			<div class="form-group row"><br>
				<div class="col-sm-12">

          <object data="<?php echo $Adjunto_Actividad; ?>" type="application/pdf" width="100%" height="650px">

					</object>
				</div>
			</div>
		</div>
	</body>
</html>

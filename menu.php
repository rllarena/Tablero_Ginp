<?php require_once('conn/connect.php') ?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Proyectos GINP 2020</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="js/ajaxB.js"></script>
		<script type="text/javascript" src="js/ajax_form_EnterKey.js"></script>

		<!--<link rel="icon" href="img/logoOr.jpg">-->
		<script type="text/javascript">
			history.forward();
		</script>
		<style media="screen">
		footer {
			width: 100%;
			background: #cfcfcf;
			text-align: center;
			line-height: 20px;
			color: black;
			font-size: 15px;
		}
		.my-custom-scrollbar {
		position: relative;
		height: 550px;/*Height table StatusOTs*/
		overflow: auto;
		}
		.table-wrapper-scroll-y {
		display: block;
		}
		body{
		padding-top: 0px;
		padding-bottom: 20px;
		background-color:  #cfcfcf;
		background: #FFFFFF;
		background: -webkit-linear-gradient(to right, #F6FAFF, #F6F9FF);
		background: linear-gradient(to right, #F6FAFF, #F6F9FF);
		min-height: 100vh;
		}
		.dot{
  		height: 25px;
  		width: 25px;
  		background-color: #4db332;/*Green*/
  		border-radius: 50%;
  		display: inline-block;
		}

		th{
			color: white;
		 	text-align: center;
			vertical-align: bottom;
			padding-bottom: 3px;
			padding-left: 5px;
			padding-right: 5px;
			background: #6790c6;
		}
		 .tableFixHead{
	 		overflow-y: auto;
	 	}

	 	.tableFixHead th{
	 		position: sticky;
			top: 22px;
	 		padding: 1px;
	 	}
		.table td, .table th {
			padding: 1em;
			vertical-align: middle;
			border-top: 1px solid #dee2e6;
		}

		.tableFixHead th.encabezado{
	 		position: sticky;
			top: -1;
	 		padding: 1px;
	 	}
		.verticalText{
				 text-align: center;
				 vertical-align: middle;
				 width: 20px;
				 margin: 0px;
				 padding: 0px;
				 padding-left: 3px;
				 padding-right: 3px;
			 	 padding-top: 10px;
				 white-space: nowrap;
				 -webkit-transform: rotate(-90deg);
				 -moz-transform: rotate(-90deg);
		};
		</style>
	</head>
	<body>

	<!--<script>
	function linkOts(a) {
		window.location="../ots/login.php?Area='DISA'";
		return true;
	}
</script>-->

    <div id="cabecera_izquierda">
          <img src="img/titulos.png" width="100%" id="header">
    </div>

		<!-- <div class="container col-sm-12">
			<div class="form-group row">
				<div class="col-sm-12">

				<p><a style="color:#FF5A43" href="login.php"><span class="glyphicon glyphicon-log-in"></span><strong>Salir</strong></a></p>

				</div>


			</div>
		</div> -->

		<div class="container col-sm-12" style="width:100%">

				<p><a style="color:#FF5A43" href="login.php"><span class="glyphicon glyphicon-log-in"></span><strong>Salir</strong></a></p>

		</div>
		<nav>
		  <div class="nav navbar-light nav-tabs" id="nav-tab" role="tablist">
		    <a class="nav-item nav-link active" id="nav-inicial-tab" data-toggle="tab" href="#nav-inicial" role="tab" aria-controls="nav-inicial" aria-selected="true">Inicio</a>

				    <a class="nav-item nav-link" id="nav-tabla-act-tab" data-toggle="tab" href="#nav-tabla-act" role="tab" aria-controls="nav-tabla-act" aria-selected="false">Tablero de actividades</a>
						<a class="nav-item nav-link" id="nav-actualizar-actividad-tab" data-toggle="tab" href="#nav-actualizar-actividad" role="tab" aria-controls="nav-actualizar-actividad" aria-selected="false">Actualizar actividad</a>


						<?php
							if ($_GET["TipoCuentaUser"]=='admin'){?>
								<a class="nav-item nav-link" id="nav-NuevosProyectosEdit-tab" data-toggle="tab" href="#nav-NuevosProyectosEdit" role="tab" aria-controls="nav-NuevosProyectosEdit" aria-selected="false">Editar/registrar nuevas Tareas</a>
							<?php	}?>




						<!--<a class="nav-item nav-link" id="nav-NuevosProyectosEdit-tab" data-toggle="tab" href="#nav-NuevosProyectosEdit" role="tab" aria-controls="nav-NuevosProyectosEdit" aria-selected="false">Tareas/Proyectos</a>-->

				<a style="color:blue;" class="nav-item nav-link" id="TabData" data-toggle="tab" href="#nav-inicial" role="tab" aria-controls="" aria-selected="false">
				Usuario: <strong><?php echo $_GET["Usuario"];?></strong> &Aacuterea: <strong><?php echo utf8_decode($_GET["Area"]);?></strong> Cuenta: <strong><?php echo $_GET["TipoCuentaUser"];?></strong></a>
		  </div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-inicial" role="tabpanel" aria-labelledby="nav-inicial-tab">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  				<ol class="carousel-indicators">
    				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  				</ol>
  			<div class="carousel-inner">
    			<div class="carousel-item active">
      			<img src="img/i1.jpg" class="d-block w-100" alt="...">
    			</div>
    		<div class="carousel-item">
      			<img src="img/i2.jpg" class="d-block w-100" alt="...">
    		</div>
    		<div class="carousel-item">
      			<img src="img/i3.jpg" class="d-block w-100" alt="...">
    		</div>
				<div class="carousel-item">
      			<img src="img/i4.jpg" class="d-block w-100" alt="...">
    		</div>
  		</div>
  		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="sr-only">Anterior</span>
  		</a>
  		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
    		<span class="sr-only">Siguiente</span>
  		</a>
			</div>
		</div>

		<!--***********************************Inicio Tablero Actividades *****************************************************-->
<div class="tab-pane fade" id="nav-tabla-act" role="tabpanel" aria-labelledby="nav-tabla-act-tab">
	<div id="actividades_b" class="container-fluid col-sm-12">
		<div class="form-group"><br>
			<div class="row">
				<div class="col-sm-12">
					<form action="" method="post" name="search_form" id="search_form">
						<div id="cc2" class="container col-sm-12">
							<div id="fg2" class="form-group row">
								<div class="col-sm-3">
									<div id="Entradas" class="tabcontent">
										<div class="col-sm-12 center">
											<label for="search_actividad">Actividad</label>
											<input class="form-control" type="text" name="search_actividad" id="search_actividad" placeholder="Palabra a buscar">
											<input class="form-control" type="hidden" value="<?php echo trim($_GET["Area"]); ?>" text="<?php echo trim($_GET["Area"]); ?>" name="search_area_user" id="search_area_user">
										</div>
									</div>
								</div>


								<?php
									$Area = utf8_decode(trim($_GET["Area"]));
									if ($_GET["TipoCuentaUser"]=='admin'){
										$consultaproy = "SELECT DISTINCT ClaveProyecto FROM actividades ORDER BY ClaveProyecto DESC";
										}else{
											$consultaproy = "SELECT DISTINCT ClaveProyecto FROM actividades WHERE Area='$Area' ORDER BY ClaveProyecto DESC";
										}
										$resultadoproy = $connect->query($consultaproy);
										$filaproy = mysqli_fetch_assoc($resultadoproy);
										$totalproy = mysqli_num_rows($resultadoproy);
								 ?>

								<div class="col-sm-2">
									<label for="search_proyecto">Proyecto</label>
									<select class="form-control" name="search_proyecto" id="search_proyecto">
										<option>*</option>
										<?php if ($totalproy>0) { ?>
											<?php do { ?>
												<?php
													echo '<option>'.trim($filaproy['ClaveProyecto']).'</option>';
												?>
										<?php } while ($filaproy=mysqli_fetch_assoc($resultadoproy)); ?>
										<?php }
										elseif ($totalproy>0) echo '';
										else echo '<h2>No se encontraron resultados</p>';
										?>
									</select>
								</div>

								<?php
									$Area = utf8_decode(trim($_GET["Area"]));
									if ($_GET["TipoCuentaUser"]=='admin'){
										$consultarea = "SELECT DISTINCT Area FROM actividades ORDER BY ClaveProyecto DESC";
										$resultadoarea = $connect->query($consultarea);
										$filaarea = mysqli_fetch_assoc($resultadoarea);
										$totalarea = mysqli_num_rows($resultadoarea);?>

										<div class="col-sm-2">
											<label for="search_area">&Aacuterea</label>
											<select class="form-control" name="search_area" id="search_area">
												<option>*</option>
												<?php if ($totalarea>0) { ?>
													<?php do { ?>
															<?php
																echo '<option>'.trim($filaarea['Area']).'</option>';
															?>
													<?php } while ($filaarea=mysqli_fetch_assoc($resultadoarea)); ?>
												<?php }
												elseif ($totalarea>0) echo '';
												else echo '<h2>No se encontraron resultados</p>';
												?>
											</select>
										</div>

										<?php
										}else{
											//disable listbox area
										?>

										<div class="col-sm-2">
											<label for="search_area">&Aacuterea</label>
											<select class="form-control" name="search_area" id="search_area">
												<option><?php echo $Area; ?></option>
											</select>
										</div>

								<?php
										}
								?>



								<div class="col-sm-2">
									<label for="search_prioridad">Prioridad</label>
									<select class="form-control" name="search_prioridad" id="search_prioridad">
										<option>*</option>
										<option>Normal</option>
										<option>Alta</option>
										<!--<option>Urgente</option>-->
									</select>
								</div>

								<div class="col-sm-2">
									<label for="search_estado">Estatus</label>
									<select class="form-control" name="search_estado" id="search_estado">
										<option>*</option>
										<option>Abierta</option>
										<option>Cerrada</option>
										<option>Retrasada</option>
									</select>
								</div>


								<div class="col-sm-1"><br>
									<button type="submit" class="btn btn-info" name="buscar" id="buscar">Buscar</button>
								</div>

							</div><!-- end fg2 -->
							<div id="resultados"></div>
						</div><!-- end cc2 -->

						<?php
							$Area = utf8_decode(trim($_GET["Area"]));
							if ($_GET["TipoCuentaUser"]=='admin'){
									$consulta = "SELECT * FROM actividades ORDER BY Tarea DESC";
									}else{
										$consulta = "SELECT * FROM actividades WHERE Area='$Area' ORDER BY Tarea DESC";
									}
									$resultado = $connect->query($consulta);
									$fila = mysqli_fetch_assoc($resultado);
									$total = mysqli_num_rows($resultado);
						?>
						<?php if ($total>0) { ?>

					<div id="actividades" class="container-fluid col-sm-12">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<div class="col-lg-12 mx-auto bg-light text-dark rounded shadow">

										<div class="table-responsive">
											<h5>Registradas en <?php echo $Area; ?>: <?php echo $total; ?></h5>
											<?php
						if ($_GET["TipoCuentaUser"]=='admin'){?>
							<!--<p style="float:left;"><a style="color:#FF5A43" href="e/pdf.php"><span class="glyphicon glyphicon-log-in"></span><strong style="margin-right: 30px;">Generar Excel</strong></a></p>-->
							<!-- <a style="color:#FF5A43" href="e/pdf.php"><span class="glyphicon glyphicon-log-in"></span><strong style="margin-right: 30px;">Generar Excel</strong></a>-->
						<?php	}?>
											<div class="tableFixHead">
												<table id="tabla" class="table table-bordered table-striped mb-0 table-wrapper-scroll-y my-custom-scrollbar">
													<thead bgcolor="#6790C6">
														<tr>
															<th class="encabezado" colspan="4" scope="colgroup">A c t  i v i d a d e s</th>
															<th class="encabezado" colspan="4" scope="colgroup">A v a n c e s</th>
															<th class="encabezado" colspan="3" scope="colgroup">F e c h a s</th>
															<th class="encabezado" colspan="4" scope="colgroup">I n f o r m a c i &oacute n</th>
														</tr>

														<tr>
															<th><font size="-1">Tarea</font></th>
															<th><font size="-1">Actividad</font></th>
															<th><font size="-1" style="margin-left:20px; margin-right:20px;">Realizada</font></th>
															<th><font size="-1">Adjunto</font></th>
															<th><font size="-1">Avance</font></th>
															<th><font size="-1">Prioridad</font></th>
															<th><font size="-1">Vencimiento</font></th>
															<th><font size="-1">Estatus</font></th>
															<th><font size="-1" style="margin-left:32px; margin-right:32px;">Inicio</font></th>
															<th><font size="-1" style="margin-left:10px; margin-right:10px;">Vencimiento</font></th>
															<th><font size="-1" style="margin-left:30px; margin-right:30px;">Cierre</font></th>
															<th><font size="-1">Notas</font></th>
															<th><font size="-1">Oficio</font></th>
															<th><font size="-1">Proyecto</font></th>
															<th><font size="-1">&Aacuterea</font></th>
														</tr>
													</thead>

													<tbody>
														<?php do { ?>
														<tr>
															<td style="text-align:center;"><font size="-1"><?php echo $fila['Tarea'];?></font></td>
															<td><font size="-1"><?php echo $fila['Actividad'];?></font></td>
															<td style="text-align:center;"><font size="-1"><?php echo date('d-m-Y',strtotime($fila['FechaActividad']));?></font></td>
															<?php
															$openf=trim($fila['AdjuntoActividad']);
															$Area = utf8_decode(trim($_GET["Area"]));
															$Usuario=trim($_GET['Usuario']);
															$TipoCuentaUser=trim($_GET['TipoCuentaUser']);
															$NombreCompletoUser=trim($_GET['NombreCompletoUser']);
															$ExpedienteUser=trim($_GET['ExpedienteUser']);

															if (strlen($fila['AdjuntoActividad'])>0) {
																	echo "<td style='text-align:center;'><a href='php/otsevpdfAdjAct.php?openf=".$openf."&Area=".$Area."&Usuario=".$Usuario."&TipoCuentaUser=".$TipoCuentaUser."&NombreCompletoUser=".$NombreCompletoUser."&ExpedienteUser=".$ExpedienteUser."#toolbar=0'><img src='img/ico-reporte0.png' height='35' width='35'></td>";
															} else {
																	echo "<td style='text-align:center;'></td>";
															}

															?>
															<td style="text-align:center;"><font size="-1"><?php echo $fila['AvancePorcentaje'];?>%</font></td>

															<!-- P L A Z O-->
															<?php
																$hoy= new DateTime();
																$FInicio = $fila['FechaInicio'];
																$FVencimiento = $fila['FechaVencimiento'];
																$date1 = new DateTime($fila['FechaInicio']);
																$date2 = new DateTime($fila['FechaVencimiento']);
																$diff = $date1->diff($date2);
																$Plazo = $diff->days;

																$diffQ = $date2->diff($hoy);
																$Quedan = $diffQ->days;

																$hoy2 = new DateTime(date('Y-m-d'));
																$diff2= $hoy2->diff($date2);
																$didi=$diff2->days;
																$diferencia= $diff2->format('%R%a d&iacuteas');
																$ndiff= $diff2->format('%R%a');
																$signo=substr($ndiff,0,1);
																$numerod=(int)substr($ndiff,1,strlen($ndiff)-1);

																if ( strstr( $diferencia, '+' ) ) {
  																$algo= "Faltan ".$didi." d&iacuteas";
																	/*$UpdateStatusByTime = "UPDATE actividades set EstadoDeLaActividad='ABIERTAAA' WHERE	Tarea='".$fila['Tarea']."'";
																	$DoUpdateStatus = $connect->query($UpdateStatusByTime);*/
																	} else {
  																	$algo = "Retraso de ".$didi." d&iacuteas";
																		/*$UpdateStatusByTime = "UPDATE actividades set EstadoDeLaActividad='RETRASADAAA' WHERE	Tarea='".$fila['Tarea']."'";
																		$DoUpdateStatus = $connect->query($UpdateStatusByTime);*/
																	}
															?>

															<td style="text-align:center;"><font size="-1"><?php echo $fila['PrioridadDeLaActividad'];?></font></td>

															<?php
																if ($fila['AvancePorcentaje']<'100'){
																	echo "<td style='text-align:center;'><font size='-1'>".$algo."</font></td>";
																}else{
																	echo "<td style='text-align:center;'><font size='-1'>-</font></td>";
																}
															?>

															<?php
																if ($numerod<=5 and $signo=="+" and $fila['AvancePorcentaje']<'100'):
																	echo "<td style='text-align:center;'><img src='img/ico-reloj-amarillo.png' height='38' width='36'></td>";
																	elseif ($numerod>=5 and $signo=="+" and $fila['AvancePorcentaje']<'100'):
																		echo "<td style='text-align:center;'><img src='img/ico-reloj-azul.png' height='38' width='35'></td>";
																	elseif ($signo=="-" and $fila['AvancePorcentaje']<'100'):
																			echo "<td style='text-align:center;'><img src='img/ico-reloj-rojo.png' height='38' width='35'></td>";
																	elseif ($fila['AvancePorcentaje']=='100'):
																				echo "<td style='text-align:center;'><img src='img/ico-cerrada.png' height='35' width='35'></td>";
																	endif;
 															?>

															<td style="text-align:center;"><font size="-1"><?php echo date('d-m-Y',strtotime($fila['FechaInicio']));?></font></td>
															<td style="text-align:center;"><font size="-1"><?php echo date('d-m-Y',strtotime($fila['FechaVencimiento']));?></font></td>

															<?php
																$AnioCierre = date('Y', strtotime($fila['FechaCierre']));
																$AnioInicio = date('Y', strtotime($fila['FechaInicio']));
																if($AnioInicio<$AnioCierre){
																	$fcierre=date('d-m-Y',strtotime($fila['FechaCierre']));
																}else{
																	$fcierre="";
																}
															?>

															<td style="text-align:center;"><font size="-1"><?php echo $fcierre;?></font></td>
															<td style="text-align:left;"><font size="-1"><?php echo $fila['Notas'];?></font></td>

															<?php
															$openf=trim($fila['AdjuntoGinpOficio']);
															$Area = utf8_decode(trim($_GET["Area"]));
															$Usuario=trim($_GET['Usuario']);
															$TipoCuentaUser=trim($_GET['TipoCuentaUser']);
															$NombreCompletoUser=trim($_GET['NombreCompletoUser']);
															$ExpedienteUser=trim($_GET['ExpedienteUser']);

															if (strlen($fila['AdjuntoGinpOficio'])>0) {
																	echo "<td style='text-align:center;'><a href='php/otsevpdfAdjOfGinp.php?openf=".$openf."&Area=".$Area."&Usuario=".$Usuario."&TipoCuentaUser=".$TipoCuentaUser."&NombreCompletoUser=".$NombreCompletoUser."&ExpedienteUser=".$ExpedienteUser."#toolbar=0'><img src='img/ico-reporte0.png' height='35' width='35'></td>";
															} else {
																	echo "<td style='text-align:center;'></td>";
															}

															?>


															<td style="text-align:left;"><font size="-1"><?php echo $fila['ClaveProyecto'];?></font></td>
															<td style="text-align:left;"><font size="-1"><?php echo $fila['Area'];?></font></td>
														</tr><!-- tr into do -->

														<?php } while ($fila=mysqli_fetch_assoc($resultado)); ?>
														<?php }//Total >0
														elseif ($total>0 && $search=='') echo '';
														else echo '';
														?>
														</tbody>
													</table>
												</div><!-- table fixed-->
											</div><!-- table responsive-->
										</div><!-- rounded -->
									</div><!-- csm12 -->
								</div><!-- row -->
							</div><!-- form group row -->
						</div><!-- container-fluid -->
					</form>
				</div><!-- col-sm-12 -->
			</div><!-- row -->
		</div><!-- form group -->
	</div><!-- actividades -->
</div><!-- tab panes -->
			<!--***********************************Fin Tablero de Actividades **************************************************************-->

		<!--***********************************Inicio Tab Actualizar actividades **************************************************************-->
		<div class="tab-pane fade" id="nav-actualizar-actividad" role="tabpanel" aria-labelledby="nav-actualizar-actividad-tab">

			<script>
function showActs(str) {
	/*alert(str);*/
	if (str == "") {
		document.getElementById("txtHintAct").innerHTML = "";
		return;
		} else {
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
			} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("txtHintAct").innerHTML = this.responseText;
					var table = document.getElementById('tableAct');
					var val0 =table.rows[1].cells[0].innerHTML;
					document.getElementById("nTareaActividad").value = val0;
					var val1 =table.rows[1].cells[1].innerHTML;
					document.getElementById("AvanceActividad").value = val1;
					var val2 =table.rows[1].cells[2].innerHTML;
					document.getElementById("EstatusActividad").value = val2;
					var val3 =table.rows[1].cells[3].innerHTML;
					document.getElementById("AreaActividad").value = val3;
					var val4 =table.rows[1].cells[4].innerHTML;
					document.getElementById("FechaInicioActividad").value = val4;
					var val5 =table.rows[1].cells[5].innerHTML;
					document.getElementById("FechaVencimientoActividad").value = val5;
					var val6 =table.rows[1].cells[6].innerHTML;
					document.getElementById("FechaCierreActividad").value = val6;
					var val7 =table.rows[1].cells[7].innerHTML;
					document.getElementById("PrioridadActividad").value = val7;
					var val8 =table.rows[1].cells[8].innerHTML;
					document.getElementById("ProyectoActividad").value = val8;
					var val9 =table.rows[1].cells[9].innerHTML;
					document.getElementById("ResponsableActividad").value = val9;
					var val10 =table.rows[1].cells[10].innerHTML;
					document.getElementById("ColaboradorActividad").value = val10;
					var val11 =table.rows[1].cells[11].innerHTML;
					document.getElementById("NotasActividad").value = val11;
					}
			};
			xmlhttp.open("GET","getAct.php?q="+str,true);
			xmlhttp.send();
		}
}
</script>
			<form name="frm_actividades" id="frm_actividades" method="POST" action="php/registro_actividades.php" enctype="multipart/form-data">
				<div class="">
					<input class="form-control" type="hidden" value="<?php echo $_GET["ExpedienteUser"]; ?>" name="ExpedienteUser" id="ExpedienteUser">
					<input class="form-control" type="hidden" value="<?php echo $_GET["NombreCompletoUser"]; ?>" name="NombreCompletoUser" id="NombreCompletoUser">
					<input class="form-control" type="hidden" value="<?php echo $_GET["Area"]; ?>" name="Area" id="Area">
					<input class="form-control" type="hidden" value="<?php echo $_GET["Usuario"]; ?>" name="Usuario" id="Usuario">
					<input class="form-control" type="hidden" value="<?php echo $_GET["TipoCuentaUser"]; ?>" name="TipoCuentaUser" id="TipoCuentaUser">
				</div>

				<?php
					$Area = utf8_decode(trim($_GET["Area"]));
					//echo "area en act:".$Area;
					if ($_GET["TipoCuentaUser"]=='admin'){
						$consulta = "SELECT * FROM actividades";
					}else{
						$consulta = "SELECT * FROM actividades WHERE Area='".$Area. "'";
					}
					$resultado = $connect->query($consulta);
					$fila = mysqli_fetch_assoc($resultado);
					$total = mysqli_num_rows($resultado);
					//echo "consulta en act:".$consulta;
				?>

				<div class="container col-sm-12">
					<div class="form-group row">
					<div class="col-sm-7"><br>
						<label for="TareaActividad"><strong>Actividad</strong></label>
						<select style="background-color: #DDFFDD;" class="form-control" name="TareaActividad" id="TareaActividad" onchange="showActs(this.value)">
							<option>Seleccione una actividad.</option>

						<?php if ($total>0) { ?>
									<?php do { ?>
											<?php
											echo '<option>'.$fila['Tarea']." : ".$fila['Actividad'].'</option>';
											?>
									<?php } while ($fila=mysqli_fetch_assoc($resultado)); ?>
						<?php }
						elseif ($total>0) echo '';
						else echo '<h2>No se encontraron resultados</p>';
						?>
						</select>
					</div>
					<input class="form-control" type="hidden" name="nTareaActividad" id="nTareaActividad">
					<div class="col-sm-1"><br>
						<label for="AvanceActividad">Avance %</label>
						<input class="form-control" type="number" name="AvanceActividad" min="0" max="100" id="AvanceActividad">
					</div>
					<div class="col-sm-2"><br>
						<label for="EstatusActividad">Estatus</label>
						<input style="background-color: #BCBDBF;" class="form-control" type="text" readonly="readonly" name="EstatusActividad" id="EstatusActividad">
					</div>
					<div class="col-sm-2"><br>
						<label for="AreaActividad">&Aacuterea</label>
						<input style="background-color: #BCBDBF;" class="form-control" type="text" readonly="readonly" name="AreaActividad" id="AreaActividad">
					</div>

					</div>
				</div>

				<div class="container col-sm-12">
					<div class="form-group row">

									<div class="col-sm-2">
										<label for="FechaInicioActividad">Fecha inicio</label>
										<input style="background-color: #BCBDBF;" class="form-control" type="date" value="<?php echo date("Y-m-d");?>" readonly="readonly" name="FechaInicioActividad" id="FechaInicioActividad">
									</div>

									<div class="col-sm-2">
										<label for="FechaVencimientoActividad">Fecha vencimiento</label>
										<input style="background-color: #BCBDBF;" class="form-control" type="date" value="<?php echo date("Y-m-d");?>" readonly="readonly" name="FechaVencimientoActividad" id="FechaVencimientoActividad">
									</div>

									<div class="col-sm-2">
										<label for="FechaCierreActividad">Fecha cierre</label>
										<input style="background-color: #BCBDBF;" class="form-control" type="date" value="<?php echo date("Y-m-d");?>" readonly="readonly" name="FechaCierreActividad" id="FechaCierreActividad">
									</div>

									<div class="col-sm-1">
										<label for="PrioridadActividad">Prioridad</label>
										<input style="background-color: #BCBDBF;" class="form-control" type="text" readonly="readonly" name="PrioridadActividad" id="PrioridadActividad">
									</div>

									<div class="col-sm-5">
										<label for="ProyectoActividad">Proyecto</label>
										<input style="background-color: #BCBDBF;" class="form-control" type="text" readonly="readonly" name="ProyectoActividad" id="ProyectoActividad">
									</div>

					</div>
				</div>

				<div class="container col-sm-12">
					<div class="form-group row"><br>

						<div class="col-sm-6">
							<label for="ResponsableActividad">Responsable</label>
							<input style="background-color: #BCBDBF;" class="form-control" type="text" readonly="readonly" maxlength="50" name="ResponsableActividad" id="ResponsableActividad">
						</div>

						<div class="col-sm-6">
							<label for="ColaboradorActividad">Colaborador</label>
							<input class="form-control" type="text" maxlength="50" name="ColaboradorActividad" id="ColaboradorActividad">
						</div>


					</div>
				</div>

				<div class="container col-sm-12">
					<div class="form-group row"><br>
					<div class="col-sm-12">
						<label for="NotasActividad"><strong>Notas</strong></label>
						<textarea class="form-control" maxlength="500" name="NotasActividad" id="NotasActividad" rows="3" margin-left="0px" width="100%"></textarea>
					</div>
						</div>
				</div>

				<div class="container col-sm-12">
					<div class="form-group row">

						<div id="txtHintAct"><b></b></div>

								<div class="col-sm-8">
									<label style="display:none;" for="AdjuntoActividad">Adjuntar documento de la actividad</label>
									<input style="display:none;" type="file" accept="application/pdf" class="form-control-file" name="AdjuntoActividad" id="AdjuntoActividad" aria-describedby="fileHelp">
								</div>

					</div>
				</div>

				<div class="container">
						<p style="text-align:center;">
							<input class="btn btn-primary" type="submit" value="Actualizar registro">
						</p>
				</div>
			</form>
		</div>
			<!--***********************************Fin Tab Actualizar actividades **************************************************************-->

			<!--***********************************Inicio Tab Nuevos Proyectos & Edit **************************************************************-->
			<div class="tab-pane fade" id="nav-NuevosProyectosEdit" role="tabpanel" aria-labelledby="nav-NuevosProyectosEdit-tab">

							<script>
				function showActsAdmin(str) {
					/*alert(str);*/
					if (str == "") {
						document.getElementById("txtHintActAdmin").innerHTML = "";
						return;
						} else {
						if (window.XMLHttpRequest) {
							// code for IE7+, Firefox, Chrome, Opera, Safari
							xmlhttp = new XMLHttpRequest();
							} else {
							// code for IE6, IE5
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function() {
								if (this.readyState == 4 && this.status == 200) {
									document.getElementById("txtHintActAdmin").innerHTML = this.responseText;
									var table = document.getElementById('tableActAdmin');
									var val0 =table.rows[1].cells[0].innerHTML;
									document.getElementById("nTareaActividadAdmin").value = val0;
									var val1 =table.rows[1].cells[1].innerHTML;
									document.getElementById("AvanceActividadAdmin").value = val1;
									var val2 =table.rows[1].cells[2].innerHTML;
									document.getElementById("EstatusActividadAdmin").value = val2;
									var val3 =table.rows[1].cells[3].innerHTML;
									document.getElementById("AreaActividadAdmin").value = val3;
									var val4 =table.rows[1].cells[4].innerHTML;
									document.getElementById("FechaInicioActividadAdmin").value = val4;
									var val5 =table.rows[1].cells[5].innerHTML;
									document.getElementById("FechaVencimientoActividadAdmin").value = val5;
									var val6 =table.rows[1].cells[6].innerHTML;
									document.getElementById("FechaCierreActividadAdmin").value = val6;
									var val7 =table.rows[1].cells[7].innerHTML;
									document.getElementById("PrioridadActividadAdmin").value = val7;
									var val8 =table.rows[1].cells[8].innerHTML;
									document.getElementById("ProyectoActividadAdmin").value = val8;
									var val9 =table.rows[1].cells[9].innerHTML;
									document.getElementById("ResponsableActividadAdmin").value = val9;
									var val10 =table.rows[1].cells[10].innerHTML;
									document.getElementById("ColaboradorActividadAdmin").value = val10;
									var val11 =table.rows[1].cells[11].innerHTML;
									document.getElementById("NotasActividadAdmin").value = val11;
									}
							};
							xmlhttp.open("GET","getActAdmin.php?q="+str,true);
							xmlhttp.send();
						}
				}
				</script>
							<form name="frm_actividadesAdmin" id="frm_actividadesAdmin" method="POST" action="php/registro_actividadesAdmin.php" enctype="multipart/form-data">
								<div class="">
									<input class="form-control" type="hidden" value="<?php echo $_GET["ExpedienteUser"]; ?>" name="ExpedienteUser" id="ExpedienteUser">
									<input class="form-control" type="hidden" value="<?php echo $_GET["NombreCompletoUser"]; ?>" name="NombreCompletoUser" id="NombreCompletoUser">
									<input class="form-control" type="hidden" value="<?php echo $_GET["Area"]; ?>" name="Area" id="Area">
									<input class="form-control" type="hidden" value="<?php echo $_GET["Usuario"]; ?>" name="Usuario" id="Usuario">
									<input class="form-control" type="hidden" value="<?php echo $_GET["TipoCuentaUser"]; ?>" name="TipoCuentaUser" id="TipoCuentaUser">
								</div>

								<?php
									$Area = $_GET["Area"];
									if ($_GET["TipoCuentaUser"]=='admin'){
										$consulta = "SELECT * FROM actividades";
									}else{
										$consulta = "SELECT * FROM actividades WHERE Area='".$Area. "'";
									}
									$resultado = $connect->query($consulta);
									$fila = mysqli_fetch_assoc($resultado);
									$total = mysqli_num_rows($resultado);
									//echo "total:".$total;
								?>

								<div class="container col-sm-12">
									<div class="form-group row">
									<div class="col-sm-7"><br>
										<label for="TareaActividadAdmin"><strong>Actividad</strong></label>
										<select style="background-color: #DDFFDD;" class="form-control" name="TareaActividadAdmin" id="TareaActividadAdmin" onchange="showActsAdmin(this.value)">
											<option>Seleccione una actividad o aqu&iacute para crear nueva.</option>

										<?php if ($total>0) { ?>
													<?php do { ?>
															<?php
															echo '<option>'.$fila['Tarea']." : ".$fila['Actividad'].'</option>';
															?>
													<?php } while ($fila=mysqli_fetch_assoc($resultado)); ?>
										<?php }
										elseif ($total>0) echo '';
										else echo '<h2>No se encontraron resultados</p>';
										?>
										</select>
									</div>
									<input class="form-control" type="hidden" name="nTareaActividadAdmin" id="nTareaActividadAdmin">
									<div class="col-sm-1"><br>
										<label for="AvanceActividadAdmin">Avance %</label>
										<input class="form-control" type="number" name="AvanceActividadAdmin" min="0" max="100" id="AvanceActividadAdmin">
									</div>
									<div class="col-sm-2"><br>
										<label for="EstatusActividadAdmin">Estatus</label>
										<input style="background-color: #BCBDBF;" class="form-control" type="text" readonly="readonly" name="EstatusActividadAdmin" id="EstatusActividadAdmin">
									</div>
									<div class="col-sm-2"><br>
										<label for="AreaActividadAdmin">&Aacuterea</label>
										<input class="form-control" type="text" id="AreaActividadAdmin" name="AreaActividadAdmin">
									</div>

									</div>
								</div>

								<div class="container col-sm-12">
									<div class="form-group row">

													<div class="col-sm-12">
														<label for="NuevaTareaActividadAdmin">Nueva tarea</label>
														<input class="form-control" type="text" id="NuevaTareaActividadAdmin" name="NuevaTareaActividadAdmin">
													</div>

									</div>
								</div>

								<div class="container col-sm-12">
									<div class="form-group row">

													<div class="col-sm-2">
														<label for="FechaInicioActividad">Fecha inicio</label>
														<input class="form-control" type="date" value="<?php echo date("Y-m-d");?>" id="FechaInicioActividadAdmin" name="FechaInicioActividadAdmin">
													</div>

													<div class="col-sm-2">
														<label for="FechaVencimientoActividadAdmin">Fecha vencimiento</label>
														<input class="form-control" type="date" value="<?php echo date("Y-m-d");?>" id="FechaVencimientoActividadAdmin" name="FechaVencimientoActividadAdmin">
													</div>

													<div class="col-sm-2">
														<label for="FechaCierreActividadAdmin">Fecha cierre</label>
														<input class="form-control" type="date" value="<?php echo date("Y-m-d");?>" id="FechaCierreActividadAdmin" name="FechaCierreActividadAdmin">
													</div>

													<div class="col-sm-1">
														<label for="PrioridadActividadAdmin">Prioridad</label>
														<input class="form-control" type="text" id="PrioridadActividadAdmin" name="PrioridadActividadAdmin">
													</div>

													<div class="col-sm-5">
														<label for="ProyectoActividadAdmin">Proyecto</label>
														<input class="form-control" type="text" id="ProyectoActividadAdmin" name="ProyectoActividadAdmin">
													</div>

									</div>
								</div>

								<div class="container col-sm-12">
									<div class="form-group row"><br>

										<div class="col-sm-6">
											<label for="ResponsableActividadAdmin">Responsable</label>
											<input class="form-control" type="text" maxlength="50" id="ResponsableActividadAdmin" name="ResponsableActividadAdmin">
										</div>

										<div class="col-sm-6">
											<label for="ColaboradorActividadAdmin">Colaborador</label>
											<input class="form-control" type="text" maxlength="50" id="ColaboradorActividadAdmin" name="ColaboradorActividadAdmin">
										</div>


									</div>
								</div>

								<div class="container col-sm-12">
									<div class="form-group row"><br>
									<div class="col-sm-12">
										<label for="NotasActividadAdmin"><strong>Notas</strong></label>
										<textarea class="form-control" maxlength="500" id="NotasActividadAdmin" name="NotasActividadAdmin" rows="3" margin-left="0px" width="100%"></textarea>
									</div>
										</div>
								</div>

								<div class="container col-sm-12">
									<div class="form-group row">

										<div id="txtHintActAdmin"><b></b></div>

												<div class="col-sm-8">
													<label style="display:none;" for="AdjuntoActividadAdmin">Adjuntar GINP oficio</label>
													<input style="display:none;" type="file" accept="application/pdf" class="form-control-file" name="AdjuntoActividadAdmin" id="AdjuntoActividadAdmin" aria-describedby="fileHelp">
												</div>

									</div>
								</div>

								<div class="container">
										<p style="text-align:center;">
											<input class="btn btn-primary" type="submit" value="Actualizar registro">
										</p>
								</div>
							</form>
			</div>
				<!--***********************************Fin Tab Nuevos Proyectos & Edit **************************************************************-->

		</div><!--Fin nav-tabContent-->
		<footer>Calzada Ignacio Zaragoza 614, Col. Cuatro &Aacuterboles, Alcald&iacutea Venustiano Carranza, C.P. 15730<br>Ciudad de M&eacutexico, Tel 5556274092<br>metro.cdmx.gob.mx</footer>
	</body>
</html>

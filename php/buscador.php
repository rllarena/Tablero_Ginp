<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset= ISO-8859-1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Proyectos GINP 2020</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


	<style media="screen">
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

	.table td, .table th {
		padding: 1em;
		vertical-align: middle;
		border-top: 1px solid #dee2e6;
	}

	.tableFixHead th{
		position: sticky;
		top: 22px;
		padding: 1px;
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
		<?php
		function st($str) {
			$ca= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
			$sa= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
			$str = str_replace($ca, $sa ,$str);
			return $str;
		}
?>
		<?php require_once('../conn/connect.php') ?>
			<?php
			//echo "search6: ".$_POST['search6'];
				if (isset($_POST['search']) && $_POST['search2'] && isset($_POST['search3']) && $_POST['search4'] && $_POST['search5'] && $_POST['search6']) {
						if($_POST['search']==''){
							$ActividadB=" <> ''";
						}else{
							$ActividadB=" LIKE '%".$_POST['search']."%' ";
						}

						if($_POST['search2']=='*'){
							$ProyectoB="";
						}else{
							$ProyectoB=" AND ClaveProyecto = '".utf8_decode($_POST['search2'])."' ";
						}

						if($_POST['search3']=='*'){
							$PrioridadB=" <> ''";
						}else{
							$PrioridadB=" = '".$_POST['search3']."' ";
						}

						if ($_POST['search4']=='Abierta'):
							$EstadoB=" AND AvancePorcentaje < 100 ";
							elseif ($_POST['search4']=='Cerrada'):
								$EstadoB=" AND AvancePorcentaje = 100 ";
							elseif ($_POST['search4']=='*'):
								$EstadoB=" AND AvancePorcentaje >= 0";
							elseif ($_POST['search4']=='Retrasada'):
								//echo "<br>".$_POST['search4']."<br>";
								$EstadoB=" AND DATEDIFF(FechaVencimiento, curdate()) <= 0 and AvancePorcentaje <100";
						endif;

						if($_POST['search5']=='*'){
							$AreaB=" AND Area <> ''";
						}else{
							$AreaB=" AND Area = '".utf8_decode($_POST['search5'])."' ";
						}
						$QueryOptions= "SELECT * from actividades where Actividad ".$ActividadB.$EstadoB." AND PrioridadDeLaActividad ".$PrioridadB.$ProyectoB.$AreaB." ORDER BY Tarea desc";
						//echo $QueryOptions;
				}else {
					$QueryOptions="";
				    //echo json_encode(array('resp' => 0));
				}
				//echo "<br>".$QueryOptions;
			?>
<!--<div class="table-responsive">-->
		<?php
			$resultado = $connect->query($QueryOptions);
			$fila = mysqli_fetch_assoc($resultado);
			$total = mysqli_num_rows($resultado);
			//echo "total: ".$total;
			if($total==0){
				echo "<h5 style='color:#FF5A43'>No existen registros coincidentes.</h5>";
			}
		 ?><br>

			<?php if ($resultado->num_rows>0) {
				//$resultado->num_rows>0 = $total>0
				echo "<h5 style='color:blue'>Resultados de b&uacutesqueda: "."<strong>".$total."</strong>"."</h5>";
			?>


			<div id="actividadesB" class="container-fluid col-sm-12">
				<div class="form-group">
					<div class="row">
						<div class="col-sm-12">
							<div class="col-lg-12 mx-auto bg-light text-dark rounded shadow">

								<div class="table-responsive">
									<!--<h5>Registradas en <?php echo $Area; ?>: <?php echo $total; ?></h5>-->
									<div class="tableFixHead">
										<table class="table table-bordered table-striped mb-0 table-wrapper-scroll-y my-custom-scrollbar">
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
													<!--<th><font size="-1">Diff</font></th>-->
													<th><font size="-1">Prioridad</font></th>
													<th><font size="-1">Vencimiento</font></th>
													<th><font size="-1">Estatus</font></th>
													<!--<th><font size="-1">Diferencia</font></th>-->
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
										      <td><font size="-1"><?php echo utf8_encode($fila['Actividad']);?></font></td>
										      <td style="text-align:center;"><font size="-1"><?php echo date('d-m-Y',strtotime($fila['FechaActividad']));?></font></td>
													<?php
 												 $openf=trim($fila['AdjuntoActividad']);

 												 if (strlen($fila['AdjuntoActividad'])>0) {
 														 //echo "<td style='text-align:center;'><a href='php/otsevpdfAdjOfGinp.php?openf=".$openf."&Area=".$Area."&Usuario=".$Usuario."&TipoCuentaUser=".$TipoCuentaUser."&NombreCompletoUser=".$NombreCompletoUser."&ExpedienteUser=".$ExpedienteUser."#toolbar=0'><img src='img/ico-reporte0.png' height='35' width='35'></td>";
 														 echo "<td style='text-align:center;'><a href='php/otsevpdfAdjB.php?openf=".$openf."#toolbar=0'><img src='img/ico-reporte0.png' height='35' width='35'></td>";
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
										          } else {
										            $algo = "Retraso de ".$didi." d&iacuteas";
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
														$AnioInicio = date('Y', strtotime($fila['FechaCierre']));
														if($AnioInicio<$AnioCierre){
															$fcierre=date('d-m-Y',strtotime($fila['FechaCierre']));
														}else{
															$fcierre="";
														}
													?>

													<td style="text-align:center;"><font size="-1"><?php echo $fcierre;?></font></td>
													<td style="text-align:left;"><font size="-1"><?php echo utf8_encode($fila['Notas']);?></font></td>

													<?php
													$openf=trim($fila['AdjuntoGinpOficio']);

													if (strlen($fila['AdjuntoGinpOficio'])>0) {
															//echo "<td style='text-align:center;'><a href='php/otsevpdfAdjOfGinp.php?openf=".$openf."&Area=".$Area."&Usuario=".$Usuario."&TipoCuentaUser=".$TipoCuentaUser."&NombreCompletoUser=".$NombreCompletoUser."&ExpedienteUser=".$ExpedienteUser."#toolbar=0'><img src='img/ico-reporte0.png' height='35' width='35'></td>";
															echo "<td style='text-align:center;'><a href='php/otsevpdfAdjOfGinp.php?openf=".$openf."#toolbar=0'><img src='img/ico-reporte0.png' height='35' width='35'></td>";
													} else {
															echo "<td style='text-align:center;'></td>";
													}

													?>

													<td style="text-align:left;"><font size="-1"><?php echo utf8_encode($fila['ClaveProyecto']);?></font></td>
													<td style="text-align:left;"><font size="-1"><?php echo utf8_encode($fila['Area']);?></font></td>
												</tr>
											<?php } while ($fila=mysqli_fetch_assoc($resultado)); ?>
										<?php }//Total >0
										elseif ($total>0) echo '';
										else echo '';
										?>
									</tbody>
								</table>
							</div><!-- fix head -->
						</div><!-- tab responsive -->
					</div><!-- rounded -->
				</div><!-- sm12 -->
			</div><!-- row -->
		</div><!-- fg -->
	</div><!-- actividades -->

</body>
<script type="text/javascript">
	$("#tabla").fadeOut(1);
</script>
</html>

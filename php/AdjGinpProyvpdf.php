<?php require_once('../conn/connect.php') ?>

 <?php
 	$AdjuntoGinp = isset($_GET['AdjuntoGinp']) ? $_GET['AdjuntoGinp'] : '';
 	//$AreaCdt = isset($_GET['AreaCdt']) ? $_GET['AreaCdt'] : '';
  $AnioMovimiento = date('Y', time());

 	//$query = "SELECT * FROM entradas WHERE AreaCdt='$AreaCdt' AND FolioCdt='$FolioCdt'";
  $query = "SELECT * FROM proyectos WHERE AdjuntoGinp='$AdjuntoGinp'";
	//echo $query;
 	$resultado=$connect->query($query);

 	if ($row = $resultado->fetch_row())
 		{
  // carga archivo de server

  //ANTES DE UA
  //$file = '../docs-'.$AreaCdt.'/FolioCdtEntradas_'.$FolioCdt.'-'.$AnioMovimiento.'.pdf';
  //$filename = '../docs-'.$AreaCdt.'/FolioCdtEntradas_'.$FolioCdt.'-'.$AnioMovimiento.'.pdf';

  $file = '../docs-OficioGINPAltaProy/'.$AdjuntoGinp.'.pdf';
  $filename = '../docs-OficioGINPAltaProy/'.$AdjuntoGinp.'.pdf';

  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);

 		}
 		else{
 			echo "no existe";
 	}
 ?>

<?php require_once('conn/connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
    display: none;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
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
<?php
$q = $_GET['q'];
//echo "Q:".$q;
if (stripos($q, " : ") !== false){
  //echo "se encontro ' : ' dentro de (".$q.") en la posición ".stripos($q, " : ");
  $Tarea=substr($q,0,stripos($q, " : "));
  //echo "Tarea: ".$Tarea;
}

//$query = "SELECT * FROM proyectos WHERE Proyecto='".$q."'";
$query = "SELECT * FROM actividades WHERE Tarea='".$Tarea."'";
//LIKE '%" . st($qs[$i]) . "%'";
//echo $query;
$resultados=$connect->query($query);
$fila = mysqli_fetch_assoc($resultados);







///<!-- P L A Z O-->
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








echo "<table id='tableAct'>
<tr>
<th>ColH</th>
</tr>";
    echo "<tr>";
    echo "<td>".$fila["Tarea"]."</td>";
    echo "<td>".$fila["AvancePorcentaje"]."</td>";


    if ( strstr( $diferencia, '+' ) ) {
      $algo= "Faltan ".$didi." d&iacuteas";
      } else {
        $algo = "Retraso ".$didi." d&iacuteas";
      }
    if (trim($fila['EstadoDeLaActividad'])!='CERRADA'){
      echo "<td>".$algo."</td>";
    }else{
      echo "<td>CERRADA</td>";
    }



    echo "<td>".utf8_encode($fila["Area"])."</td>";
    echo "<td>".$fila["FechaInicio"]."</td>";
    echo "<td>".$fila["FechaVencimiento"]."</td>";
    echo "<td>".$fila["FechaCierre"]."</td>";
    echo "<td>".$fila["PrioridadDeLaActividad"]."</td>";
    echo "<td>".utf8_encode($fila["ClaveProyecto"])."</td>";
    echo "<td>".utf8_encode($fila["Responsable"])."</td>";
    echo "<td>".utf8_encode($fila["Colaborador"])."</td>";
    echo "<td>".utf8_encode($fila["Notas"])."</td>";
    echo "</tr>";
echo "</table>";
mysqli_close($connect);
?>
</body>
</html>

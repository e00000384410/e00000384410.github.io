<?php
$numpla=$_GET['numpla'];
$numpla=strtoupper($numpla);
include("conectar.php");
$X=conectar ();
?>

<table border ="1">
<tr>

	<td>FOLIO</td>
	<td>PLACA</td>
	<td>REFERENCIA</td>

</tr>

<?php

$encontrado="Tu placa no se encuentra en la base de datos";
$sql="select * from infracciones";
$resultado=mysqli_query($x,$sql);
$filas=mysqli_num_rows($resultado);
for($y=0; $y<$filas;$y++){
	$dato=mysqli_fetch_array($resultado);
	
if ($dato['placa']==$numpla){
if($dato['pagado']=='N'){
	echo "<tr>";
	echo "<td>" . $dato['folio'] . "</td>";
    echo "<td>" . $dato['placa'] . "</td>";
	echo "<td>" . $dato['referencia'] . "</td>";
	echo "<td><a href='pagale.php?ix=".$dato['FOLIO']."'>Pagar</td>";
$encontrado="Tu placa ha sido encontrada ";
		}
	}
}

mysql_close($x);


?>

</table>
<p>
<br><br>

<?php

echo $encotrado;
?>
</p>
<p>
<a href= "busqueda.php"> Buscar otro mas </a></p>
<p><a href= "index.php"> regresar al menu principal </a></p>







?>
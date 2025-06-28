<?php
$ix=$_GET['Ix'];
include("conectar.phtml");
$x=conectar();
$sql="update infracciones set pagado='y' where folio=$iX";
mysqli_query($x,$Sql);

mysqli_close($x);

?>

<h1>Registro guardado con exito</h1>
<p><a href="agragar.php">Agregar otro</a></p>
<p><a href="index.php">Regresar al inicio</a></p>
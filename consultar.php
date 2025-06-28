<?php

// Incluir el archivo de conexión. Ahora está en el mismo directorio.
require_once ("conectar.php");
$x = conectar (); // Llama a la función conectar()
?>

<table border = "1">
    <tr>
        <td> FECHA </td>
        <td> Folio </td>
        <td> CONTRIBUYENTE </td>
        <td> DOCUMENTO </td>
        <td> REFERENCIA </td>
        <td> PLACA </td>
        <td> PAGADO </td> </tr>

<?php
// Consulta SQL para seleccionar los primeros 30 registros de la tabla 'infracciones'
// Se añade ORDER BY fecha DESC para ver los registros más recientes primero
$sql = "SELECT * FROM infracciones ORDER BY fecha DESC LIMIT 0,30";
$resultado = mysqli_query ($x, $sql);

// Verificar si hay resultados y recorrerlos
if ($resultado && mysqli_num_rows($resultado) > 0) {
    while ($dato = mysqli_fetch_array ($resultado)) {
        echo "<tr>";
        echo "<td>" . $dato['fecha'] . "</td>";
        echo "<td>" . $dato['folio'] . "</td>";
        echo "<td>" . $dato['contribuyente'] . "</td>";
        echo "<td>" . $dato['documento'] . "</td>";
        echo "<td>" . $dato['referencia'] . "</td>";
        echo "<td>" . $dato['placa'] . "</td>";
        echo "<td>" . $dato['pagado'] . "</td>"; // Mostrar el campo 'pagado'
        echo "</tr>";
    }
} else {
    // Mensaje si no hay registros
    echo "<tr><td colspan='7'>No hay registros de infracciones.</td></tr>";
}
mysqli_close($x); // Cierra la conexión
?>

</table>
<p><br><br></p>
<p><a href = "index.php"> Regresar </a> </p>
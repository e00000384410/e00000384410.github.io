<?php
require_once("conectar.php"); // Asegúrate de que conectar.php esté en la misma carpeta

// Verifica si se recibió el número de placa
if (isset($_GET['numpla']) && !empty($_GET['numpla'])) {
    $num_placa = strtoupper($_GET['numpla']); // Obtiene el número de placa y lo convierte a mayúsculas

    $x = conectar(); // Conecta a la base de datos

    // Prepara la consulta SQL para buscar en la tabla 'infracciones'
    // Es importante usar consultas preparadas para evitar inyección SQL
    $stmt = $x->prepare("SELECT fecha, folio, contribuyente, documento, referencia, placa, pagado FROM infracciones WHERE placa = ?");
    $stmt->bind_param("s", $num_placa); // "s" indica que el parámetro es un string
    $stmt->execute();
    $resultado = $stmt->get_result();

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Resultados de Búsqueda</title>
    </head>
    <body>
        <h1>Resultados de la Búsqueda por Placa: <?php echo htmlspecialchars($num_placa); ?></h1>
        <table border="1">
            <tr>
                <td>FECHA</td>
                <td>FOLIO</td>
                <td>CONTRIBUYENTE</td>
                <td>DOCUMENTO</td>
                <td>REFERENCIA</td>
                <td>PLACA</td>
                <td>PAGADO</td>
            </tr>
            <?php
            if ($resultado->num_rows > 0) {
                // Mostrar cada fila de resultados
                while ($dato = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($dato['fecha']) . "</td>";
                    echo "<td>" . htmlspecialchars($dato['folio']) . "</td>";
                    echo "<td>" . htmlspecialchars($dato['contribuyente']) . "</td>";
                    echo "<td>" . htmlspecialchars($dato['documento']) . "</td>";
                    echo "<td>" . htmlspecialchars($dato['referencia']) . "</td>";
                    echo "<td>" . htmlspecialchars($dato['placa']) . "</td>";
                    echo "<td>" . htmlspecialchars($dato['pagado']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No se encontraron infracciones para la placa: " . htmlspecialchars($num_placa) . "</td></tr>";
            }
            ?>
        </table>
        <p><a href="busqueda.php">Realizar otra búsqueda</a></p>
        <p><a href="index.php">Regresar al inicio</a></p>
    </body>
    </html>
    <?php

    $stmt->close();
    mysqli_close($x); // Cierra la conexión
} else {
    // Si no se proporcionó un número de placa, redirigir o mostrar un mensaje
    echo "<p>Por favor, ingrese un número de placa para buscar.</p>";
    echo "<p><a href='busqueda.php'>Volver a la búsqueda</a></p>";
}
?>
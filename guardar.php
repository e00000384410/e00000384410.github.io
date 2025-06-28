<?php
    // Obtener los datos del formulario usando $_GET
    $fecha = $_GET['fecha'];
    $folio = $_GET['folio'];
    $contribuyente = $_GET['contribuyente'];
    $documento = $_GET['documento'];
    $referencia = $_GET['referencia'];
    $placa = $_GET['placa'];
    $placa = strtoupper ($placa); // Convierte la placa a mayúsculas

    // Incluir el archivo de conexión. Ahora está en el mismo directorio.
    require_once ("conectar.php");

    $x = conectar(); // Llama a la función conectar() definida en conectar.php

    // Consulta SQL para insertar los datos en la tabla 'infracciones'
    // Se asume que tienes una columna 'pagado' con valor predeterminado 'N'
    $sql = "INSERT INTO infracciones(fecha, folio, contribuyente, documento, referencia, placa, pagado) VALUES('$fecha', '$folio', '$contribuyente', '$documento', '$referencia', '$placa', 'N')";

    // Ejecutar la consulta
    if (mysqli_query($x, $sql)) {
        // Si la inserción es exitosa
        echo "<H1>Registro guardado con éxito.</H1>";
    } else {
        // Si hay un error en la inserción
        echo "<H1>Error al guardar el registro: " . mysqli_error($x) . "</H1>";
    }
    
    mysqli_close($x); // Cierra la conexión a la base de datos
?>

<p><a href="agregar.php"> Agregar otro</a></p>
<p><a href="index.php"> Regresar al inicio</a></p>
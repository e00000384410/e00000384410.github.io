<?php
// conectar.php
function conectar() {
    $servername = "localhost"; // Generalmente 'localhost' para XAMPP
    $username = "root";        // Usuario predeterminado de MySQL en XAMPP
    $password = "";            // Contraseña predeterminada de MySQL en XAMPP (a menudo vacía)
    $dbname = "placas";        // El nombre de tu base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        // En caso de error, muestra un mensaje y termina la ejecución
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Opcional: Establecer el conjunto de caracteres a UTF-8 para evitar problemas con caracteres especiales
    $conn->set_charset("utf8");

    return $conn;
}
?>
<?php

// Cargar el archivo .env
// if (file_exists(__DIR__ . '/../.env')) { // rutas
//     $lines = file(__DIR__ . '/../.env');
//     foreach ($lines as $line) {
//         putenv(trim($line)); // Establecer cada línea como una variable de entorno
//     }
// }
// if (file_exists(__DIR__ . '/../.env')) {
//     $lines = file(__DIR__ . '/../.env');
//     foreach ($lines as $line) {
//         $line = trim($line); // Eliminar espacios en blanco
//         if (!empty($line) && strpos($line, '=') !== false) { // Verificar si la línea no está vacía y contiene '='
//             putenv($line); // Establecer como variable de entorno
//         }
//     }
// }


// $host = getenv('DIRECTORIO');
// $user = getenv('USER');
// $password = getenv('PASSWORD');
// $base = getenv('BASE');
// $port = getenv('PORT');

$host = 'mysql.railway.internal';
$user = 'root';
$password = 'vwNgzDCuynsjDXEgvCavOhQyCHjlfycN';
$base = 'railway';
$port = getenv('PORT') ?: '3306';

$conn = new mysqli($host, $user, $password, $base, $port);

// Verificar conexión
if ($conn->connect_error) {
    die('Conexión fallida');
    // die('Conexión fallida: ' . $conn->connect_error);
}
// echo 'Conectado exitosamente';

// Consulta para crear la tabla
$sql = "CREATE TABLE IF NOT EXISTS mi_perfil (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT
)";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) { // Cambiar $mysqli a $conn
    echo "Estado ok.";
    // echo "Tabla 'mi_perfil' creada exitosamente.";
} else {
    echo "Ups! Error "; // Cambiar $mysqli a $conn
    // echo "Error creando la tabla: " . $conn->error; // Cambiar $mysqli a $conn
}

// Cerrar la conexión
// $conn->close(); // Cambiar $mysqli a $conn

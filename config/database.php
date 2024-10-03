<?php  

// Cargar el archivo .env
if (file_exists(__DIR__ . '/../.env')) { // rutas
    $lines = file(__DIR__ . '/../.env');
    foreach ($lines as $line) {
        putenv(trim($line)); // Establecer cada línea como una variable de entorno
    }
}
$host = getenv('DIRECTORIO');
$user = getenv('USER');
$password = getenv('PASSWORD');
$base = getenv('BASE');


$conn = new mysqli($host, $user, $password, $base);

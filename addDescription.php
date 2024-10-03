<?php

session_start();

require './config/database.php';

$id = $conn->real_escape_string($_POST['id']);
$description = $conn->real_escape_string($_POST['description']);

$sql = "UPDATE mi_perfil SET description='$description' WHERE id=$id";

if ($conn->query($sql)) {
    $_SESSION['color'] = 'success';
    $_SESSION['msg'] = 'Descripción agregada!';
} else {
    $_SESSION['color'] = 'danger';
    $_SESSION['msg'] = 'Error al agregar descripción';
}

header('Location: index.php');

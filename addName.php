<?php

session_start();

require './config/database.php';

$name = $conn->real_escape_string($_POST['name']);
$id = $conn->real_escape_string($_POST['id']);


$sql = "UPDATE mi_perfil SET name ='$name' WHERE id=$id";

if ($conn->query($sql)) {
    $_SESSION['color'] = 'success';
    $_SESSION['msg'] = 'Nombre de usuario agregado!';
} else {
    $_SESSION['color'] = 'danger';
    $_SESSION['msg'] = 'Error al agregar nombre';
}

header('Location: index.php');

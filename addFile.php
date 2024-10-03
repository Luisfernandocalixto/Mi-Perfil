<?php

session_start();

require './config/database.php';


$id = $conn->real_escape_string($_POST['id']);

$sql = "SELECT * FROM mi_perfil WHERE id=$id";

if ($conn->query($sql)) {


    if ($_FILES['images']['error'] == UPLOAD_ERR_OK) {
        # code...
        $permitidos = array("image/jpg", "image/jpeg");
        if (in_array($_FILES['images']['type'], $permitidos)) {

            $dir = "images";

            $info_img = pathinfo($_FILES['images']['name']);
            $info_img['extension'];

            $images = $dir . '/' . $id . '.jpg';

            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }

            if (!move_uploaded_file($_FILES['images']['tmp_name'], $images)) {
                $_SESSION['color'] = "danger";
                $_SESSION['img'] .= " Error al guardar imagen";
            }
        } else {
            $_SESSION['color'] = "danger";
            $_SESSION['msg'] .= "Formato de imagen no permitido!";
        }
    }
} else {
    $_SESSION['color'] = 'danger';
    $_SESSION['msg'] = 'Error al actualizar imagen';
}

header('Location: index.php');
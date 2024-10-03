<?php
session_start();

require("./config/database.php");

$sqlPerfil = "SELECT * FROM mi_perfil";
$perfil = $conn->query($sqlPerfil);

$dir = "images/";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/skeleton.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/modal.css">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Mi perfil">
    <meta property="og:image" content="./images/1.jpg">
    <meta property="og:description" content="Edita tu perfil de usuario">  
    
    <title>Perfil</title>

</head>

<body>

    <main>
        <?php
        while ($row = $perfil->fetch_assoc()) {
        ?>
            <div style="display: flex;justify-content: center; flex-direction: column; align-items: center;">
                <button class="text pointer btn modal-trigger" href="#modal1" id="btnAddName" data-bs-id="<?= $row['id']; ?>">+ Añadir nombre</button>
                <br>
                <img style="width: 200px; height: 200px; border-radius: 100%; object-fit: cover; aspect-ratio: 360/400;" src="<?= $dir . $row['id'] . '.jpg?n=' . time(); ?> " alt="Foto de perfil">
                <span style="position: absolute; top: 180px; margin-left: 130px;"><img src="./images/plus.svg" alt="Agregar foto" class="pointer modal-trigger" href="#modal3" id="btnAddImage" data-bs-id="<?= $row['id'];  ?>"></span>
                <p style="margin-top: 8px; color: #000;" id="user"><?= $row['name']; ?> </p>
            </div>
            <div style="color: #000; display: flex; justify-content: center; gap: 20px; text-align: center;">
                <div>
                    <p style="font-weight: 600;">41</p>
                    <p>Siguiendo</p>
                </div>
                <div>
                    <p style="font-weight: 600;">144</p>
                    <p>Seguidores</p>
                </div>
                <div>
                    <p style="font-weight: 600;">1560</p>
                    <p>Me gusta</p>
                </div>
            </div>
            <div style="color: #000; display: flex; justify-content: center; gap: 20px; text-align: center;">
                <div>
                    <button class="button">Editar perfil</button>
                </div>
                <div>
                    <button class="button">Añadir amigos</button>
                </div>
            </div>
            <div style="color: #000; display: flex; justify-content: center; gap: 20px; text-align: center;margin-top: 8px;">
                <div>
                    <button class="button modal-trigger" href="#modal2" id="btnAddDescription" data-bs-id="<?= $row['id'];  ?>">+ Añadir descripción</button>
                </div>
            </div>
            <div style="text-align: center;"><?= $row['description']; ?></div>
        <?php }  ?>


    </main>




    <!-- Modal Trigger -->
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Añadir nombre</h4>
            <form action="addName.php" method="post" id="addName" enctype="multipart/form-data">
                <input type="text" name="name" id="inputIdentify" placeholder="Ingrese nombre" style="width: 100%;" required>
                <p id="message"></p>
                <div class="modal-footer">
                    <button href="#!" class="button-primary">Aceptar</button>
                    <button type="button" class="modal-close waves-effect waves-green btn-flat">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <h4>Añadir descripción</h4>
            <form action="addDescription.php" method="post" id="formAddDescription" enctype="multipart/form-data">
                <textarea maxlength="155" placeholder="Descripción" id="inputDescription" style="width: 100%; outline: none; resize: none; field-sizing: content; height: auto; padding: 10px; " name=" description"></textarea>
                <p id="messageDescription"></p>
                <div class="modal-footer">
                    <button class="button-primary">Aceptar</button>
                    <button type="button" class="modal-close waves-effect waves-green btn-flat">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal3" class="modal">
        <div class="modal-content">
            <h4>Añadir foto de perfil</h4>
            <form action="addFile.php" method="post" id="formAddImage" enctype="multipart/form-data">
                <input type="file" style="width: 100%;" accept=".jpg, .jpeg" id="inputFile" name="images">
                <p id="messageFile"></p>
                <img src="#" alt="Preview" id="imagePreview" style="display: none; width: 200px;height: 200px;border-radius: 100%; object-fit: cover;aspect-ratio: 360/400;">
                <div class="modal-footer">
                    <button type="submit" class="button-primary">Aceptar</button>
                    <button type="reset" class="modal-close waves-effect waves-green btn-flat">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
<script>
</script>
    <!-- script -->
    <script src="./js/main.js"></script>
    <script src="./js/modal.js"></script>
    <!-- script -->
</body>

</html>
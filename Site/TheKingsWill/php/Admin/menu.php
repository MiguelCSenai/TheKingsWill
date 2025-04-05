<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: login.php");
        exit();
    }

    $username = $_SESSION['admin'];
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The King's Will - Admin | Login</title>
    <link rel="stylesheet" href="../../css/general/attributes.css">
    <link rel="stylesheet" href="../../css/general/fonts.css">
    <link rel="stylesheet" href="../../css/general/elements.css">
    <link rel="stylesheet" href="../../css/admin/style.css">
    <link rel="stylesheet" href="../../css/menu/style.css">
    <link rel="stylesheet" href="../../css/home/animations.css">
</head>
<body>
    <nav class="menu subtitle bold noSelect">
        <ul>    
            <li><a href="../home.php">Home</a></li>
            <li><a href="../Catalogo/catalogo.php">Catálogo</a></li>
            <li><a href="../Wiki/wiki.php">Como Jogar</a></li>
            <li><a onclick="ativarTransicao()">História</a></li>
            <li><a href="#">Sobre nós</a></li>
            <li><a href="menu.php"><?php if (isset($_SESSION['admin'])) { echo $_SESSION['admin']; }else{ echo "Administrador"; } ?></a></li>

        </ul>
        <img class="noSelect" src="../../resources/Livro.png" id="overlay">
        <div onclick="desativarTransicao()" id="overlayBackground"></div>
        <script src="../../js/General/transitions.js"></script>
    </nav>

    <div class="container">
        <h1 class="bigT subtitle red SdarkRed">Bem vindo <?php echo $username ?>!</h1>
        <div class="container-menu">

            <a href="addAdmin.php" class="items redBC solid mediumBS black bold text smallT"><img src="../../resources/add.png">Adicionar Admin</a>

            <a href="Add/menu.php" class="items redBC solid mediumBS black bold text smallT"><img src="../../resources/settings.png">Cadastros</a>

        </div>
        
    </div>
</body>
</html>

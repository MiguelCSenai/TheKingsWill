<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The King's Will | Home</title>
    <link rel="stylesheet" href="../css/general/attributes.css">
    <link rel="stylesheet" href="../css/general/fonts.css">
    <link rel="stylesheet" href="../css/general/elements.css">
    <link rel="stylesheet" href="../css/home/animations.css">
    <link rel="stylesheet" href="../css/home/style.css">
    <link rel="stylesheet" href="../css/menu/style.css">
</head>

<body>

    <nav class="menu subtitle bold noSelect">
        <ul>
            <li><a>Home</a></li>
            <li><a href="Catalogo/catalogo.php">Catálogo</a></li>
            <li><a href="Wiki/wiki.php">Como Jogar</a></li>
            <li><a onclick="ativarTransicao()">História</a></li>
            <li><a href="#">Sobre nós</a></li>
            <li><a href="Admin/menu.php"><?php session_start(); if (isset($_SESSION['admin'])) { echo $_SESSION['admin']; }else{ echo "Administrador"; } ?></a></li>

        </ul>
        <img class="noSelect" src="../resources/Livro.png" id="overlay">
        <div onclick="desativarTransicao()" id="overlayBackground"></div>
        <script src="../js/General/transitions.js"></script>
    </nav>


    <div class="container">
        <h1 class="titleV bold dark-yellow Sred hugeT noSelect">The King's Will</h1>
        <button onclick="ativarTransicao()" class="dark-redBC solid dark-grayBT btn1 textV2 regular italic noSelect red SdarkRed bigT">
            Era uma vez ...
        </button>
    </div>
</body>

</html>

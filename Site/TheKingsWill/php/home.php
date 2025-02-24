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

    <nav class="menu subtitle bold smallT noSelect">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Catálogo</a></li>
            <li><a href="#">Como Jogar</a></li>
            <li><a href="Lore/lore.php">História</a></li>
            <li><a href="#">Sobre nós</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1 class="titleV bold dark-yellow Sred hugeT noSelect">The King's Will</h1>
        <button onclick="ativarTransicao()" class="dark-redBC solid dark-grayBT btn1 textV2 regular italic noSelect red SdarkRed bigT">
            Era uma vez ...
        </button>
    </div>

    <img class="noSelect" src="../resources/Livro.png" id="overlay">
    <div id="overlayBackground"></div>

    <script src="../js/transitions.js"></script>
</body>

</html>

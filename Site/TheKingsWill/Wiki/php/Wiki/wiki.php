<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The King's Will | História</title>
    <link rel="stylesheet" href="../../css/general/attributes.css">
    <link rel="stylesheet" href="../../css/general/fonts.css">
    <link rel="stylesheet" href="../../css/general/elements.css">
    <link rel="stylesheet" href="../../css/wiki/style.css">
    <link rel="stylesheet" href="../../css/menu/style.css">
    <link rel="stylesheet" href="../../css/home/animations.css">
    <script src="../../js/Wiki/transitions.js"></script>
</head>
<body id="body" class="removeScroll">

    <nav class="menu subtitle bold noSelect">
        <ul>
            <li><a href="../home.php">Home</a></li>
            <li><a href="../Catalogo/catalogo.php">Catálogo</a></li>
            <li><a>Como Jogar</a></li>
            <li><a onclick="ativarTransicao()">História</a></li>
            <li><a href="../../../Game/php/MainMenu/main.php">Jogar</a></li>
            <li><a href="../Admin/menu.php"><?php session_start(); if (isset($_SESSION['admin'])) { echo $_SESSION['admin']; }else{ echo "Administrador"; } ?></a></li>

        </ul>
        <img class="noSelect" src="../../resources/Livro.png" id="overlay">
            <div onclick="desativarTransicao()" id="overlayBackground"></div>
            <script src="../../js/General/transitions.js"></script>
    </nav>

    <div class="container dark-brownBT">
        
        <img class="roda noSelect" src="../../resources/roda.png" alt="Roda Elemental">

        <div class="text-container">

            <p class="mediumT bold red SdarkRed subtitle">Vantagens elementais</p>

            <p class="regular brown title">No universo de The King's Will, o fluxo da existência é governado por quatro grandes Naturezas: Ossos, Consciência, Sangue e Vísceras. Cada uma dessas forças interage de maneira cíclica, conferindo vantagens e desvantagens em combate.</p>

            <span class="smallT red SdarkRed subtitle">> Ossos > Consciência > Sangue > Vísceras ></span>

            <button onclick="elemental()" class="btn2 dark-redBC redB white text bold">Sobre</button>

        </div>
        
    </div>
    
    <div class="overlay">

        <div onclick="elemental()" class="elemental-container">
        
            <img class="roda noSelect" src="../../resources/roda.png" alt="Roda Elemental">

            <div class="text-container">

                <span class="smallT red SdarkRed subtitle">> Ossos > Consciência > Sangue > Vísceras ></span>

                <p class="regular brown title smallUL">
                    Cada elemento é resistente a um, e vulneravel a outro.
                </p>
                
                <p class="regular brown title">

                    Logo uma arma de <span class="red bold">sangue</span> terá <span class="red">mais 2 pontos de dano</span> contra <span class="smallUL purple"> criaturas/player de vísceras</span> e uma criatura/player dessa natureza <span class="red">receberá 2 pontos de dano a menos</span> caso seja atacado por algo de <span class="purple bold">vísceras</span>, porém o efeito contrário acontecera contra criaturas de <span class="blue bold">consciência</span>.

                </p>

            </div>

        </div>

    </div>

</body>
</html>
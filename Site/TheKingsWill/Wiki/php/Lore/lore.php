<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The King's Will | História</title>
    <link rel="stylesheet" href="../../css/general/attributes.css">
    <link rel="stylesheet" href="../../css/general/fonts.css">
    <link rel="stylesheet" href="../../css/general/elements.css">
    <link rel="stylesheet" href="../../css/lore/animations.css">
    <link rel="stylesheet" href="../../css/lore/style.css">
    <link rel="stylesheet" href="../../css/menu/style.css">
</head>
<body id="body" class="removeScroll">

    <nav class="menu subtitle bold noSelect">
        <ul>
            <li><a href="../home.php">Home</a></li>
            <li><a href="../Catalogo/catalogo.php">Catálogo</a></li>
            <li><a href="../Wiki/wiki.php">Como Jogar</a></li>
            <li><a onclick="ativarTransicao()">História</a></li>
            <li><a href="../../../Game/php/MainMenu/main.php">Jogar</a></li>
            <li><a href="../Admin/menu.php"><?php session_start(); if (isset($_SESSION['admin'])) { echo $_SESSION['admin']; }else{ echo "Administrador"; } ?></a></li>

        </ul>
    </nav>

    <div class="container">

        <p class="noSelect red SdarkRed titleV bold bigT">The King's Will</p>

        <p class="brown title regular smallT">

            Em meio a uma guerra, é atingido um período muito crítico no territorio de batalha entre dois reinos. O equilibrio entre o mundo físico
            e espiritual está totalmente quebrado, isso acontece de forma tradicional, durante o final do inverno, e caminhar por aí nessa época não é o mais recomendado... <br>
            Mandar tropas para a linha de frente é literalmente descartar forças, então ambos os reinos aproveitam esse momento para se livrar de alguns 
            "trastes", prisioneiros, condenados a interminaveis e cruéis sentenças pelos mais diversos tipos de crime, seja indecencia em publico
            até desertores.<br>
            Então a seguinte missão lhes é passada:

            <p class="textV bigT dark-brownBC mediumBS solid">"Vocês, párias, que atualmente não tem nada, e estão privados de sua liberdade por toda sua vida, e alguns já se encontram até no caminho da forca, 
                tenho uma missão para vocês, e caso retornem com vida, terão sua liberdade, e quem sabe... até algumas glórias. <br>
                A missão é a seguinte, vão até o centro do rio Suothrein, saberão que estão no lugar certo ao avistar uma enorme ponte, que nos 
                liga a nossos inimigos de tanto tempo, dentro dessa ponte está escondido algo que só pode ser encontrado nessa época do ano,
                o <span class="red bold italic smallUL">Líquido da Vida</span>."</p>

        </p>

    </div>

    <img class="noSelect" src="../../resources/Livro.png" id="overlay">
    <div id="overlayBackground" class="activeBackground"></div>

<script>

    document.addEventListener("DOMContentLoaded", function() {
        let overlay = document.getElementById("overlay");
        setTimeout(() => {
            let body = document.getElementById("body");
            body.classList.remove("removeScroll");
        }, 600);

        setTimeout(() => {
            
            if (overlay) {
                overlay.classList.add("leave");
            }
            
        }, 100);
    });

    
</script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The King's Will | Catálogo</title>
    <link rel="stylesheet" href="../../css/general/attributes.css">
    <link rel="stylesheet" href="../../css/general/fonts.css">
    <link rel="stylesheet" href="../../css/general/elements.css">
    <link rel="stylesheet" href="../../css/catalogo/animations.css">
    <link rel="stylesheet" href="../../css/home/animations.css">
    <link rel="stylesheet" href="../../css/catalogo/style.css">
    <link rel="stylesheet" href="../../css/menu/style.css">
</head>
<body id="body" class="removeScroll">

    <nav class="menu subtitle bold noSelect">
        <ul>
            <li><a href="../home.php">Home</a></li>
            <li><a>Catálogo</a></li>
            <li><a href="#">Como Jogar</a></li>
            <li><a onclick="ativarTransicao()">História</a></li>
            <li><a href="#">Sobre nós</a></li>
            <li><a href="../Admin/menu.php"><?php session_start(); if (isset($_SESSION['admin'])) { echo $_SESSION['admin']; }else{ echo "Administrador"; } ?></a></li>

        </ul>
    </nav>

    <h1 class="red subtitle mediumT SdarkRed">Armas</h1>
    <div class="container-armas">


    <?php
    include "../mysqlconecta.php";

    $query = "SELECT wpn_id, wpn_nome, wpn_tipo, wpn_natureza, wpn_efeito, wpn_dano, wpn_velocidade, wpn_alcance, wpn_descricao, wpn_icone FROM armas ORDER BY wpn_tipo";
    $result = $conexao->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
            switch ($row["wpn_natureza"]) {
                case 'Base':
                    $classe = "grayB dark-grayBC black";
                    break;
                case 'Sangue':
                    $classe = "redB dark-redBC white";
                    break;
                case 'Vísceras':
                    $classe = "light-purpleB purpleBC black";
                    break;
                case 'Ossos':
                    $classe = "whiteB grayBC black";
                    break;
                case 'Consciência':
                    $classe = "light-blueB blueBC white";
                    break;
            }

            echo "<div onclick='details(".$row["wpn_id"].")' class='".$classe. " solid mediumBS arma text'>";
            echo "<div class='icon'><img src='" . $row["wpn_icone"] . "' alt='" . $row["wpn_nome"] . "'>";
            echo "<h2>" . $row["wpn_nome"] . "</h2></div>";
            echo "<div class='content'><div class='stats'>";
            echo "<p><strong class='subtitle'>Tipo:</strong> " . $row["wpn_tipo"] . "</p>";
            echo "<p><strong class='subtitle'>Natureza:</strong> " . $row["wpn_natureza"] . "</p>";
            echo "<p><strong class='subtitle'>Efeito:</strong> " . $row["wpn_efeito"] . "</p>";

            echo "<div class='dano' style='display:none;'><strong class='subtitle'>Dano:</strong> 
                    <div class='stat-bar'>
                        <span class='stat-num'>" . min($row["wpn_dano"], 10) . " / 10</span>
                        <div class='stat-fill' style='width: " . min($row["wpn_dano"], 10) * 10 . "%'></div>
                    </div>
                  </div>";

            echo "<div class='velocidade' style='display:none;'><strong class='subtitle'>Velocidade:</strong> 
                    <div class='stat-bar'>
                        <span class='stat-num'>" . min($row["wpn_velocidade"], 4) . " / 4</span>
                        <div class='stat-fill' style='width: " . min($row["wpn_velocidade"], 4) * 25 . "%'></div>
                    </div>
                  </div>";

            echo "<div class='alcance' style='display:none;'><strong class='subtitle'>Alcance:</strong> 
                    <div class='stat-bar'>
                        <span class='stat-num'>" . min($row["wpn_alcance"], 10) . " / 10</span>
                        <div class='stat-fill' style='width: " . min($row["wpn_alcance"], 10) * 10 . "%'></div>
                    </div>
                  </div>";

            echo "</div>";
            echo "<p class='descricao Nactive'>" . nl2br($row["wpn_descricao"]) . "</p></div>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhuma arma cadastrada.</p>";
    }

    $conexao->close();
?>





    </div>

    <div id="expandedContainer"></div>
    <div id="backgroundOverlay"></div>


    <img class="noSelect" src="../../resources/Livro.png" id="overlay">
    <div id="overlayBackground"></div>

</body>

<script src="../../js/transitions.js"></script>

</html>
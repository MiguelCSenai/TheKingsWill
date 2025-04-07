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
            <li><a href="../Wiki/wiki.php">Como Jogar</a></li>
            <li><a onclick="ativarTransicao()">História</a></li>
            <li><a href="../../../TheKingsWill.Game/php/MainMenu/main.php">Jogar</a></li>
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
?>



    </div>

    <h1 class="red subtitle mediumT SdarkRed">Efeitos</h1>
<div class="container-efeitos">
<?php

$query = "SELECT eft_nome, eft_dpt, eft_ignoraArmadura, eft_incapacitar, eft_nerfDano, eft_nerfAgi, eft_buffDano, eft_buffAgi, eft_cura FROM efeitos ORDER BY eft_nome";
$result = $conexao->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $countAtributos = 0;
        foreach ($row as $key => $value) {
            if ($key !== 'eft_nome' && !is_null($value)) {
                $countAtributos++;
            }
        }

        $classeCor = "";
        if ($countAtributos >= 1) $classeCor = "comum";
        if ($countAtributos >= 2) $classeCor = "bom";
        if ($countAtributos >= 3) $classeCor = "otimo";

        echo "<div class='efeito subtitle blackBC solid mediumBS $classeCor'>";
        echo "<h2>" . $row["eft_nome"] . "</h2>";
        echo "<ul>";
        if (!is_null($row["eft_dpt"])) echo "<li><strong>Dano por turno:</strong> " . $row["eft_dpt"] . "</li>";
        if (!is_null($row["eft_ignoraArmadura"])) echo "<li><strong>Ignora " . $row["eft_ignoraArmadura"] . " camada(s) de armadura</strong></li>";
        if (!is_null($row["eft_incapacitar"])) echo "<li><strong>Incapacita o alvo por" . $row["eft_incapacitar"] . " turno(s) </strong> Sim</li>";
        if (!is_null($row["eft_nerfDano"])) echo "<li><strong>Redução de dano:</strong> " . $row["eft_nerfDano"] . "</li>";
        if (!is_null($row["eft_nerfAgi"])) echo "<li><strong>Redução de agilidade:</strong> " . $row["eft_nerfAgi"] . "</li>";
        if (!is_null($row["eft_buffDano"])) echo "<li><strong>Aumento de dano:</strong> " . $row["eft_buffDano"] . "</li>";
        if (!is_null($row["eft_buffAgi"])) echo "<li><strong>Aumento de agilidade:</strong> " . $row["eft_buffAgi"] . "</li>";
        if (!is_null($row["eft_cura"])) echo "<li><strong>Cura:</strong> " . $row["eft_cura"] . "</li>";
        echo "</ul>";
        echo "</div>";
    }
} else {
    echo "<p>Nenhum efeito cadastrado.</p>";
}
$conexao->close();
?>

</div>

    <div id="expandedContainer"></div>
    <div id="backgroundOverlay"></div>


    <img class="noSelect" src="../../resources/Livro.png" id="overlay">
    <div id="overlayBackground"></div>

</body>

<script src="../../js/General/transitions.js"></script>

</html>
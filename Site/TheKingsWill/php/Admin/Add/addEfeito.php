<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['admin'];

include "../../mysqlconecta.php";

if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    $nome = $_POST['nome'];
    $dpt = isset($_POST['dpt']) && $_POST['dpt'] !== '' ? (int)$_POST['dpt'] : "NULL";
    $ignArm = isset($_POST['ignArm']) && $_POST['ignArm'] !== '' ? (int)$_POST['ignArm'] : "NULL";
    $off = isset($_POST['off']) && $_POST['off'] !== '' ? (int)$_POST['off'] : "NULL";
    $nerfDano = isset($_POST['danoNerf']) && $_POST['danoNerf'] !== '' ? (float)$_POST['danoNerf'] : "NULL";
    $nerfAgi = isset($_POST['agiNerf']) && $_POST['agiNerf'] !== '' ? (float)$_POST['agiNerf'] : "NULL";
    $buffDano = isset($_POST['danoBuff']) && $_POST['danoBuff'] !== '' ? (float)$_POST['danoBuff'] : "NULL";
    $buffAgi = isset($_POST['agiBuff']) && $_POST['agiBuff'] !== '' ? (float)$_POST['agiBuff'] : "NULL";
    $cura = isset($_POST['cura']) && $_POST['cura'] !== '' ? (int)$_POST['cura'] : "NULL";
    
    $query = "INSERT INTO efeitos (eft_nome, eft_dpt, eft_ignoraArmadura, eft_incapacitar, eft_nerfDano, eft_nerfAgi, eft_buffDano, eft_buffAgi, eft_cura) 
                VALUES ('$nome', '$dpt', '$ignArm', '$off', $nerfDano, $nerfAgi, $buffDano, '$buffAgi', '$cura')";
    
    if (mysqli_query($conexao, $query)) {
        header("Location: addEfeito.php");
        exit();
    } else {
        echo "<p>Erro ao adicionar efeito: " . mysqli_error($conexao) . "</p>";
    }
}

$conexao->close();

?>



<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The King's Will - Admin | Catálogo</title>
    <link rel="stylesheet" href="../../../css/general/attributes.css">
    <link rel="stylesheet" href="../../../css/general/fonts.css">
    <link rel="stylesheet" href="../../../css/general/elements.css">
    <link rel="stylesheet" href="../../../css/admin/style.css">
    <link rel="stylesheet" href="../../../css/menu/style.css">
    <link rel="stylesheet" href="../../../css/home/animations.css">
</head>
<body>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Armas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="menu subtitle bold noSelect">
        <ul>
            <li><a href="../../home.php">Home</a></li>
            <li><a href="../../Catalogo/catalogo.php">Catálogo</a></li>
            <li><a href="../../Wiki/wiki.php">Como Jogar</a></li>
            <li><a onclick="ativarTransicao()">História</a></li>
            <li><a href="../../../../TheKingsWill.Game/php/MainMenu/main.php">Jogar</a></li>
            <li><a href="../menu.php"><?php if (isset($_SESSION['admin'])) { echo $_SESSION['admin']; }else{ echo "Administrador"; } ?></a></li>

        </ul>
        <img class="noSelect" src="../../../resources/Livro.png" id="overlay">
        <div onclick="desativarTransicao()" id="overlayBackground"></div>

        <script src="../../../js/General/transitions.js"></script>

    </nav>

    <div class="container-form">

        <h1 class="subtitle red SdarkRed">Adicionar Arma ao Catálogo</h1>
        <form class="bold title redBC mediumBS solid light-redBT" action="" method="POST">
            <div class="form-group">
                <label for="nome">Nome do Efeito:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="dpt">Dano por turno:</label>
                <input type="number" id="dpt" name="dpt" min="1" max="5" placeholder="1 - 5">
            </div>

            <div class="form-group">
                <label for="ignArm">Atravessa armadura:</label>
                <input type="number" id="ignArm" name="ignArm" min="1" max="3" placeholder="1 - 3">
            </div>

            <div class="form-group">
                <label for="off">Incapacitar:</label>
                <input type="number" id="off" name="off" min="1" max="2" placeholder="1 - 2">
            </div>
            <div class="form-group">
                <label for="danoNerf">Nerf de Dano:</label>
                <input type="number" id="danoNerf" name="danoNerf" min="0.1" max="1" step="0.1" placeholder="0.1 - 1">
            </div>
            <div class="form-group">
                <label for="agiNerf">Nerf de Agilidade:</label>
                <input type="number" id="agiNerf" name="agiNerf" min="0.1" max="1" step="0.1" placeholder="0.1 - 1">
            </div>
            <div class="form-group">
                <label for="danoBuff">Buff de Dano:</label>
                <input type="number" id="danoBuff" name="danoBuff" min="0.1" max="1" step="0.1" placeholder="0.1 - 1">
            </div>
            <div class="form-group">
                <label for="agiBuff">Buff de Agilidade:</label>
                <input type="number" id="agiBuff" name="agiBuff" min="0.1" max="1" step="0.1" placeholder="0.1 - 1">
            </div>
            <div class="form-group">
                <label for="cura">Cura:</label>
                <input type="number" id="cura" name="cura" min="1" max="10" placeholder="1 - 10">
            </div>
            <button type="submit">Adicionar Efeito</button>
        </form>

    </div>
    
</body>
</html>


</body>
</html>
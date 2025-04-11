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
    if (!empty($_POST['nome']) && !empty($_POST['tipo']) && !empty($_POST['natureza']) && !empty($_POST['efeito']) && !empty($_POST['descricao']) && !empty($_POST['icon'])) {
        
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $natureza = $_POST['natureza'];
        $efeito = $_POST['efeito'];
        $dano = (int) $_POST['dano'];
        $velocidade = (int) $_POST['velocidade'];
        $alcance = (int) $_POST['alcance'];
        $descricao = $_POST['descricao'];
        $icone = $_POST['icon'];
        
        $query = "INSERT INTO armas (wpn_nome, wpn_tipo, wpn_natureza, wpn_efeito, wpn_dano, wpn_velocidade, wpn_alcance, wpn_descricao, wpn_icone) 
                  VALUES ('$nome', '$tipo', '$natureza', '$efeito', $dano, $velocidade, $alcance, '$descricao', '$icone')";
        
        if (mysqli_query($conexao, $query)) {
            header("Location: addArma.php");
            exit();
        } else {
            echo "<p>Erro ao adicionar arma: " . mysqli_error($conexao) . "</p>";
        }
    } else {
        echo "<p>Preencha todos os campos.</p>";
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
                <label for="nome">Nome da Arma:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de Arma:</label>
                <select id="tipo" name="tipo" required>
                    <option disabled selected>Selecione um tipo:</option>
                    <option value="Espada">Espada</option>
                    <option value="Machado">Machado</option>
                    <option value="Arco">Arco</option>
                    <option value="Lança">Lança</option>
                    <option value="Porrete">Porrete</option>
                    <option value="Adaga">Adaga</option>
                    <option value="Garras">Garras</option>
                    <option value="Escudo">Escudo</option>
                    <option value="Foice">Foice</option>
                    <option value="Bastão">Bastão</option>
                    <option value="Besta">Besta</option>
                </select>

            </div>
            <div class="form-group">
                <label for="natureza">Natureza da Arma:</label>
                <select id="natureza" name="natureza" required>
                    <option disabled selected>Selecione uma natureza:</option>
                    <option value="Base">Base</option>
                    <option value="Consciência">Consciência</option>
                    <option value="Ossos">Ossos</option>
                    <option value="Sangue">Sangue</option>
                    <option value="Vísceras">Vísceras</option>
                </select>
            </div>
            <div class="form-group">
                <label for="efeito">Efeito Especial:</label>
                <select id="efeito" name="efeito" required>
                    <option disabled selected value="Nenhum">Selecione um efeito:</option>
                    <option value="Nenhum">Nenhum</option>
                    <option value="Envenenamento">Envenenamento</option>
                    <option value="Sangramento">Sangramento</option>
                    <option value="Corrosão">Corrosão</option>
                    <option value="Paralisia">Paralisia</option>
                    <option value="Encanto">Encanto</option>
                    <option value="Terror">Terror</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dano">Dano:</label>
                <input type="number" id="dano" name="dano" min="1" max="100" placeholder="1 - 10" required>
            </div>
            <div class="form-group">
                <label for="velocidade">Velocidade de Ataque:</label>
                <input type="number" id="velocidade" name="velocidade" min="1" max="4" placeholder="1 - 4" required>
            </div>
            <div class="form-group">
                <label for="alcance">Alcance:</label>
                <input type="number" id="alcance" name="alcance" min="1" max="10" placeholder="1 - 10" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição Detalhada:</label>
                <textarea id="descricao" name="descricao" rows="6" placeholder="Descrição detalhada da arma" required></textarea>
            </div>
            <div class="form-group">
                <label for="natureza">Icone da Arma:</label>
                <input type="text" id="icon" name="icon" placeholder="Link do GitHub" required>
            </div>
            <button type="submit">Adicionar Arma</button>
        </form>

    </div>
    
</body>
</html>


</body>
</html>
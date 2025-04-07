<?php
include "../mysqlconecta.php";

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (!empty($username) && !empty($password)) {
        $query = "INSERT INTO adms (adm_username, adm_password) VALUES ('$username', '$password')";
        
        if (mysqli_query($conexao, $query)) {
            header("Location: menu.php");
            exit();
        } else {
            $error = "Erro ao cadastrar administrador: " . mysqli_error($conexao);
        }
    } else {
        $error = "Preencha todos os campos.";
    }
}
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The King's Will - Admin | Adicionar Administrador</title>
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
            <li><a href="../../../TheKingsWill.Game/php/MainMenu/main.php">Jogar</a></li>
            <li><a href="menu.php"><?php if (isset($_SESSION['admin'])) { echo $_SESSION['admin']; }else{ echo "Administrador"; } ?></a></li>
        </ul>
        <img class="noSelect" src="../../resources/Livro.png" id="overlay">
        <div onclick="desativarTransicao()" id="overlayBackground"></div>
        <script src="../../js/General/transitions.js"></script>
    </nav>

    <div class="container-form">
        <h1 class="subtitle red SdarkRed">Adicionar Novo Administrador</h1>
        <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
        <form class="bold title redBC mediumBS solid light-redBT" action="" method="POST">
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Adicionar</button>
        </form>
    </div>
</body>
</html>

<?php
include "../mysqlconecta.php";

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM adms WHERE adm_username = '$username' AND adm_password = '$password'";
        $result = $conexao->query($query);
        
        if ($result->num_rows > 0) {
            $_SESSION['admin'] = $username;
            header("Location: menu.php");
            exit();
        } else {
            $error = "Usuário ou senha incorretos.";
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
            <li><a href="menu.php"><?php if (isset($_SESSION['admin'])) { echo "<p class='smallT'>".$_SESSION['admin']."</p>"; }else{ echo "Administrador"; } ?></a></li>

        </ul>
        <img class="noSelect" src="../../resources/Livro.png" id="overlay">
        <div onclick="desativarTransicao()" id="overlayBackground"></div>
        <script src="../../js/General/transitions.js"></script>
    </nav>

    <div class="container-form">
        <h1 class="subtitle red SdarkRed">Login de Administrador</h1>
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
            <button type="submit" class="text">Entrar</button>
        </form>
    </div>
</body>
</html>

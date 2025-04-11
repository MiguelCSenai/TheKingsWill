<!DOCTYPE html>
<html lang="pt-br">
    <audio id="background" loop>
      <source src="../../resources/sfx/MainMenuTheme.mp3" type="audio/mpeg">
    </audio>
<head>
  <meta charset="UTF-8">
  <title>The King's Will</title>
  <link rel="stylesheet" href="../../css/mainMenu.css">
  <link rel="stylesheet" href="../../css/general/fonts.css">
  <link rel="stylesheet" href="../../css/general/elements.css">
  <link rel="stylesheet" href="../../css/general/attributes.css">
</head>
<body>
  <div id="background-layer"></div>
  
  
  <!-- Tela de início -->
  <div class="tela-inicial" id="telaInicial">
    <button class="btn2 subtitle bold hugeT mediumBS dark-redBC solid" id="btnIniciar">Jogar</button>
    
    <p class="bold subtitle mediumT">pressione F11 para uma melhor experiencia</p>
  </div>
  
  <!-- Menu principal -->
  <div class="menu-principal" id="menuPrincipal">
    <h1 class="titleV yellow Sred bold bigT">Menu Principal</h1>
    <div class="menu-items">

      <a href="../Game/players.php" class="subtitle mediumT bold red SdarkRed">Iniciar Jogo</a>
      <a href="../../../Wiki/php/home.php" class="subtitle mediumT bold red SdarkRed">Wiki</a>
      <a class="subtitle mediumT bold red SdarkRed" id="exit">Sair</a>

    </div>
  </div>
  
</body>
</html>

<script src="../../js/mainMenu/script.js"></script>
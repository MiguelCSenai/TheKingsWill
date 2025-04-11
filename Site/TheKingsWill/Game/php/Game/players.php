<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/game/players.css">
    <link rel="stylesheet" href="../../css/general/fonts.css">
    <link rel="stylesheet" href="../../css/general/elements.css">
    <link rel="stylesheet" href="../../css/general/attributes.css">
    <title>Players</title>
</head>
<body>
    
    <form action="">

        <label for="player" class="bold subtitle mediumT">N° de players em cada equipe</label>

        <div class="input-div">

            <button id="btnLeft" onclick="menos(event)" class="bold subtitle hugeT"><</button>

            <input class="title bold dark-yellow Sred" type="number" name="player" id="player" readonly>

            <button id="btnRight" onclick="mais(event)" class="bold subtitle hugeT">></button>

        </div>

        <button class="btn2 white redB dark-redBC continuar">Continuar</button>

    </form>

</body>

<script src="../../js/game/players.js"></script>

</html>
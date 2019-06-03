<?php
    require_once("../../controller/autenticar.php");
    autenticarTipo("adm");
?>
<html>
<head>
    <title>Faz de tudo: Adm</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/global.css">
    
</head>
<body>
    <nav class = "flutuante"s>
        <ul>
            <li id = 'current'><a href="inicio.php">Inicio</a></li>
            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <section id = 'conteudo'>

    </section>
    <script src = "../js/login.js"></script>
</body>
</html>
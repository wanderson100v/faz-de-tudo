<?php
     require_once("../../controller/autenticar.php");
     autenticarTipo("adm");
?>
<html>
<head>
    <title>Faz de tudo: Perfil ADM</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
     <nav class = "flutuante">
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li id = 'current'><a href="perfil.php">Perfil</a></li>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <section>
        <header>
            <h1>Perfil ADM</h1>
        </header>
        <article id = 'conteudo'>
            <h2>Carregando...</h2>
        </article>
        <nav class = "menu">
            <button onclick = "showInfoAdm()">Informação Geral</button></li>
            <button onclick="showInfoContato()">Contatos</button></li>
        </article>
        <span class = 'feedback'></span><br>
    </section>
    <script src = "../js/perfil.js"></script>
    <script src = "../js/info_usuario.js"></script>
    <script src = "../js/contatos.js"></script>
    <script> showInfoAdm()</script>
</body>
</html>
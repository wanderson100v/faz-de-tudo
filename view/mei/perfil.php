<?php
     require_once("../../controller/autenticar.php");
     autenticarTipo("mei");
?>
<html>
<head>
    <title>Faz de tudo: Perfil MEI</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
     <nav  class = "flutuante">
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="servicos.php">Serviços</a></li>
            <li><a href="cidades.php">Cidades</a></li>
            <li><a href="solicitacao.php">Solicitação</a></li>
            <li id = 'current'><a href="perfil.php">Perfil</a></li>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <section>
        <header>
            <h1>Perfil MEI</h1>
        </header>
        <article id = 'conteudo'>
            <h2>Carregando...</h2>
        </article>
        <nav class = "menu">
            <button onclick = "showInfoCliente()">Informação Geral</button></li>
            <button onclick="showInfoEndereco()">Endereços</button></li>
            <button onclick="showInfoContato()">Contatos</button></li>
        </article>
        <span class = 'feedback'></span><br>
    </section>
    <script src = "../js/perfil.js"></script>
    <script src = "../js/info_usuario.js"></script>
    <script src = "../js/info_cliente.js"></script>
    <script src = "../js/contatos.js"></script>
    <script src = "../js/enderecos.js"></script>
    <script> showInfoCliente()</script>
</body>
</html>
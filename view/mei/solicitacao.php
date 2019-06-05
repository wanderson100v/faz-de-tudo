<?php
     require_once("../../controller/autenticar.php");
     autenticarTipo("mei");
?>
<html>
<head>
    <title>Faz de tudo: Solicitações</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <nav class = "flutuante">
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="servicos.php">Serviços</a></li>
            <li><a href="cidades.php">Cidades</a></li>
            <li id = 'current'><a href="solicitacao.php">Solicitação</a></li>
            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <section id = 'conteudo'>

    </section>
</body>
</html>
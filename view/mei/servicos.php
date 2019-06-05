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
            <li id = 'current'><a href="servicos.php">Serviços</a></li>
            <li><a href="cidades.php">Cidades</a></li>
            <li><a href="solicitacao.php">Solicitação</a></li>
            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <section id = 'conteudo'>
        <header>
            <h1>Serviços fornecidos</h1>
        </header>
        <article>
            <h2>Serviços que você fornece</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Valor</th>
                        <th>Horas</th>
                        <th>Descricao</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id = "servicos-mei">
                </tbody>
            </table>
        </article>
        <article>
            <h2>Serviços da empresa</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Valor</th>
                        <th>Horas</th>
                        <th>Descricao</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody id = "servicos">
                </tbody>
            </table>
            <span class = 'feedback'></span><br>
        </article>
    </section>
    <script src = '../js/servicos_mei.js'></script>
</body>
</html>
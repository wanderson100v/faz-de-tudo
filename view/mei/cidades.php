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
            <li id = 'current'><a href="cidades.php">Cidades</a></li>
            <li><a href="solicitacao.php">Solicitação</a></li>
            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <section id = 'conteudo'>
        <header>
            <h1>Cidades que trabalho</h1>
        </header>
        <article>
            <h2>Cidades que você trabalha</h2>
            <div class = 'escopo-tbl'>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody id = "cidades-mei">
                    </tbody>
                </table>
            </div>
        </article>
        <article>
            <h2>Cidades que prestamos serviços</h2>
            <div class = 'escopo-tbl'>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody id = "cidades">
                    </tbody>
                </table>
            </div>
            <span class = 'feedback'></span><br>
        </article>
    </section>
    <script src = '../js/cidades_mei.js'></script>
</body>
</html>
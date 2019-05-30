<?php
     require_once("../../controller/autenticar.php");
     autenticarTipo("cliente");
?>
<html>
<head>
    <title>Faz de tudo: Perfil</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
     <nav>
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li id = 'current'><a href="perfil.php">Perfil</a></li>
            <li><a href="solicitacao.php">Solicitação</a></li>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <section id = 'conteudo'>
        <header>
            <h1>Perfil</h1>
        </header>
        <article>
            <fieldset>
                <legend>Dados de acesso</legend>
                <div id = "dados-acesso">
                    
                </div>
                <button onclick = "cancelEditUser()">cancelar</button>
                <button onclick = "showEditUser()">editar</button>
                <button>salvar</button>
            </fieldset>
            <fieldset>
                <legend>Informações Cliente</legend>
                <div id = "info-cliente">

                </div>
                <button onclick = "cancelEditCliente()">cancelar</button>
                <button onclick = "showEditCliente()">editar</button>
                <button>salvar</button>
            </fieldset>
            <span class = 'feedback'></span><br>
        </article>
        <article>

        </article>
    </section>
    <script src = "../js/perfil.js"></script>
</body>
</html>
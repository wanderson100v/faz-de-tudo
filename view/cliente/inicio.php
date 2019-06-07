<?php
     require_once("../../controller/autenticar.php");
     autenticarTipo("cliente");
?>
<html>
<head>
    <title>Faz de tudo: Cliente</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
    <nav class = "flutuante">
        <ul>
            <li id = 'current'><a href="inicio.php">Inicio</a></li>
            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="solicitacao.php">Solicitação</a></li>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <section id = 'conteudo'>
        <h1 id = 'cliente'>
            <span class = 'img-replacement'>Logo do site</span>
        </h1>
        <h1>Cliente</h1>
        <p>
            Na empresa <i>Faz de tudo: prestadora de serviços de manutenção domiciliar/empresarial</i>,
            Clientes têm acesso a funções relacionadas a solicitação de serviços, manutenção(cancelamento
            ,finalização) e visualização de histórico de solicitações. Também os é possibilitado a manipulação de 
            contatos e endereços.
        </p>
    </section>
</body>
</html>
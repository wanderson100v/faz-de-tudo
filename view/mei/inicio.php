<?php
    require_once("../../controller/autenticar.php");
    autenticarTipo("mei");
?>
<html>
<head>
    <title>Faz de tudo: Mei</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
    <nav  class = "flutuante">
        <ul>
            <li id = 'current'><a href="inicio.php">Inicio</a></li>
            <li><a href="servicos.php">Serviços</a></li>
            <li><a href="cidades.php">Cidades</a></li>
            <li><a href="solicitacao.php">Solicitação</a></li>
            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <section id = 'conteudo'>
        <h1 id = 'mei'>
            <span class = 'img-replacement'>Logo do site</span>
        </h1>
        <h1>MEI</h1>
        <p>
            Na empresa <i>Faz de tudo: prestadora de serviços de manutenção domiciliar/empresarial</i>,
            Micro empreendedores individuais(MEIs).  Tem como responsabilidade o fornecimento de serviços
            a clientes, como por exemplo, limpeza, manutenção, concertos, etc. Para tanto, deve-se definir
            em que cidades atuam<strong>(Isso pode ser feito através da aba cidades)</strong>. Assim, poderá
            definir um subconjunto de cidades que trabalha retirado do total que a empresa trabalha. Como
            também os serviços que prestam<b>(Esse por sua vez através da aba Serviços)</b>. Um MEI também
            pode ser um cliente de outro MEI e solicitar serviços.
        </p>
    </section>
</body>
</html>
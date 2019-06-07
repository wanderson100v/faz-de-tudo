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
            <li><a href="admins.php">Administradores</a></li>
            <li><a href="cidades.php">Cidades</a></li>
            <li><a href="servicos.php">Serviços</a></li>
            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <section id = 'conteudo'>
        <h1>Administrador</h1>
        <p>
            Na empresa <i>Faz de tudo: prestadora de serviços de manutenção domiciliar/empresarial</i>,
            Administradores têm a responsabilidade de manter cidades que a empresa fornece serviço <strong>
            (Através da aba cidades)</strong>, demais administradores <strong>(aba Administradores)</strong>
            e os serviços padrão que a empresa presta <strong>(aba serviços)</strong>. 
        </p>
    </section>
    <script src = "../js/login.js"></script>
</body>
</html>
<?php
    require_once("../../controller/autenticar.php");
?>
<html>
<head>
    <title>Faz de tudo: Mei</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/global.css">
    
</head>
<body>
    <nav>
        <ul>
            <?php
                echo  "<li><span id ='nome'>".$login."</span></li>";
            ?>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <aside>
        <ul>
            <button>Perfil</button>
            <button>Solicitações</button>
        </ul>
    </aside>
    <section id = 'conteudo'>

    </section>
    <script src = "../js/login.js"></script>
</body>
</html>
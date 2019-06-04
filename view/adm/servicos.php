<?php
     require_once("../../controller/autenticar.php");
     autenticarTipo("adm");
?>
<html>
<head>
    <title>Faz de tudo: Serviços que fornecemos</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
     <nav  class = "flutuante">
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="cidades.php">Cidades</a></li>
            <li id = 'current'><a href="servicos.php">Serviços</a></li>
            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <section>
        <header>
            <h1>Serviços</h1>
        </header>
        <h2>Serviços padrões que a empresa fornece</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Horas</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody id = "servicos">
            </tbody>
        </table>
        <form>
            <fieldset>
                <legend>Adicionar um novo serviço</legend>

                <label for="nomeId">Horas</label>
                <input type="text" id="nomeId">

                <label for="nomeId">Valor</label>
                <input type="text" id="nomeId">
                
                <label for="nomeId">Descrição</label>
                <input type="text" id="nomeId">

            </fieldset>
        </form>
        <button onclick = 'cadastrarServico()'>Adicionar</button>
        <span class = 'feedback'></span><br>
    </section>
    <script src = "../js/servicos.js"></script>
    <script> showInfoServico()</script>
</body>
</html>

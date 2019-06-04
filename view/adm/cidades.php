<?php
     require_once("../../controller/autenticar.php");
     autenticarTipo("adm");
?>
<html>
<head>
    <title>Faz de tudo: Cidades que trabalhamos</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
     <nav  class = "flutuante">
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li id = 'current'><a href="cidades.php">Cidades</a></li>
            <li><a href="servicos.php">Serviços</a></li>
            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <section>
        <header>
            <h1>Cidades</h1>
        </header>
        <h2>Cidades que já trabalhamos</h2>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id = "cidades">
            </tbody>
        </table>
        <form>
            <fieldset>
                <legend>Fornecer serviços a uma nova cidade</legend>

                <label for="nomeId">Nome</label>
                <input type="text" id="nomeId" placeholder = 'Nome da Cidade / sigla do estado'>

            </fieldset>
        </form>
        <button onclick = 'cadastrarCidade()'>Adicionar</button>
        <span class = 'feedback'></span><br>
    </section>
    <script src = "../js/cidades.js"></script>
    <script> initiInfoCidades()</script>
</body>
</html>

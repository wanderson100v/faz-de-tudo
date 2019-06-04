<?php
     require_once("../../controller/autenticar.php");
     autenticarTipo("adm");
?>
<html>
<head>
    <title>Faz de tudo: Administradores</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
     <nav  class = "flutuante">
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li id = 'current' ><a href="admins.php">Administradores</a></li>
            <li><a href="cidades.php">Cidades</a></li>
            <li><a href="servicos.php">Serviços</a></li>
            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="../../controller/logout.php">Sair</a></li>
        </ul>
    </nav>
    <section>
        <h1>Administradores</h1>
        <h2>Apenas um administrador pode cadastrar outro</h2>
        <form>
            <fieldset>
                <legend>Dados de acesso</legend>
                
                <label for="loginId">Nome de usuário*</label>
                <input type="text" id="loginId"><br>
                
                <label for="senhaId">Senha*</label>
                <input type="password" id="senhaId"><br>
                
                <label for="conSenhaId">Confirmar senha*</label>
                <input type="password" id="conSenhaId"><br>
            </fieldset>
            <fieldset>
                <legend>Informações ADM</legend>
                <label for="gral-acessoId">Nível de acesso*</label>
                <select id="gral-acessoId">
                    <option value="baixo">baixo</option>
                    <option value="moderado">Moderado</option>
                    <option value="alto">Alto</option>
                </select>
            </fieldset>
        </form>
        <button onclick = 'cadastrarAdm()'>Adicionar</button>
        <span class = 'feedback'></span><br>
        <script src = "../js/admins.js"></script>
    </section>
</body>
</html>

<?php
    require_once("../controller/autenticar.php");
    autenticarTipo();
?>
<html>
<head>
    <title>Acesso ao sistema</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <section id = "login">
        <h1>Acesso ao sistema</h1>
        <span class = 'feedback'></span>
        <form>
            <label for="loginId">Login</label><br/>
            <input type="text" id ="loginId"><br/>
            <label for="senhaId">Senha</label><br/>
            <input type="password" id ="senhaId"><br/>
        </form>
        <button onclick="logar()">Entrar</button><br><br>
        <a id ='cadastrar' href="cadastro.html">Cadastrar uma nova conta</a><br/>
    </section>
    <script src="js/login.js"></script>
</body>
</html>
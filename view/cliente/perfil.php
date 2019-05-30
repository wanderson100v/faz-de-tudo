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
        <form>
            <fieldset>
                <legend>Dados de acesso</legend>
                
                <label for="loginId">Nome de usuário*</label>
                <input type="text" name="loginFld" id="loginId"><br>
                
                <label for="senhaId">Senha*</label>
                <input type="password" name="senhaFld" id="senhaId"><br>
                
                <label for="conSenhaId">Confirmar senha*</label>
                <input type="password" name="conSenhaFld" id="conSenhaId"><br>
            </fieldset>
            <fieldset>
                <legend>Informações Cliente</legend>
                <fieldset>
                    <legend>Tipo</legend>
                    
                    <label for="fisicoId">Físico</label>
                    <input checked onclick="alterarFisico()" type="radio" name="tipoFld" value="físico" id="fisicoId"><br>
                    
                    <label for="juridicoId">Jurídico</label>
                    <input onclick="alterarJuridico()" type="radio" name="tipoFld" value="jurídico" id="juridicoId"><br>
                </fieldset>

                <label for="nomeId">Nome*</label>
                <input type="text" name="nomeFld" id ="nomeId"><br>

                <label for="cpfCnpjId">CPF*</label>
                <input type="text" name="cpfCnpjFld" id ="cpfCnpjId"><br>

                <label for="nascId">Data de Nascimento</label><br>
                <input type="date" name="nascFld" id="nascId">

                <fieldset id = 'sexoFsID'>
                    <legend>Sexo</legend>

                    <label for="mascId">Masculino</label>
                    <input checked type="radio" name="sexoFld" value="masculino" id="mascId"><br>

                    <label for="femId">Feminino</label>
                    <input type="radio" name="sexoFld" value="feminino" id="femId"><br>

                    <label for="outroId">Outro</label>
                    <input type="radio" name="sexoFld" value="outro" id="outroId"><br>
                </fieldset>
            </fieldset>
        </form>
        <span class = 'feedback'></span><br>
        <button onclick="cadastroClienteMei('cliente')">Finalizar cadastro</button>
    </section>
</body>
</html>
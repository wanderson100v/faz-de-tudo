<?php

session_start();

function autenticarTipo($tipo = null){
    if(isset($_SESSION['tipo']) && ($_SESSION['tipo'] !== $tipo)) // usuário está tentando acessar tela indevida
        header("Location: /faz-de-tudo/view/".$_SESSION['tipo']."/inicio.php"); // então é redirecionado para tela do seu escopo
    else if(!isset($_SESSION['tipo']) && $tipo != null) // tentando entrar em tela sem estar logado
        header("Location: /faz-de-tudo/view/login.php");
}

<?php

use dao\AdmDao;
use dao\ClienteDao;
use dao\MeiDao;
require_once('../Config.php');

$login = $_POST['login'];
$senha = $_POST['senha'];

$senhaRetorno = "";

$tipo = "adm";
$usuario = (new AdmDao())->buscarUsuario($login);
if(empty($usuario))
{
    $usuario = (new MeiDao())->buscarUsuario($login);
    $tipo = "mei";
}else
{
    $senhaRetorno = $usuario->getUsuario()->getSenha();
}

if(empty($usuario))
{
    $usuario = (new ClienteDao())->buscarUsuario($login);
    $tipo = "cliente";
    
    if(!empty($usuario))
    {
        $senhaRetorno = $usuario->getUsuario()->getSenha();
    }
}else
{
    $senhaRetorno = $usuario->getCliente()->getUsuario()->getSenha();
}

if(empty($usuario) || (!empty($usuario) && $senha != $senhaRetorno))
    echo "Alerta: Dados de acesso inválidos";
else
{
    $_SESSION['logado'] = $login;
    $_SESSION['tipo'] = $tipo;
    echo $tipo;
}
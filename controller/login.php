<?php

use dao\AdmDao;
use dao\ClienteDao;
use dao\MeiDao;
require_once('../Config.php');

$login = $_POST["login"];
$senha = $_POST["senha"];

$senhaRetorno = "";

$tipo = "adm";
$usuario = (new AdmDao())->buscarUsuario($login);
$id = -1;

if(empty($usuario))
{
    $usuario = (new MeiDao())->buscarUsuario($login);
    $tipo = "mei";
    if(empty($usuario))
    {
        $usuario = (new ClienteDao())->buscarUsuario($login);
        $tipo = "cliente";
        
        if(!empty($usuario))
        {
            $senhaRetorno = $usuario->getUsuario()->getSenha();
            $id = $usuario->getUsuario()->getId();
        }
    }else
    {
        $senhaRetorno = $usuario->getCliente()->getUsuario()->getSenha();
        $id = $usuario->getCliente()->getUsuario()->getId();
    }
}else
{
    $senhaRetorno = $usuario->getUsuario()->getSenha();
    $id = $usuario->getUsuario()->getId();
}
if(!empty($usuario) && $senha == $senhaRetorno )
{
    $_SESSION['logado'] = $login;
    $_SESSION['tipo'] = $tipo;
    $_SESSION['usuario_id'] = $id;
    echo $tipo;
}else{
    echo "Alerta: Dados de acesso inválidos";
}
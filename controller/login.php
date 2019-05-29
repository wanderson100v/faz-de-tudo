<?php

use dao\AdmDao;
use dao\ClienteDao;
use dao\MeiDao;

require_once('../Config.php');

$login = $_POST["login"];
$senha = $_POST["senha"];

$tipo = "adm";
$usuario = (new AdmDao())->buscarUsuario($login, $senha);
if(empty($usuario))
{
   $usuario = (new MeiDao())->buscarUsuario($login, $senha);
   $tipo = "mei";
}
if(empty($usuario))
{
    $usuario = (new ClienteDao())->buscarUsuario($login, $senha);
    $tipo = "cliente";
}

if(empty($usuario))
    echo "Alerta: Dados de acesso inválidos";
else
    echo $tipo;
<?php
use entity\Usuario;
use entity\Cliente;
use business\MeiBo;
use entity\Mei;
use business\ClienteBo;

$cadastro = $_POST['cadastro'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$cpfCnpj = $_POST['cpfCnpj'];
$nasc = $_POST['nasc'];
$sexo = $_POST['sexo'];

require_once('../Config.php');

$usuario = new Usuario();
$usuario->setLogin($login);
$usuario->setSenha($senha);

$cliente = new Cliente();
$cliente->setTipo($tipo);
$cliente->setNome($nome);
$cliente->setCpfCnpj($cpfCnpj);
$cliente->setNasc($nasc);
$cliente->setSexo($sexo);
$cliente->setUsuario($usuario);

if($cadastro == "mei")
{
    $mei = new Mei();
    $mei->setCliente($cliente);
    echo MeiBo::getInstance()->create($mei);
}
else
{
    echo ClienteBo::getInstance()->create($cliente);
}



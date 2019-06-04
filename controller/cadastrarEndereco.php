<?php
use dao\EnderecoDao;
use entity\Endereco;
use entity\Usuario;

require_once '../Config.php';
require_once 'util.php';

if(isset($_SESSION['logado']))
{
    $usuario = new Usuario();
    $usuario->setId($_SESSION['usuario_id']);
    
    $endereco = new Endereco();
    $endereco->setCep($_GET['cep']);
    $endereco->setNum($_GET['num']);
    $endereco->setLogradouro($_GET['logradouro']);
    $endereco->setBairro($_GET['bairro']);
    $endereco->setCidade($_GET['cidade']);
    $endereco->setEstado($_GET['estado']);
    $endereco->setPais($_GET['pais']);
    $endereco->setUsuario($usuario);

    echo (new EnderecoDao())->create($endereco);
}else{
    echo "Usuário não está autenticado" ;
}
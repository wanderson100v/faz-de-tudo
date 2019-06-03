<?php
use dao\ClienteDao;
use dao\EnderecoDao;

require_once '../Config.php';
require_once 'util.php';

if(isset($_SESSION['logado'])){
    $cliente = (new ClienteDao())->buscarUsuario($_SESSION['logado']);
    if(!empty($cliente)){
        $enderecos = (new EnderecoDao())->buscarEnderecosUsuario($cliente->getUsuario()->getId());
        echo json_encode(castObjectClassInArray($enderecos),JSON_UNESCAPED_UNICODE);
    }else{
        echo "Nada encontrado!" ;       
    }
}else{
    echo "Usuário não está autenticado" ;
}
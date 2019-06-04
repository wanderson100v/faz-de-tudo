<?php
use dao\ClienteDao;
use dao\EnderecoDao;

require_once '../Config.php';
require_once 'util.php';

if(isset($_SESSION['logado'])){
    $enderecos = (new EnderecoDao())->buscarEnderecosUsuario($_SESSION["usuario_id"]);
    echo json_encode(castObjectClassInArray($enderecos),JSON_UNESCAPED_UNICODE);
}else{
    echo "Usuário não está autenticado" ;
}
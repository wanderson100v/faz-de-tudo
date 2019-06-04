<?php

use dao\ContatoDao;

require_once '../Config.php';
require_once 'util.php';

if(isset($_SESSION['logado'])){
    $contatos = (new ContatoDao())->buscarContatosUsuario($_SESSION["usuario_id"]);
    echo json_encode(castObjectClassInArray($contatos),JSON_UNESCAPED_UNICODE);
}else{
    echo "Usuário não está autenticado" ;
}
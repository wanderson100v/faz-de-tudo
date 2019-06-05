<?php

use dao\MeiCidadeDao;

require_once '../Config.php';
require_once 'util.php';

if(isset($_SESSION['logado'])){
    $cidades = (new MeiCidadeDao())->read("");
    echo json_encode(castObjectClassInArray($cidades),JSON_UNESCAPED_UNICODE);
}else{
    echo "Usuário não está autenticado" ;
}
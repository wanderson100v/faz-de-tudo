<?php

use dao\CidadeDao;

require_once '../Config.php';
require_once 'util.php';

if(isset($_SESSION['logado'])){
    $cidades = (new CidadeDao())->read("");
    echo json_encode(castObjectClassInArray($cidades),JSON_UNESCAPED_UNICODE);
}else{
    echo "Usuário não está autenticado" ;
}
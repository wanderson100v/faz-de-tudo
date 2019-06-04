<?php

use dao\ServicoDao;

require_once '../Config.php';
require_once 'util.php';

if(isset($_SESSION['logado'])){
    $servicos = (new ServicoDao())->read("");
    echo json_encode(castObjectClassInArray($servicos),JSON_UNESCAPED_UNICODE);
}else{
    echo "Usuário não está autenticado" ;
}
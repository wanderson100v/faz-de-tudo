<?php

use dao\MeiCidadeDao;
use dao\MeiDao;
use entity\MeiCidade;
use entity\Mei;

require_once '../Config.php';
require_once 'util.php';

if(isset($_SESSION['logado'])){
    $mei = (new MeiDao)->buscarUsuario($_SESSION['logado']);
    $cidadesMei = (new MeiCidadeDao())->buscarPorMei($mei->getId());
    echo json_encode(castObjectClassInArray($cidadesMei),JSON_UNESCAPED_UNICODE);
}else{
    echo "Usuário não está autenticado" ;
}
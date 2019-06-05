<?php

use dao\MeiDao;
use dao\ServicoMeiDao;

require_once '../Config.php';
require_once 'util.php';

if(isset($_SESSION['logado'])){
    $mei = (new MeiDao)->buscarUsuario($_SESSION['logado']);
    $servicosMei = (new ServicoMeiDao())->buscarPorMei($mei->getId());
    echo json_encode(castObjectClassInArray($servicosMei),JSON_UNESCAPED_UNICODE);
}else{
    echo "Usuário não está autenticado" ;
}